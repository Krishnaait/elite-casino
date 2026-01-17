<?php
$pageTitle = 'Play Now';
require_once __DIR__ . '/../includes/header.php';
?>

<div class="container">
    <h1 class="section-title">🎮 Play Now - Choose Your Game</h1>
    
    <div style="text-align: center; margin-bottom: 3rem; max-width: 700px; margin-left: auto; margin-right: auto;">
        <p style="font-size: 1.2rem; color: #ccc;">
            Welcome to Elite Casino! All games are completely free to play with virtual coins. 
            No real money involved - just pure entertainment!
        </p>
        <div style="margin-top: 2rem; padding: 1.5rem; background: var(--bg-card); border-radius: 15px; border: 2px solid var(--primary);">
            <div style="color: var(--primary); font-weight: bold; font-size: 1.1rem; margin-bottom: 0.5rem;">Your Current Balance</div>
            <div id="balance-large" style="font-size: 2.5rem; font-weight: bold; color: var(--primary);">10,000 Coins</div>
        </div>
    </div>
    
    <div class="games-grid">
        <div class="game-card fade-in">
            <div class="game-icon">🎰</div>
            <h3>Slots</h3>
            <p>Classic 3-reel slot machine with multiple symbols and exciting payouts. Match three symbols to win big!</p>
            <div style="margin: 1rem 0; padding: 1rem; background: var(--secondary); border-radius: 10px;">
                <div style="color: var(--primary); font-weight: bold; margin-bottom: 0.5rem;">Features:</div>
                <ul style="text-align: left; color: #ccc; line-height: 1.8;">
                    <li>6 different symbols</li>
                    <li>Up to 50x multiplier</li>
                    <li>Smooth reel animations</li>
                    <li>Instant results</li>
                </ul>
            </div>
            <a href="/games/slots.php" class="btn btn-primary" style="width: 100%;">Play Slots</a>
        </div>
        
        <div class="game-card fade-in">
            <div class="game-icon">💣</div>
            <h3>Mines</h3>
            <p>Strategic gameplay! Reveal safe tiles while avoiding mines. The more you reveal, the higher your multiplier grows.</p>
            <div style="margin: 1rem 0; padding: 1rem; background: var(--secondary); border-radius: 10px;">
                <div style="color: var(--primary); font-weight: bold; margin-bottom: 0.5rem;">Features:</div>
                <ul style="text-align: left; color: #ccc; line-height: 1.8;">
                    <li>5x5 grid (25 tiles)</li>
                    <li>Multiple difficulty levels</li>
                    <li>Cash out anytime</li>
                    <li>Progressive multipliers</li>
                </ul>
            </div>
            <a href="/games/mines.php" class="btn btn-primary" style="width: 100%;">Play Mines</a>
        </div>
        
        <div class="game-card fade-in">
            <div class="game-icon">🎡</div>
            <h3>Lucky Spin</h3>
            <p>Spin the colorful wheel of fortune! Watch it rotate and land on amazing prize multipliers.</p>
            <div style="margin: 1rem 0; padding: 1rem; background: var(--secondary); border-radius: 10px;">
                <div style="color: var(--primary); font-weight: bold; margin-bottom: 0.5rem;">Features:</div>
                <ul style="text-align: left; color: #ccc; line-height: 1.8;">
                    <li>Beautiful wheel animation</li>
                    <li>8 prize segments</li>
                    <li>Up to 10x multiplier</li>
                    <li>Smooth spinning action</li>
                </ul>
            </div>
            <a href="/games/lucky-spin.php" class="btn btn-primary" style="width: 100%;">Play Lucky Spin</a>
        </div>
        
        <div class="game-card fade-in">
            <div class="game-icon">🎲</div>
            <h3>Roulette</h3>
            <p>Classic casino roulette! Place bets on red, black, or green and watch the wheel decide your fate.</p>
            <div style="margin: 1rem 0; padding: 1rem; background: var(--secondary); border-radius: 10px;">
                <div style="color: var(--primary); font-weight: bold; margin-bottom: 0.5rem;">Features:</div>
                <ul style="text-align: left; color: #ccc; line-height: 1.8;">
                    <li>Multiple betting options</li>
                    <li>Up to 14x payout</li>
                    <li>Place multiple bets</li>
                    <li>Realistic wheel spin</li>
                </ul>
            </div>
            <a href="/games/roulette.php" class="btn btn-primary" style="width: 100%;">Play Roulette</a>
        </div>
    </div>
    
    <div style="margin-top: 4rem; background: linear-gradient(135deg, var(--accent), var(--secondary-light)); padding: 3rem; border-radius: 15px; border: 2px solid var(--primary); text-align: center;">
        <h2 style="color: var(--primary); margin-bottom: 1rem;">🎁 Daily Bonus</h2>
        <p style="font-size: 1.1rem; margin-bottom: 1.5rem;">Get 1,000 free coins every day! Come back tomorrow for more.</p>
        <button onclick="claimDailyBonus()" class="btn btn-primary" style="font-size: 1.1rem; padding: 1rem 2rem;">Claim Daily Bonus</button>
        <div id="bonus-result" style="margin-top: 1rem;"></div>
    </div>
    
    <div style="margin-top: 3rem; background: var(--bg-card); padding: 2rem; border-radius: 15px; border: 1px solid var(--primary);">
        <h3 style="color: var(--primary); text-align: center; margin-bottom: 1.5rem;">⚠️ Important Information</h3>
        <div style="color: #ccc; line-height: 1.8;">
            <p style="margin-bottom: 1rem;">
                <strong>This is a social casino for entertainment purposes only.</strong> All games use virtual coins that have no real-world value.
            </p>
            <p style="margin-bottom: 1rem;">
                ✓ 100% Free to Play<br>
                ✓ No Real Money Gambling<br>
                ✓ No Deposits or Withdrawals<br>
                ✓ For Entertainment Only<br>
                ✓ Must be 18+ to play
            </p>
            <p>
                If you or someone you know has a gambling problem, please visit <a href="/pages/responsible-gaming.php" style="color: var(--primary);">Responsible Gaming</a> for resources and support.
            </p>
        </div>
    </div>
</div>

<script>
// Update balance display
document.addEventListener('DOMContentLoaded', function() {
    const balance = getBalance();
    document.getElementById('balance-large').textContent = formatCoins(balance) + ' Coins';
});

function claimDailyBonus() {
    const result = claimDailyBonus();
    const resultDiv = document.getElementById('bonus-result');
    
    if (result.success) {
        resultDiv.innerHTML = '<div class="alert alert-success">🎉 Bonus claimed! +' + result.amount + ' coins added!</div>';
        document.getElementById('balance-large').textContent = formatCoins(getBalance()) + ' Coins';
    } else {
        resultDiv.innerHTML = '<div class="alert alert-warning">⏰ ' + result.message + '</div>';
    }
}
</script>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
