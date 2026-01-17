/**
 * Game History Tracking System
 * Stores and displays past game results for each casino game
 */

// History storage keys
const HISTORY_KEYS = {
    slots: 'eliteCasino_slotsHistory',
    mines: 'eliteCasino_minesHistory',
    luckySpin: 'eliteCasino_luckySpinHistory',
    blackjack: 'eliteCasino_blackjackHistory',
    plinko: 'eliteCasino_plinkoHistory',
    dice: 'eliteCasino_diceHistory'
};

// Maximum history items to store per game
const MAX_HISTORY_ITEMS = 50;

/**
 * Add a game result to history
 * @param {string} game - Game name (slots, mines, luckySpin, etc.)
 * @param {object} result - Game result object
 */
function addGameResult(game, result) {
    const key = HISTORY_KEYS[game];
    if (!key) return;
    
    let history = getGameHistory(game);
    
    // Add timestamp
    result.timestamp = Date.now();
    
    // Add to beginning of array
    history.unshift(result);
    
    // Keep only last MAX_HISTORY_ITEMS
    if (history.length > MAX_HISTORY_ITEMS) {
        history = history.slice(0, MAX_HISTORY_ITEMS);
    }
    
    localStorage.setItem(key, JSON.stringify(history));
}

/**
 * Get game history
 * @param {string} game - Game name
 * @returns {array} Array of game results
 */
function getGameHistory(game) {
    const key = HISTORY_KEYS[game];
    if (!key) return [];
    
    const stored = localStorage.getItem(key);
    return stored ? JSON.parse(stored) : [];
}

/**
 * Clear game history
 * @param {string} game - Game name
 */
function clearGameHistory(game) {
    const key = HISTORY_KEYS[game];
    if (key) {
        localStorage.removeItem(key);
    }
}

/**
 * Get recent results (last N items)
 * @param {string} game - Game name
 * @param {number} count - Number of recent results to get
 * @returns {array} Array of recent results
 */
function getRecentResults(game, count = 10) {
    const history = getGameHistory(game);
    return history.slice(0, count);
}

/**
 * Get game statistics
 * @param {string} game - Game name
 * @returns {object} Statistics object
 */
function getGameStats(game) {
    const history = getGameHistory(game);
    
    if (history.length === 0) {
        return {
            totalGames: 0,
            wins: 0,
            losses: 0,
            winRate: 0,
            totalWon: 0,
            totalLost: 0,
            netProfit: 0,
            biggestWin: 0
        };
    }
    
    let wins = 0;
    let losses = 0;
    let totalWon = 0;
    let totalLost = 0;
    let biggestWin = 0;
    
    history.forEach(result => {
        if (result.won) {
            wins++;
            totalWon += result.payout || 0;
            if (result.payout > biggestWin) {
                biggestWin = result.payout;
            }
        } else {
            losses++;
            totalLost += result.bet || 0;
        }
    });
    
    return {
        totalGames: history.length,
        wins,
        losses,
        winRate: ((wins / history.length) * 100).toFixed(1),
        totalWon,
        totalLost,
        netProfit: totalWon - totalLost,
        biggestWin
    };
}

/**
 * Display recent results in a container
 * @param {string} game - Game name
 * @param {string} containerId - Container element ID
 * @param {function} formatResult - Function to format individual result
 */
function displayRecentResults(game, containerId, formatResult) {
    const container = document.getElementById(containerId);
    if (!container) return;
    
    const recent = getRecentResults(game, 10);
    
    if (recent.length === 0) {
        container.innerHTML = '<div style="text-align: center; color: #888; padding: 1rem;">No game history yet. Play to see results!</div>';
        return;
    }
    
    let html = '<div style="display: flex; gap: 0.5rem; flex-wrap: wrap; justify-content: center;">';
    
    recent.forEach(result => {
        html += formatResult(result);
    });
    
    html += '</div>';
    container.innerHTML = html;
}

/**
 * Display game statistics
 * @param {string} game - Game name
 * @param {string} containerId - Container element ID
 */
function displayGameStats(game, containerId) {
    const container = document.getElementById(containerId);
    if (!container) return;
    
    const stats = getGameStats(game);
    
    if (stats.totalGames === 0) {
        container.innerHTML = '<div style="text-align: center; color: #888; padding: 1rem;">No statistics yet. Start playing!</div>';
        return;
    }
    
    const html = `
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); gap: 1rem;">
            <div style="text-align: center; padding: 1rem; background: var(--bg-card); border-radius: 10px;">
                <div style="font-size: 1.5rem; color: var(--primary); font-weight: bold;">${stats.totalGames}</div>
                <div style="font-size: 0.9rem; color: #ccc;">Total Games</div>
            </div>
            <div style="text-align: center; padding: 1rem; background: var(--bg-card); border-radius: 10px;">
                <div style="font-size: 1.5rem; color: #4ade80; font-weight: bold;">${stats.wins}</div>
                <div style="font-size: 0.9rem; color: #ccc;">Wins</div>
            </div>
            <div style="text-align: center; padding: 1rem; background: var(--bg-card); border-radius: 10px;">
                <div style="font-size: 1.5rem; color: #f87171; font-weight: bold;">${stats.losses}</div>
                <div style="font-size: 0.9rem; color: #ccc;">Losses</div>
            </div>
            <div style="text-align: center; padding: 1rem; background: var(--bg-card); border-radius: 10px;">
                <div style="font-size: 1.5rem; color: var(--primary); font-weight: bold;">${stats.winRate}%</div>
                <div style="font-size: 0.9rem; color: #ccc;">Win Rate</div>
            </div>
            <div style="text-align: center; padding: 1rem; background: var(--bg-card); border-radius: 10px;">
                <div style="font-size: 1.5rem; color: ${stats.netProfit >= 0 ? '#4ade80' : '#f87171'}; font-weight: bold;">${stats.netProfit >= 0 ? '+' : ''}${formatCoins(stats.netProfit)}</div>
                <div style="font-size: 0.9rem; color: #ccc;">Net Profit</div>
            </div>
            <div style="text-align: center; padding: 1rem; background: var(--bg-card); border-radius: 10px;">
                <div style="font-size: 1.5rem; color: var(--primary); font-weight: bold;">${formatCoins(stats.biggestWin)}</div>
                <div style="font-size: 0.9rem; color: #ccc;">Biggest Win</div>
            </div>
        </div>
    `;
    
    container.innerHTML = html;
}

// Export functions for use in game files
window.gameHistory = {
    add: addGameResult,
    get: getGameHistory,
    getRecent: getRecentResults,
    getStats: getGameStats,
    displayRecent: displayRecentResults,
    displayStats: displayGameStats,
    clear: clearGameHistory
};
