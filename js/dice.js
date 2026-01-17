// Dice Game Engine
let targetNumber = 50;
let betAmount = 50;
let isRolling = false;

// Initialize game
document.addEventListener('DOMContentLoaded', () => {
    const targetSlider = document.getElementById('target-slider');
    const betSelect = document.getElementById('bet-amount');
    
    targetSlider.addEventListener('input', (e) => {
        targetNumber = parseInt(e.target.value);
        updateDisplay();
    });
    
    betSelect.addEventListener('change', (e) => {
        betAmount = parseInt(e.target.value);
        updateDisplay();
    });
    
    document.getElementById('roll-under-btn').addEventListener('click', () => rollDice('under'));
    document.getElementById('roll-over-btn').addEventListener('click', () => rollDice('over'));
    
    updateDisplay();
});

// Calculate multiplier
function calculateMultiplier(prediction) {
    const houseEdge = 0.01; // 1% house edge
    
    if (prediction === 'under') {
        // Probability of rolling under target
        const probability = targetNumber / 100;
        return (1 - houseEdge) / probability;
    } else {
        // Probability of rolling over target
        const probability = (100 - targetNumber) / 100;
        return (1 - houseEdge) / probability;
    }
}

// Update display
function updateDisplay() {
    document.getElementById('target-display').textContent = targetNumber;
    
    const underMultiplier = calculateMultiplier('under');
    const overMultiplier = calculateMultiplier('over');
    
    document.getElementById('under-multiplier').textContent = `${underMultiplier.toFixed(2)}x`;
    document.getElementById('over-multiplier').textContent = `${overMultiplier.toFixed(2)}x`;
    
    // Update potential win (using average multiplier)
    const avgMultiplier = (underMultiplier + overMultiplier) / 2;
    const potentialWin = Math.floor(betAmount * avgMultiplier);
    document.getElementById('potential-win').textContent = `${potentialWin} coins`;
}

// Roll dice
function rollDice(prediction) {
    if (isRolling) return;
    
    const balance = getBalance();
    if (balance < betAmount) {
        showMessage('❌ Insufficient balance!', '#e74c3c');
        return;
    }
    
    deductBalance(betAmount);
    isRolling = true;
    
    document.getElementById('roll-under-btn').disabled = true;
    document.getElementById('roll-over-btn').disabled = true;
    document.getElementById('target-slider').disabled = true;
    document.getElementById('bet-amount').disabled = true;
    
    // Animate rolling
    animateRoll(prediction);
}

// Animate roll
function animateRoll(prediction) {
    const diceDisplay = document.getElementById('dice-result');
    const rollNumberDisplay = document.getElementById('roll-number');
    
    let count = 0;
    const maxCount = 20;
    
    const interval = setInterval(() => {
        // Show random dice faces during animation
        const faces = ['⚀', '⚁', '⚂', '⚃', '⚄', '⚅'];
        diceDisplay.textContent = faces[Math.floor(Math.random() * faces.length)];
        rollNumberDisplay.textContent = Math.floor(Math.random() * 100);
        
        count++;
        
        if (count >= maxCount) {
            clearInterval(interval);
            showResult(prediction);
        }
    }, 100);
}

// Show result
function showResult(prediction) {
    // Generate result (0-100)
    const result = Math.floor(Math.random() * 101);
    
    const diceDisplay = document.getElementById('dice-result');
    const rollNumberDisplay = document.getElementById('roll-number');
    
    // Show dice face based on result
    if (result <= 16) diceDisplay.textContent = '⚀';
    else if (result <= 33) diceDisplay.textContent = '⚁';
    else if (result <= 50) diceDisplay.textContent = '⚂';
    else if (result <= 66) diceDisplay.textContent = '⚃';
    else if (result <= 83) diceDisplay.textContent = '⚄';
    else diceDisplay.textContent = '⚅';
    
    rollNumberDisplay.textContent = result;
    
    // Determine win/loss
    let won = false;
    if (prediction === 'under' && result < targetNumber) {
        won = true;
    } else if (prediction === 'over' && result > targetNumber) {
        won = true;
    }
    
    // Calculate winnings
    const multiplier = calculateMultiplier(prediction);
    
    if (won) {
        const winAmount = Math.floor(betAmount * multiplier);
        addBalance(winAmount);
        addTransaction('Dice', betAmount, winAmount - betAmount);
        
        showMessage(`🎉 You won! ${result} is ${prediction} ${targetNumber}. +${winAmount} coins (${multiplier.toFixed(2)}x)`, '#2ecc71');
    } else {
        addTransaction('Dice', betAmount, -betAmount);
        
        const expectedResult = prediction === 'under' ? 'under' : 'over';
        showMessage(`😞 You lost. ${result} is not ${expectedResult} ${targetNumber}.`, '#e74c3c');
    }
    
    // Reset after delay
    setTimeout(() => {
        isRolling = false;
        document.getElementById('roll-under-btn').disabled = false;
        document.getElementById('roll-over-btn').disabled = false;
        document.getElementById('target-slider').disabled = false;
        document.getElementById('bet-amount').disabled = false;
        
        diceDisplay.textContent = '🎲';
        rollNumberDisplay.textContent = '';
    }, 3000);
}

// Show message
function showMessage(text, color) {
    const messageDiv = document.getElementById('game-message');
    messageDiv.textContent = text;
    messageDiv.style.color = color;
}
