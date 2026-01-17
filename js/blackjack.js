// Blackjack Game Engine
let deck = [];
let playerHand = [];
let dealerHand = [];
let gameActive = false;
let betAmount = 50;
let canDoubleDown = false;

const suits = ['♠', '♥', '♦', '♣'];
const values = ['A', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K'];

// Initialize game
document.addEventListener('DOMContentLoaded', () => {
    document.getElementById('deal-btn').addEventListener('click', dealCards);
    document.getElementById('hit-btn').addEventListener('click', hit);
    document.getElementById('stand-btn').addEventListener('click', stand);
    document.getElementById('double-btn').addEventListener('click', doubleDown);
    
    document.getElementById('bet-amount').addEventListener('change', (e) => {
        betAmount = parseInt(e.target.value);
    });
});

// Create and shuffle deck
function createDeck() {
    deck = [];
    for (let suit of suits) {
        for (let value of values) {
            deck.push({ suit, value });
        }
    }
    // Shuffle deck
    for (let i = deck.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [deck[i], deck[j]] = [deck[j], deck[i]];
    }
}

// Get card value
function getCardValue(card) {
    if (card.value === 'A') return 11;
    if (['J', 'Q', 'K'].includes(card.value)) return 10;
    return parseInt(card.value);
}

// Calculate hand value
function calculateHandValue(hand) {
    let value = 0;
    let aces = 0;
    
    for (let card of hand) {
        value += getCardValue(card);
        if (card.value === 'A') aces++;
    }
    
    // Adjust for aces
    while (value > 21 && aces > 0) {
        value -= 10;
        aces--;
    }
    
    return value;
}

// Draw card
function drawCard() {
    return deck.pop();
}

// Display card
function displayCard(card, isHidden = false) {
    const cardDiv = document.createElement('div');
    cardDiv.style.cssText = `
        width: 80px;
        height: 110px;
        background: ${isHidden ? '#1a3a52' : '#fff'};
        border: 2px solid var(--primary);
        border-radius: 8px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        font-weight: bold;
        color: ${['♥', '♦'].includes(card.suit) ? '#e74c3c' : '#2c3e50'};
        box-shadow: 0 4px 8px rgba(0,0,0,0.3);
        transition: transform 0.3s;
    `;
    
    if (isHidden) {
        cardDiv.innerHTML = '🂠';
        cardDiv.style.color = 'var(--primary)';
        cardDiv.style.fontSize = '3rem';
    } else {
        cardDiv.innerHTML = `
            <div style="font-size: 1.2rem;">${card.value}</div>
            <div style="font-size: 2rem;">${card.suit}</div>
        `;
    }
    
    cardDiv.addEventListener('mouseenter', () => {
        if (!isHidden) cardDiv.style.transform = 'translateY(-5px)';
    });
    cardDiv.addEventListener('mouseleave', () => {
        cardDiv.style.transform = 'translateY(0)';
    });
    
    return cardDiv;
}

// Update display
function updateDisplay() {
    const playerCardsDiv = document.getElementById('player-cards');
    const dealerCardsDiv = document.getElementById('dealer-cards');
    
    playerCardsDiv.innerHTML = '';
    dealerCardsDiv.innerHTML = '';
    
    // Display player cards
    playerHand.forEach(card => {
        playerCardsDiv.appendChild(displayCard(card));
    });
    
    // Display dealer cards
    dealerHand.forEach((card, index) => {
        if (index === 0 && gameActive) {
            dealerCardsDiv.appendChild(displayCard(card, true));
        } else {
            dealerCardsDiv.appendChild(displayCard(card));
        }
    });
    
    // Update scores
    const playerValue = calculateHandValue(playerHand);
    document.getElementById('player-score').textContent = `Score: ${playerValue}`;
    
    if (gameActive) {
        document.getElementById('dealer-score').textContent = 'Score: ?';
    } else {
        const dealerValue = calculateHandValue(dealerHand);
        document.getElementById('dealer-score').textContent = `Score: ${dealerValue}`;
    }
}

// Deal initial cards
function dealCards() {
    const balance = getBalance();
    if (balance < betAmount) {
        showMessage('❌ Insufficient balance!', '#e74c3c');
        return;
    }
    
    deductBalance(betAmount);
    
    createDeck();
    playerHand = [drawCard(), drawCard()];
    dealerHand = [drawCard(), drawCard()];
    gameActive = true;
    canDoubleDown = true;
    
    updateDisplay();
    
    // Check for blackjack
    const playerValue = calculateHandValue(playerHand);
    const dealerValue = calculateHandValue(dealerHand);
    
    if (playerValue === 21 && dealerValue === 21) {
        endGame('push');
        return;
    }
    
    if (playerValue === 21) {
        endGame('blackjack');
        return;
    }
    
    if (dealerValue === 21) {
        endGame('dealer-blackjack');
        return;
    }
    
    showButtons(true);
    showMessage('Make your move!', 'var(--primary)');
}

// Player hits
function hit() {
    playerHand.push(drawCard());
    canDoubleDown = false;
    updateDisplay();
    
    const playerValue = calculateHandValue(playerHand);
    
    if (playerValue > 21) {
        endGame('bust');
    } else if (playerValue === 21) {
        stand();
    } else {
        document.getElementById('double-btn').style.display = 'none';
    }
}

// Player stands
function stand() {
    gameActive = false;
    
    // Dealer's turn
    while (calculateHandValue(dealerHand) < 17) {
        dealerHand.push(drawCard());
    }
    
    updateDisplay();
    
    const playerValue = calculateHandValue(playerHand);
    const dealerValue = calculateHandValue(dealerHand);
    
    if (dealerValue > 21) {
        endGame('dealer-bust');
    } else if (playerValue > dealerValue) {
        endGame('win');
    } else if (playerValue < dealerValue) {
        endGame('lose');
    } else {
        endGame('push');
    }
}

// Double down
function doubleDown() {
    const balance = getBalance();
    if (balance < betAmount) {
        showMessage('❌ Insufficient balance to double down!', '#e74c3c');
        return;
    }
    
    deductBalance(betAmount);
    betAmount *= 2;
    
    playerHand.push(drawCard());
    updateDisplay();
    
    const playerValue = calculateHandValue(playerHand);
    
    if (playerValue > 21) {
        endGame('bust');
    } else {
        stand();
    }
    
    betAmount /= 2;
}

// End game
function endGame(result) {
    gameActive = false;
    showButtons(false);
    updateDisplay();
    
    let message = '';
    let color = '';
    let winAmount = 0;
    
    switch (result) {
        case 'blackjack':
            winAmount = Math.floor(betAmount * 2.5);
            message = `🎉 BLACKJACK! You won ${winAmount} coins!`;
            color = '#2ecc71';
            addBalance(winAmount);
            addTransaction('Blackjack', betAmount, winAmount - betAmount);
            break;
        case 'win':
            winAmount = betAmount * 2;
            message = `🎊 You Win! +${winAmount} coins!`;
            color = '#2ecc71';
            addBalance(winAmount);
            addTransaction('Blackjack', betAmount, winAmount - betAmount);
            break;
        case 'dealer-bust':
            winAmount = betAmount * 2;
            message = `💥 Dealer Busts! You won ${winAmount} coins!`;
            color = '#2ecc71';
            addBalance(winAmount);
            addTransaction('Blackjack', betAmount, winAmount - betAmount);
            break;
        case 'push':
            message = '🤝 Push! Bet returned.';
            color = '#f39c12';
            addBalance(betAmount);
            addTransaction('Blackjack', betAmount, 0);
            break;
        case 'bust':
            message = '💥 Bust! You lose.';
            color = '#e74c3c';
            addTransaction('Blackjack', betAmount, -betAmount);
            break;
        case 'lose':
            message = '😞 Dealer wins. You lose.';
            color = '#e74c3c';
            addTransaction('Blackjack', betAmount, -betAmount);
            break;
        case 'dealer-blackjack':
            message = '🃏 Dealer has Blackjack! You lose.';
            color = '#e74c3c';
            addTransaction('Blackjack', betAmount, -betAmount);
            break;
    }
    
    showMessage(message, color);
}

// Show/hide buttons
function showButtons(show) {
    document.getElementById('deal-btn').style.display = show ? 'none' : 'inline-block';
    document.getElementById('hit-btn').style.display = show ? 'inline-block' : 'none';
    document.getElementById('stand-btn').style.display = show ? 'inline-block' : 'none';
    document.getElementById('double-btn').style.display = (show && canDoubleDown) ? 'inline-block' : 'none';
    document.getElementById('bet-amount').disabled = show;
}

// Show message
function showMessage(text, color) {
    const messageDiv = document.getElementById('game-message');
    messageDiv.textContent = text;
    messageDiv.style.color = color;
}
