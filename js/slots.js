/**
 * Elite Casino - Slots Game Engine
 * Classic 3-reel slot machine with symbol matching
 */

const symbols = ['🍒', '🍋', '🍊', '🍀', '⭐', '💎'];
const payouts = {
    '💎': 50,
    '⭐': 20,
    '🍀': 10,
    '🍒': 5,
    '🍋': 3,
    '🍊': 2
};

let isSpinning = false;

function spin() {
    if (isSpinning) return;
    
    const betAmount = parseInt(document.getElementById('bet-amount').value);
    
    // Check if player can afford bet
    if (!canAfford(betAmount)) {
        showResult('Insufficient balance! 😢', 'danger');
        return;
    }
    
    // Place bet
    const betResult = placeBet(betAmount);
    if (!betResult.success) {
        showResult(betResult.message, 'danger');
        return;
    }
    
    isSpinning = true;
    document.getElementById('spin-btn').disabled = true;
    document.getElementById('result-message').innerHTML = '<span style="color: var(--primary);">Spinning...</span>';
    
    // Animate reels
    animateReels();
    
    // Stop after 2 seconds and show result
    setTimeout(() => {
        const results = stopReels();
        checkWin(results, betAmount);
        isSpinning = false;
        document.getElementById('spin-btn').disabled = false;
    }, 2000);
}

function animateReels() {
    const reels = ['reel1', 'reel2', 'reel3'];
    
    const interval = setInterval(() => {
        if (!isSpinning) {
            clearInterval(interval);
            return;
        }
        
        reels.forEach(reelId => {
            const randomSymbol = symbols[Math.floor(Math.random() * symbols.length)];
            document.getElementById(reelId).textContent = randomSymbol;
        });
    }, 100);
}

function stopReels() {
    const results = [];
    
    for (let i = 1; i <= 3; i++) {
        const randomSymbol = symbols[Math.floor(Math.random() * symbols.length)];
        document.getElementById('reel' + i).textContent = randomSymbol;
        results.push(randomSymbol);
    }
    
    return results;
}

function checkWin(results, betAmount) {
    const [symbol1, symbol2, symbol3] = results;
    
    // Check if all three symbols match
    if (symbol1 === symbol2 && symbol2 === symbol3) {
        const multiplier = payouts[symbol1];
        const winAmount = betAmount * multiplier;
        
        // Add winnings
        addWinnings(winAmount, multiplier);
        
        showResult(`🎉 JACKPOT! You won ${formatCoins(winAmount)} coins! (${multiplier}x)`, 'success');
        celebrateWin();
    } else {
        showResult('Try again! 🎰', 'warning');
    }
}

function showResult(message, type) {
    const resultDiv = document.getElementById('result-message');
    let color = 'var(--text-light)';
    
    if (type === 'success') color = 'var(--success)';
    else if (type === 'danger') color = 'var(--danger)';
    else if (type === 'warning') color = 'var(--warning)';
    
    resultDiv.innerHTML = `<span style="color: ${color};">${message}</span>`;
}

function celebrateWin() {
    // Add celebration animation
    const reels = document.querySelectorAll('.reel');
    reels.forEach(reel => {
        reel.style.transform = 'scale(1.1)';
        reel.style.boxShadow = '0 0 30px var(--shadow-gold)';
        
        setTimeout(() => {
            reel.style.transform = 'scale(1)';
            reel.style.boxShadow = 'none';
        }, 500);
    });
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', function() {
    // Set random initial symbols
    stopReels();
});
