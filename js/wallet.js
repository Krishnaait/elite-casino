/**
 * Elite Casino - Wallet Management System
 * Uses localStorage to track virtual coins
 */

const WALLET_KEY = 'eliteCasino_balance';
const STARTING_BALANCE = 10000;
const HISTORY_KEY = 'eliteCasino_history';

// Initialize wallet
function initWallet() {
    if (localStorage.getItem(WALLET_KEY) === null) {
        localStorage.setItem(WALLET_KEY, STARTING_BALANCE);
        localStorage.setItem(HISTORY_KEY, JSON.stringify([]));
    }
}

// Get current balance
function getBalance() {
    initWallet();
    return parseInt(localStorage.getItem(WALLET_KEY)) || STARTING_BALANCE;
}

// Update balance
function updateBalance(amount, type = 'bet', description = '') {
    const currentBalance = getBalance();
    const newBalance = currentBalance + amount;
    
    // Prevent negative balance
    if (newBalance < 0) {
        return { success: false, message: 'Insufficient balance', balance: currentBalance };
    }
    
    // Update balance
    localStorage.setItem(WALLET_KEY, newBalance);
    
    // Add to history
    addToHistory({
        type: type,
        amount: amount,
        balanceBefore: currentBalance,
        balanceAfter: newBalance,
        description: description,
        timestamp: new Date().toISOString()
    });
    
    // Update display
    updateBalanceDisplay();
    
    return { success: true, balance: newBalance };
}

// Place a bet
function placeBet(amount) {
    return updateBalance(-amount, 'bet', `Bet placed: ${amount} coins`);
}

// Add winnings
function addWinnings(amount, multiplier = 1) {
    return updateBalance(amount, 'win', `Won ${amount} coins (${multiplier}x)`);
}

// Reset balance (for testing)
function resetBalance() {
    localStorage.setItem(WALLET_KEY, STARTING_BALANCE);
    updateBalanceDisplay();
    return STARTING_BALANCE;
}

// Add to transaction history
function addToHistory(transaction) {
    const history = getHistory();
    history.unshift(transaction); // Add to beginning
    
    // Keep only last 100 transactions
    if (history.length > 100) {
        history.pop();
    }
    
    localStorage.setItem(HISTORY_KEY, JSON.stringify(history));
}

// Get transaction history
function getHistory() {
    const history = localStorage.getItem(HISTORY_KEY);
    return history ? JSON.parse(history) : [];
}

// Update balance display in header
function updateBalanceDisplay() {
    const balance = getBalance();
    const displayElement = document.getElementById('balance-display');
    if (displayElement) {
        displayElement.textContent = `💰 ${balance.toLocaleString()} Coins`;
        
        // Add animation
        displayElement.style.transform = 'scale(1.1)';
        setTimeout(() => {
            displayElement.style.transform = 'scale(1)';
        }, 200);
    }
}

// Format number with commas
function formatCoins(amount) {
    return amount.toLocaleString();
}

// Check if player can afford bet
function canAfford(amount) {
    return getBalance() >= amount;
}

// Get statistics
function getStats() {
    const history = getHistory();
    const totalBets = history.filter(t => t.type === 'bet').reduce((sum, t) => sum + Math.abs(t.amount), 0);
    const totalWins = history.filter(t => t.type === 'win').reduce((sum, t) => sum + t.amount, 0);
    const gamesPlayed = history.filter(t => t.type === 'bet').length;
    
    return {
        balance: getBalance(),
        totalBets: totalBets,
        totalWins: totalWins,
        gamesPlayed: gamesPlayed,
        netProfit: totalWins - totalBets
    };
}

// Initialize on page load
initWallet();
