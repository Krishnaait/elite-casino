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
        
        // Add to history
        window.gameHistory.add('slots', {
            won: true,
            bet: betAmount,
            payout: winAmount,
            multiplier: multiplier,
            symbols: results.join(' ')
        });
        
        showResult(`🎉 JACKPOT! You won ${formatCoins(winAmount)} coins! (${multiplier}x)`, 'success');
        celebrateWin();
    } else {
        // Add loss to history
        window.gameHistory.add('slots', {
            won: false,
            bet: betAmount,
            payout: 0,
            symbols: results.join(' ')
        });
        
        showResult('Try again! 🎰', 'warning');
    }
    
    // Update history display
    updateHistoryDisplay();
}

function showResult(message, type) {
    const resultDiv = document.getElementById('result-message');
    let color = 'var(--text-light)';
    
    if (type === 'success') color = 'var(--success)';
    else if (type === 'danger') color = 'var(--danger)';
    else if (type === 'warning') color = 'var(--warning)';
    
    resultDiv.innerHTML = `<span style="color: ${color};">${message}</span>`;
}

function updateHistoryDisplay() {
    // Display recent results
    window.gameHistory.displayRecent('slots', 'slots-recent-results', (result) => {
        const bgColor = result.won ? 'rgba(74, 222, 128, 0.2)' : 'rgba(248, 113, 113, 0.2)';
        const borderColor = result.won ? '#4ade80' : '#f87171';
        return `
            <div style="padding: 0.75rem; background: ${bgColor}; border: 2px solid ${borderColor}; border-radius: 8px; min-width: 100px; text-align: center;">
                <div style="font-size: 1.2rem; margin-bottom: 0.25rem;">${result.symbols}</div>
                <div style="font-size: 0.85rem; color: ${result.won ? '#4ade80' : '#f87171'}; font-weight: bold;">
                    ${result.won ? `+${formatCoins(result.payout)}` : `-${formatCoins(result.bet)}`}
                </div>
            </div>
        `;
    });
    
    // Display statistics
    window.gameHistory.displayStats('slots', 'slots-stats');
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
    
    // Load and display history
    updateHistoryDisplay();
});
