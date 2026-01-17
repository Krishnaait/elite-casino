<?php
$pageTitle = 'Leaderboard';
require_once __DIR__ . '/../includes/header.php';
?>

<div class="container">
    <h1 class="section-title">🏆 Leaderboard & Statistics</h1>
    
    <div style="text-align: center; margin-bottom: 3rem;">
        <p style="font-size: 1.1rem; color: #ccc;">
            Track your gaming performance and see how you're doing!
        </p>
    </div>
    
    <!-- Personal Stats -->
    <div style="background: linear-gradient(135deg, var(--accent), var(--secondary-light)); padding: 2rem; border-radius: 15px; border: 2px solid var(--primary); margin-bottom: 3rem;">
        <h2 style="color: var(--primary); text-align: center; margin-bottom: 2rem;">📊 Your Statistics</h2>
        
        <div class="stats-grid">
            <div class="stat-card">
                <h3 id="stat-balance">0</h3>
                <p>Current Balance</p>
            </div>
            <div class="stat-card">
                <h3 id="stat-games">0</h3>
                <p>Games Played</p>
            </div>
            <div class="stat-card">
                <h3 id="stat-wagered">0</h3>
                <p>Total Wagered</p>
            </div>
            <div class="stat-card">
                <h3 id="stat-won">0</h3>
                <p>Total Won</p>
            </div>
        </div>
        
        <div style="margin-top: 2rem; text-align: center;">
            <div id="profit-display" style="font-size: 1.5rem; font-weight: bold;"></div>
        </div>
    </div>
    
    <!-- Recent Activity -->
    <div style="background: var(--bg-card); padding: 2rem; border-radius: 15px; border: 1px solid var(--primary); margin-bottom: 3rem;">
        <h2 style="color: var(--primary); margin-bottom: 1.5rem;">📜 Recent Activity</h2>
        <div id="recent-activity" style="max-height: 400px; overflow-y: auto;">
            <!-- Will be populated by JavaScript -->
        </div>
    </div>
    
    <!-- Top Achievements -->
    <div style="background: var(--bg-card); padding: 2rem; border-radius: 15px; border: 1px solid var(--primary);">
        <h2 style="color: var(--primary); text-align: center; margin-bottom: 2rem;">🎖️ Achievements</h2>
        
        <div class="games-grid">
            <div class="game-card" id="achievement-starter">
                <div class="game-icon">🎯</div>
                <h3>First Steps</h3>
                <p>Play your first game</p>
                <div class="achievement-status">Locked</div>
            </div>
            
            <div class="game-card" id="achievement-player">
                <div class="game-icon">🎮</div>
                <h3>Active Player</h3>
                <p>Play 10 games</p>
                <div class="achievement-status">Locked</div>
            </div>
            
            <div class="game-card" id="achievement-winner">
                <div class="game-icon">🏆</div>
                <h3>Big Winner</h3>
                <p>Win 10,000 coins in total</p>
                <div class="achievement-status">Locked</div>
            </div>
            
            <div class="game-card" id="achievement-high-roller">
                <div class="game-icon">💎</div>
                <h3>High Roller</h3>
                <p>Wager 50,000 coins in total</p>
                <div class="achievement-status">Locked</div>
            </div>
        </div>
    </div>
    
    <div style="margin-top: 3rem; text-align: center; background: var(--secondary); padding: 2rem; border-radius: 15px; border: 1px solid var(--primary);">
        <h3 style="color: var(--primary); margin-bottom: 1rem;">💡 Pro Tip</h3>
        <p style="color: #ccc;">
            Your statistics are saved locally in your browser. Clear your browser data and your progress will reset.
            This is a free-to-play social casino - no real money is involved!
        </p>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    loadStatistics();
    loadRecentActivity();
    checkAchievements();
});

function loadStatistics() {
    const stats = getStats();
    
    document.getElementById('stat-balance').textContent = formatCoins(stats.balance);
    document.getElementById('stat-games').textContent = stats.gamesPlayed;
    document.getElementById('stat-wagered').textContent = formatCoins(stats.totalBets);
    document.getElementById('stat-won').textContent = formatCoins(stats.totalWins);
    
    const profit = stats.netProfit;
    const profitDisplay = document.getElementById('profit-display');
    
    if (profit > 0) {
        profitDisplay.innerHTML = `<span style="color: var(--success);">📈 Net Profit: +${formatCoins(profit)} coins</span>`;
    } else if (profit < 0) {
        profitDisplay.innerHTML = `<span style="color: var(--danger);">📉 Net Loss: ${formatCoins(profit)} coins</span>`;
    } else {
        profitDisplay.innerHTML = `<span style="color: var(--warning);">➖ Break Even: ${formatCoins(profit)} coins</span>`;
    }
}

function loadRecentActivity() {
    const history = getHistory();
    const activityDiv = document.getElementById('recent-activity');
    
    if (history.length === 0) {
        activityDiv.innerHTML = '<p style="text-align: center; color: #ccc; padding: 2rem;">No activity yet. Start playing to see your history!</p>';
        return;
    }
    
    let html = '<table style="width: 100%;"><thead><tr><th>Type</th><th>Amount</th><th>Balance</th><th>Time</th></tr></thead><tbody>';
    
    history.slice(0, 20).forEach(transaction => {
        const date = new Date(transaction.timestamp);
        const timeStr = date.toLocaleString();
        const typeIcon = transaction.type === 'bet' ? '🎲' : transaction.type === 'win' ? '🏆' : '🎁';
        const amountColor = transaction.amount >= 0 ? 'var(--success)' : 'var(--danger)';
        
        html += `<tr>
            <td>${typeIcon} ${transaction.type.toUpperCase()}</td>
            <td style="color: ${amountColor}; font-weight: bold;">${transaction.amount >= 0 ? '+' : ''}${formatCoins(transaction.amount)}</td>
            <td>${formatCoins(transaction.balanceAfter)}</td>
            <td style="font-size: 0.9rem; color: #888;">${timeStr}</td>
        </tr>`;
    });
    
    html += '</tbody></table>';
    activityDiv.innerHTML = html;
}

function checkAchievements() {
    const stats = getStats();
    
    // First Steps - Play 1 game
    if (stats.gamesPlayed >= 1) {
        unlockAchievement('achievement-starter');
    }
    
    // Active Player - Play 10 games
    if (stats.gamesPlayed >= 10) {
        unlockAchievement('achievement-player');
    }
    
    // Big Winner - Win 10,000 coins
    if (stats.totalWins >= 10000) {
        unlockAchievement('achievement-winner');
    }
    
    // High Roller - Wager 50,000 coins
    if (stats.totalBets >= 50000) {
        unlockAchievement('achievement-high-roller');
    }
}

function unlockAchievement(achievementId) {
    const achievement = document.getElementById(achievementId);
    if (achievement) {
        const statusDiv = achievement.querySelector('.achievement-status');
        if (statusDiv && statusDiv.textContent === 'Locked') {
            statusDiv.textContent = '✓ Unlocked';
            statusDiv.style.color = 'var(--success)';
            achievement.style.borderColor = 'var(--success)';
            achievement.style.boxShadow = '0 0 20px rgba(40, 167, 69, 0.3)';
        }
    }
}
</script>

<style>
.achievement-status {
    margin-top: 1rem;
    padding: 0.5rem;
    background: var(--secondary);
    border-radius: 8px;
    font-weight: bold;
    color: #888;
}
</style>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
