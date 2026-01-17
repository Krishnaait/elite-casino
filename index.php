<?php
$pageTitle = 'Home';
require_once __DIR__ . '/includes/header.php';
?>

<section class="hero" style="background: 
    linear-gradient(rgba(10, 25, 47, 0.88), rgba(10, 25, 47, 0.88)),
    linear-gradient(45deg, rgba(212, 175, 55, 0.05) 0%, transparent 50%, rgba(212, 175, 55, 0.05) 100%),
    url('images/casino-hero.jpg') center/cover,
    url('images/casino-luxury.jpg') center/cover,
    url('images/casino-chips.jpg') center/cover;
    background-blend-mode: normal, overlay, normal, normal, normal;
    animation: backgroundSlide 20s ease-in-out infinite;
    min-height: 600px; display: flex; align-items: center; position: relative; overflow: hidden;">
    <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: radial-gradient(circle at 50% 50%, rgba(212, 175, 55, 0.1) 0%, transparent 70%);"></div>
    <div class="hero-content fade-in" style="position: relative; z-index: 2;">
        <div style="display: inline-block; padding: 0.5rem 2rem; background: linear-gradient(135deg, rgba(212, 175, 55, 0.2), rgba(184, 134, 11, 0.2)); border: 2px solid var(--primary); border-radius: 50px; margin-bottom: 1.5rem;">
            <span style="font-size: 0.9rem; color: var(--primary); font-weight: bold; letter-spacing: 2px;">✨ PREMIUM GAMING EXPERIENCE</span>
        </div>
        <h1 style="font-size: 4rem; margin-bottom: 1rem; text-shadow: 0 0 30px rgba(212, 175, 55, 0.5);">🎰 RISHIKANT</h1>
        <p style="font-size: 1.5rem; color: var(--primary); margin-bottom: 1rem; font-weight: 600;">100% Free Social Casino</p>
        <p style="font-size: 1.2rem; margin-bottom: 2.5rem; max-width: 700px; margin-left: auto; margin-right: auto; line-height: 1.6;">Experience the thrill of premium casino games with virtual coins. No real money, no registration, just pure entertainment!</p>
        <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap; margin-bottom: 2rem;">
            <a href="/pages/play-now.php" class="btn btn-primary" style="font-size: 1.3rem; padding: 1.2rem 3rem; box-shadow: 0 0 30px rgba(212, 175, 55, 0.4);">🎮 Start Playing Now</a>
            <a href="/pages/about.php" class="btn" style="font-size: 1.3rem; padding: 1.2rem 3rem; background: rgba(255,255,255,0.1); border: 2px solid var(--primary);">📖 Learn More</a>
        </div>
        <div style="display: flex; gap: 3rem; justify-content: center; flex-wrap: wrap; margin-top: 3rem; padding-top: 2rem; border-top: 1px solid rgba(212, 175, 55, 0.3);">
            <div style="text-align: center;">
                <div style="font-size: 2.5rem; color: var(--primary); font-weight: bold;">10,000</div>
                <div style="font-size: 0.9rem; color: #ccc;">Free Starting Coins</div>
            </div>
            <div style="text-align: center;">
                <div style="font-size: 2.5rem; color: var(--primary); font-weight: bold;">6</div>
                <div style="font-size: 0.9rem; color: #ccc;">Exciting Games</div>
            </div>
            <div style="text-align: center;">
                <div style="font-size: 2.5rem; color: var(--primary); font-weight: bold;">100%</div>
                <div style="font-size: 0.9rem; color: #ccc;">Free to Play</div>
            </div>
            <div style="text-align: center;">
                <div style="font-size: 2.5rem; color: var(--primary); font-weight: bold;">0</div>
                <div style="font-size: 0.9rem; color: #ccc;">Real Money Risk</div>
            </div>
        </div>
        <p style="font-size: 0.85rem; margin-top: 2rem; color: rgba(255,255,255,0.6); max-width: 600px; margin-left: auto; margin-right: auto;">⚠️ For entertainment purposes only. No real money gambling. Virtual coins have no real-world value.</p>
    </div>
</section>

<div class="container">
    <h2 class="section-title">🎰 Featured Games</h2>
    
    <div class="games-grid">
        <div class="game-card fade-in">
            <div class="game-icon">🎰</div>
            <h3>Slots</h3>
            <p>Spin the reels and match symbols to win big! Classic 3-reel slot machine with multiple paylines and exciting bonus features.</p>
            <a href="./games/slots.php" class="btn btn-primary">Play Slots</a>
        </div>
        
        <div class="game-card fade-in">
            <div class="game-icon">💣</div>
            <h3>Mines</h3>
            <p>Navigate through the minefield and reveal safe tiles. The more tiles you uncover, the bigger your multiplier grows!</p>
            <a href="./games/mines.php" class="btn btn-primary">Play Mines</a>
        </div>
        
        <div class="game-card fade-in">
            <div class="game-icon">🎡</div>
            <h3>Lucky Spin</h3>
            <p>Spin the wheel of fortune and watch it land on amazing prizes! Multiple prize tiers with increasing rewards.</p>
            <a href="./games/lucky-spin.php" class="btn btn-primary">Play Lucky Spin</a>
        </div>
        
        <div class="game-card fade-in">
            <div class="game-icon">🃏</div>
            <h3>Blackjack</h3>
            <p>Beat the dealer by getting as close to 21 as possible! Classic card game with hit, stand, and double down options.</p>
            <a href="./games/blackjack.php" class="btn btn-primary">Play Blackjack</a>
        </div>
        
        <div class="game-card fade-in">
            <div class="game-icon">🎯</div>
            <h3>Plinko</h3>
            <p>Drop the ball and watch it bounce through pegs! Land in high multiplier slots for massive wins up to 16x!</p>
            <a href="./games/plinko.php" class="btn btn-primary">Play Plinko</a>
        </div>
        
        <div class="game-card fade-in">
            <div class="game-icon">🎲</div>
            <h3>Dice</h3>
            <p>Roll the dice and predict over or under! Adjust your target number for different multipliers and risk levels.</p>
            <a href="./games/dice.php" class="btn btn-primary">Play Dice</a>
        </div>
    </div>
    
    <h2 class="section-title">📊 Platform Features</h2>
    
    <div class="stats-grid">
        <div class="stat-card fade-in">
            <h3>10,000</h3>
            <p>Starting Coins</p>
        </div>
        <div class="stat-card fade-in">
            <h3>6</h3>
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
        <h2 class="section-title">🏆 Why Choose RISHIKANT?</h2>
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
    
    <!-- How It Works Section -->
    <div style="margin: 4rem 0;">
        <h2 class="section-title">📝 How It Works</h2>
        <div class="games-grid" style="grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));">
            <div class="stat-card fade-in" style="text-align: center;">
                <div style="font-size: 3rem; margin-bottom: 1rem;">👉</div>
                <h3 style="color: var(--primary); margin-bottom: 0.5rem;">Step 1</h3>
                <p>Visit RISHIKANT website</p>
            </div>
            <div class="stat-card fade-in" style="text-align: center;">
                <div style="font-size: 3rem; margin-bottom: 1rem;">🎮</div>
                <h3 style="color: var(--primary); margin-bottom: 0.5rem;">Step 2</h3>
                <p>Choose your favorite game</p>
            </div>
            <div class="stat-card fade-in" style="text-align: center;">
                <div style="font-size: 3rem; margin-bottom: 1rem;">💰</div>
                <h3 style="color: var(--primary); margin-bottom: 0.5rem;">Step 3</h3>
                <p>Start with 10,000 free coins</p>
            </div>
            <div class="stat-card fade-in" style="text-align: center;">
                <div style="font-size: 3rem; margin-bottom: 1rem;">🎉</div>
                <h3 style="color: var(--primary); margin-bottom: 0.5rem;">Step 4</h3>
                <p>Play and enjoy instantly!</p>
            </div>
        </div>
    </div>
    
    <!-- Safe & Fair Gaming Section -->
    <div style="margin: 4rem 0; background: var(--bg-card); padding: 3rem; border-radius: 15px; border: 2px solid var(--primary);">
        <h2 class="section-title">✅ Safe & Fair Gaming</h2>
        <div class="games-grid">
            <div class="game-card">
                <div class="game-icon">🔒</div>
                <h3>Secure Platform</h3>
                <p>Your privacy is our priority. No personal data collection, no registration required. Play anonymously and safely.</p>
            </div>
            <div class="game-card">
                <div class="game-icon">⚖️</div>
                <h3>Fair Play Guaranteed</h3>
                <p>All games use certified Random Number Generators (RNG) to ensure completely fair and unbiased results every time.</p>
            </div>
            <div class="game-card">
                <div class="game-icon">🏢</div>
                <h3>Registered Company</h3>
                <p>Operated by RISHIKANT KULPATI IMPEX INDIA PVT LTD - A legally registered Indian company (CIN: U52601DL2019PTC358816).</p>
            </div>
            <div class="game-card">
                <div class="game-icon">📧</div>
                <h3>Email Support</h3>
                <p>Need help? Our support team is available via email. We respond to all queries promptly and professionally.</p>
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
    
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
