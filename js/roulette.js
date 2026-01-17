/**
 * Elite Casino - Roulette Game Engine
 * Classic roulette with red, black, and green betting
 */

const rouletteNumbers = [
    { num: 0, color: 'green' },
    { num: 1, color: 'red' }, { num: 2, color: 'red' }, { num: 3, color: 'red' },
    { num: 4, color: 'red' }, { num: 5, color: 'red' }, { num: 6, color: 'red' }, { num: 7, color: 'red' },
    { num: 8, color: 'black' }, { num: 9, color: 'black' }, { num: 10, color: 'black' },
    { num: 11, color: 'black' }, { num: 12, color: 'black' }, { num: 13, color: 'black' }, { num: 14, color: 'black' }
];

const payouts = {
    'red': 2,
    'black': 2,
    'green': 14
};

let currentBets = {};
let isSpinning = false;

function placeBetOn(color) {
    if (isSpinning) return;
    
    const chipValue = parseInt(document.getElementById('chip-value').value);
    
    // Check balance
    if (!canAfford(chipValue)) {
        showResult('Insufficient balance! 😢', 'danger');
        return;
    }
    
    // Add to bets
    if (!currentBets[color]) {
        currentBets[color] = 0;
    }
    currentBets[color] += chipValue;
    
    // Deduct from balance temporarily
    const betResult = placeBet(chipValue);
    if (!betResult.success) {
        showResult(betResult.message, 'danger');
        return;
    }
    
    updateBetsDisplay();
    showResult(`Bet placed: ${chipValue} coins on ${color.toUpperCase()}`, 'info');
}

function updateBetsDisplay() {
    const betsList = document.getElementById('bets-list');
    
    if (Object.keys(currentBets).length === 0) {
        betsList.textContent = 'No bets placed yet';
        return;
    }
    
    let html = '';
    let totalBet = 0;
    
    for (const [color, amount] of Object.entries(currentBets)) {
        html += `<div style="margin-bottom: 0.5rem;">
            <span style="text-transform: uppercase; font-weight: bold;">${color}:</span> 
            ${formatCoins(amount)} coins (Pays ${payouts[color]}x)
        </div>`;
        totalBet += amount;
    }
    
    html += `<div style="margin-top: 1rem; padding-top: 1rem; border-top: 1px solid var(--primary); color: var(--primary); font-weight: bold;">
        Total Bet: ${formatCoins(totalBet)} coins
    </div>`;
    
    betsList.innerHTML = html;
}

function clearBets() {
    if (isSpinning) return;
    
    // Refund all bets
    let totalRefund = 0;
    for (const amount of Object.values(currentBets)) {
        totalRefund += amount;
    }
    
    if (totalRefund > 0) {
        addWinnings(totalRefund, 1);
        showResult('All bets cleared and refunded', 'info');
    }
    
    currentBets = {};
    updateBetsDisplay();
}

function spinRoulette() {
    if (isSpinning) return;
    
    if (Object.keys(currentBets).length === 0) {
        showResult('Please place at least one bet!', 'warning');
        return;
    }
    
    isSpinning = true;
    document.getElementById('spin-btn').disabled = true;
    showResult('Spinning... 🎲', 'info');
    
    // Animate wheel
    animateWheel();
}

function animateWheel() {
    const wheel = document.getElementById('roulette-wheel');
    const numberDisplay = document.getElementById('wheel-number');
    let spinCount = 0;
    const maxSpins = 30;
    
    const spinInterval = setInterval(() => {
        const randomIndex = Math.floor(Math.random() * rouletteNumbers.length);
        const number = rouletteNumbers[randomIndex];
        
        numberDisplay.textContent = number.num;
        numberDisplay.style.color = getColorCode(number.color);
        wheel.style.transform = `rotate(${spinCount * 12}deg)`;
        
        spinCount++;
        
        if (spinCount >= maxSpins) {
            clearInterval(spinInterval);
            
            // Final result
            const finalIndex = Math.floor(Math.random() * rouletteNumbers.length);
            const finalNumber = rouletteNumbers[finalIndex];
            
            numberDisplay.textContent = finalNumber.num;
            numberDisplay.style.color = getColorCode(finalNumber.color);
            
            setTimeout(() => {
                checkWin(finalNumber);
            }, 500);
        }
    }, 100);
}

function checkWin(result) {
    let totalWin = 0;
    let winningBets = [];
    
    // Check each bet
    for (const [color, amount] of Object.entries(currentBets)) {
        if (color === result.color) {
            const payout = amount * payouts[color];
            totalWin += payout;
            winningBets.push({ color, amount, payout });
        }
    }
    
    if (totalWin > 0) {
        addWinnings(totalWin, totalWin / getTotalBet());
        
        let message = `🎉 Winner! Number ${result.num} (${result.color.toUpperCase()})<br>`;
        winningBets.forEach(bet => {
            message += `${bet.color.toUpperCase()}: Won ${formatCoins(bet.payout)} coins!<br>`;
        });
        message += `Total Win: ${formatCoins(totalWin)} coins!`;
        
        showResult(message, 'success');
    } else {
        showResult(`Number ${result.num} (${result.color.toUpperCase()}) - Better luck next time! 🎲`, 'danger');
    }
    
    // Reset for next round
    currentBets = {};
    updateBetsDisplay();
    isSpinning = false;
    document.getElementById('spin-btn').disabled = false;
}

function getTotalBet() {
    return Object.values(currentBets).reduce((sum, amount) => sum + amount, 0);
}

function getColorCode(color) {
    if (color === 'red') return '#e74c3c';
    if (color === 'black') return '#34495e';
    if (color === 'green') return '#27ae60';
    return '#ffffff';
}

function showResult(message, type) {
    const resultDiv = document.getElementById('result-message');
    let color = 'var(--text-light)';
    
    if (type === 'success') color = 'var(--success)';
    else if (type === 'danger') color = 'var(--danger)';
    else if (type === 'warning') color = 'var(--warning)';
    else if (type === 'info') color = 'var(--primary)';
    
    resultDiv.innerHTML = `<span style="color: ${color};">${message}</span>`;
}

// Add hover effects to bet buttons
document.addEventListener('DOMContentLoaded', function() {
    const betButtons = document.querySelectorAll('.bet-button');
    betButtons.forEach(button => {
        button.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.05)';
            this.style.boxShadow = '0 0 20px var(--shadow-gold)';
        });
        button.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
            this.style.boxShadow = 'none';
        });
    });
});
