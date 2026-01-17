<?php
$pageTitle = 'Home';
require_once __DIR__ . '/includes/header.php';
?>

<section class="hero">
    <div class="hero-content fade-in">
        <h1>ELITE CASINO</h1>
        <p>100% Free Social Casino - No Real Money, Pure Entertainment!</p>
        <p style="font-size: 1.2rem; margin-bottom: 2rem;">Play premium casino games with virtual coins. No registration required!</p>
        <a href="/pages/play-now.php" class="btn btn-primary" style="font-size: 1.2rem; padding: 1rem 3rem;">Start Playing Now - It's Free!</a>
        <p style="font-size: 0.9rem; margin-top: 1rem; color: #ccc;">⚠️ For entertainment purposes only. No real money gambling.</p>
    </div>
</section>

<div class="container">
    <h2 class="section-title">🎰 Featured Games</h2>
    
    <div class="games-grid">
        <div class="game-card fade-in">
            <div class="game-icon">🎰</div>
            <h3>Slots</h3>
            <p>Spin the reels and match symbols to win big! Classic 3-reel slot machine with multiple paylines and exciting bonus features.</p>
            <a href="/games/slots.php" class="btn btn-primary">Play Slots</a>
        </div>
        
        <div class="game-card fade-in">
            <div class="game-icon">💣</div>
            <h3>Mines</h3>
            <p>Navigate through the minefield and reveal safe tiles. The more tiles you uncover, the bigger your multiplier grows!</p>
            <a href="/games/mines.php" class="btn btn-primary">Play Mines</a>
        </div>
        
        <div class="game-card fade-in">
            <div class="game-icon">🎡</div>
            <h3>Lucky Spin</h3>
            <p>Spin the wheel of fortune and watch it land on amazing prizes! Multiple prize tiers with increasing rewards.</p>
            <a href="/games/lucky-spin.php" class="btn btn-primary">Play Lucky Spin</a>
        </div>
        
        <div class="game-card fade-in">
            <div class="game-icon">🎲</div>
            <h3>Roulette</h3>
            <p>Place your bets on red, black, or specific numbers. Watch the wheel spin and feel the excitement of classic roulette!</p>
            <a href="/games/roulette.php" class="btn btn-primary">Play Roulette</a>
        </div>
    </div>
    
    <h2 class="section-title">📊 Platform Features</h2>
    
    <div class="stats-grid">
        <div class="stat-card fade-in">
            <h3>10,000</h3>
            <p>Starting Coins</p>
        </div>
        <div class="stat-card fade-in">
            <h3>4</h3>
            <p>Exciting Games</p>
        </div>
        <div class="stat-card fade-in">
            <h3>100%</h3>
            <p>Free to Play</p>
        </div>
        <div class="stat-card fade-in">
            <h3>0</h3>
            <p>Real Money Risk</p>
        </div>
    </div>
    
    <div style="text-align: center; margin: 4rem 0;">
        <h2 class="section-title">🏆 Why Choose Elite Casino?</h2>
        <div class="games-grid">
            <div class="game-card">
                <div class="game-icon">🎁</div>
                <h3>Completely Free</h3>
                <p>Start with 10,000 virtual coins and enjoy unlimited entertainment. No real money, no deposits, no risk!</p>
            </div>
            <div class="game-card">
                <div class="game-icon">🚫</div>
                <h3>No Registration</h3>
                <p>Jump straight into the action! No sign-up forms, no personal information required. Just pure gaming fun.</p>
            </div>
            <div class="game-card">
                <div class="game-icon">📱</div>
                <h3>Play Anywhere</h3>
                <p>Fully responsive design lets you enjoy games on desktop, tablet, or mobile devices seamlessly.</p>
            </div>
            <div class="game-card">
                <div class="game-icon">🎮</div>
                <h3>Pure Entertainment</h3>
                <p>Experience the thrill of casino games without any financial risk. It's all about fun and excitement!</p>
            </div>
        </div>
    </div>
    
    <div style="text-align: center; background: linear-gradient(135deg, var(--accent), var(--secondary-light)); padding: 3rem; border-radius: 15px; border: 2px solid var(--primary); margin: 3rem 0;">
        <h2 style="color: var(--primary); margin-bottom: 1rem;">🎲 Ready to Experience the Thrill?</h2>
        <p style="font-size: 1.2rem; margin-bottom: 2rem;">No downloads, no registration, no real money - just instant fun!</p>
        <a href="/pages/play-now.php" class="btn btn-primary" style="font-size: 1.1rem; padding: 1rem 2.5rem;">Play All Games Now</a>
        <div style="margin-top: 2rem; padding-top: 2rem; border-top: 1px solid rgba(212, 175, 55, 0.3);">
            <p style="font-size: 0.9rem; color: #ccc;">
                <strong>Important:</strong> This is a social casino for entertainment purposes only. 
                No real money gambling. Virtual coins have no real-world value.
            </p>
        </div>
    </div>
    
    <div style="background: var(--bg-card); padding: 2rem; border-radius: 15px; border: 1px solid var(--primary); margin: 3rem 0;">
        <h3 style="color: var(--primary); text-align: center; margin-bottom: 1.5rem;">Daily Bonus Available!</h3>
        <p style="text-align: center; margin-bottom: 1.5rem;">Claim your free 1,000 coins every day. Come back tomorrow for more!</p>
        <div style="text-align: center;">
            <button onclick="claimBonus()" class="btn btn-primary">Claim Daily Bonus</button>
        </div>
        <div id="bonus-message" style="text-align: center; margin-top: 1rem;"></div>
    </div>
</div>

<script>
function claimBonus() {
    const result = claimDailyBonus();
    const messageDiv = document.getElementById('bonus-message');
    
    if (result.success) {
        messageDiv.innerHTML = '<div class="alert alert-success">🎉 Bonus claimed! +' + result.amount + ' coins added to your balance!</div>';
    } else {
        messageDiv.innerHTML = '<div class="alert alert-warning">⏰ ' + result.message + '</div>';
    }
}
</script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
