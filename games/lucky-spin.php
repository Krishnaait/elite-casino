<?php
$pageTitle = 'Lucky Spin';
require_once __DIR__ . '/../includes/header.php';
?>

<div class="container">
    <h1 class="section-title">🎡 Lucky Spin</h1>
    
    <div class="game-container" style="max-width: 700px; margin: 0 auto;">
        <div style="text-align: center; margin-bottom: 2rem;">
            <p style="font-size: 1.1rem; color: #ccc;">Spin the wheel and win amazing prizes!</p>
        </div>
        
        <div style="background: linear-gradient(135deg, var(--bg-card), var(--secondary-light)); padding: 3rem 2rem; border-radius: 20px; border: 3px solid var(--primary); box-shadow: 0 0 30px var(--shadow-gold);">
            
            <!-- Wheel Container -->
            <div style="position: relative; width: 400px; height: 400px; margin: 0 auto 2rem;">
                <!-- Pointer -->
                <div style="position: absolute; top: -20px; left: 50%; transform: translateX(-50%); z-index: 10; font-size: 3rem;">
                    ▼
                </div>
                
                <!-- Wheel -->
                <canvas id="wheel-canvas" width="400" height="400" style="border-radius: 50%; box-shadow: 0 0 30px var(--shadow-gold);"></canvas>
            </div>
            
            <div id="result-message" style="text-align: center; min-height: 60px; font-size: 1.5rem; font-weight: bold; margin-bottom: 1rem;"></div>
            
            <!-- Game Controls -->
            <div class="game-controls">
                <div style="display: flex; align-items: center; gap: 1rem;">
                    <label style="color: var(--primary); font-weight: bold;">Bet Amount:</label>
                    <select id="bet-amount" class="bet-input">
                        <option value="10">10 Coins</option>
                        <option value="50" selected>50 Coins</option>
                        <option value="100">100 Coins</option>
                        <option value="250">250 Coins</option>
                        <option value="500">500 Coins</option>
                    </select>
                </div>
                <button id="spin-btn" onclick="spinWheel()" class="btn btn-primary" style="font-size: 1.2rem; padding: 1rem 3rem;">
                    🎡 SPIN THE WHEEL
                </button>
            </div>
        </div>
        
        <!-- Prize Table -->
        <div style="margin-top: 3rem; background: var(--bg-card); padding: 2rem; border-radius: 15px; border: 1px solid var(--primary);">
            <h3 style="color: var(--primary); text-align: center; margin-bottom: 1.5rem;">🏆 Prize Multipliers</h3>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); gap: 1rem;">
                <div style="text-align: center; padding: 1rem; background: var(--secondary); border-radius: 10px;">
                    <div style="font-size: 2rem;">💎</div>
                    <div style="color: var(--primary); font-weight: bold; font-size: 1.3rem;">10x</div>
                </div>
                <div style="text-align: center; padding: 1rem; background: var(--secondary); border-radius: 10px;">
                    <div style="font-size: 2rem;">⭐</div>
                    <div style="color: var(--primary); font-weight: bold; font-size: 1.3rem;">5x</div>
                </div>
                <div style="text-align: center; padding: 1rem; background: var(--secondary); border-radius: 10px;">
                    <div style="font-size: 2rem;">🍀</div>
                    <div style="color: var(--primary); font-weight: bold; font-size: 1.3rem;">3x</div>
                </div>
                <div style="text-align: center; padding: 1rem; background: var(--secondary); border-radius: 10px;">
                    <div style="font-size: 2rem;">🎁</div>
                    <div style="color: var(--primary); font-weight: bold; font-size: 1.3rem;">2x</div>
                </div>
                <div style="text-align: center; padding: 1rem; background: var(--secondary); border-radius: 10px;">
                    <div style="font-size: 2rem;">🎯</div>
                    <div style="color: var(--primary); font-weight: bold; font-size: 1.3rem;">1.5x</div>
                </div>
                <div style="text-align: center; padding: 1rem; background: var(--secondary); border-radius: 10px;">
                    <div style="font-size: 2rem;">💰</div>
                    <div style="color: var(--primary); font-weight: bold; font-size: 1.3rem;">1x</div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="/js/wallet.js"></script>
<script src="/js/game-history.js"></script>
<script src="/js/lucky-spin.js"></script>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
