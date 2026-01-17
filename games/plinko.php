<?php
$pageTitle = 'Plinko - Elite Casino';
require_once __DIR__ . '/../includes/header.php';
?>

<div class="container">
    <h1 class="game-title">🎯 Plinko</h1>
    
    <div class="game-container">
        <p style="text-align: center; margin-bottom: 2rem;">Drop the ball and watch it bounce through the pegs to win big multipliers!</p>
        
        <div class="game-board" style="background: linear-gradient(135deg, #1a3a52, #0f2537); padding: 2rem; border-radius: 15px; border: 2px solid var(--primary);">
            
            <!-- Plinko Board -->
            <div style="position: relative; margin: 2rem auto; max-width: 600px;">
                <canvas id="plinko-canvas" width="600" height="700" style="border: 2px solid var(--primary); border-radius: 10px; background: #0a1929; display: block; margin: 0 auto;"></canvas>
            </div>
            
            <!-- Game Controls -->
            <div style="text-align: center; margin: 2rem 0;">
                <div style="margin-bottom: 1.5rem;">
                    <label for="bet-amount" style="color: var(--primary); font-weight: bold; margin-right: 1rem;">Bet Amount:</label>
                    <select id="bet-amount" style="padding: 0.5rem 1rem; background: var(--bg-card); color: #fff; border: 1px solid var(--primary); border-radius: 5px; font-size: 1rem;">
                        <option value="10">10 Coins</option>
                        <option value="50" selected>50 Coins</option>
                        <option value="100">100 Coins</option>
                        <option value="250">250 Coins</option>
                        <option value="500">500 Coins</option>
                    </select>
                </div>
                
                <button id="drop-btn" class="btn btn-primary" style="font-size: 1.2rem; padding: 1rem 3rem;">🎯 Drop Ball</button>
            </div>
            
            <!-- Game Message -->
            <div id="game-message" style="text-align: center; margin: 1.5rem 0; font-size: 1.3rem; min-height: 40px; font-weight: bold;"></div>
        </div>
        
        <!-- Multipliers Info -->
        <div style="background: var(--bg-card); padding: 2rem; border-radius: 15px; border: 1px solid var(--primary); margin-top: 2rem;">
            <h3 style="color: var(--primary); margin-bottom: 1rem;">💰 Multipliers</h3>
            <div style="display: flex; justify-content: space-around; flex-wrap: wrap; gap: 1rem;">
                <div style="text-align: center; padding: 1rem; background: linear-gradient(135deg, #e74c3c, #c0392b); border-radius: 10px; min-width: 80px;">
                    <div style="font-size: 1.5rem; font-weight: bold;">16x</div>
                    <div style="font-size: 0.8rem;">Jackpot!</div>
                </div>
                <div style="text-align: center; padding: 1rem; background: linear-gradient(135deg, #e67e22, #d35400); border-radius: 10px; min-width: 80px;">
                    <div style="font-size: 1.5rem; font-weight: bold;">9x</div>
                    <div style="font-size: 0.8rem;">Great!</div>
                </div>
                <div style="text-align: center; padding: 1rem; background: linear-gradient(135deg, #f39c12, #e67e22); border-radius: 10px; min-width: 80px;">
                    <div style="font-size: 1.5rem; font-weight: bold;">4x</div>
                    <div style="font-size: 0.8rem;">Good</div>
                </div>
                <div style="text-align: center; padding: 1rem; background: linear-gradient(135deg, #27ae60, #229954); border-radius: 10px; min-width: 80px;">
                    <div style="font-size: 1.5rem; font-weight: bold;">2x</div>
                    <div style="font-size: 0.8rem;">Nice</div>
                </div>
                <div style="text-align: center; padding: 1rem; background: linear-gradient(135deg, #3498db, #2980b9); border-radius: 10px; min-width: 80px;">
                    <div style="font-size: 1.5rem; font-weight: bold;">1x</div>
                    <div style="font-size: 0.8rem;">Break Even</div>
                </div>
                <div style="text-align: center; padding: 1rem; background: linear-gradient(135deg, #95a5a6, #7f8c8d); border-radius: 10px; min-width: 80px;">
                    <div style="font-size: 1.5rem; font-weight: bold;">0.5x</div>
                    <div style="font-size: 0.8rem;">Loss</div>
                </div>
            </div>
        </div>
        
        <!-- Rules Section -->
        <div style="background: var(--bg-card); padding: 2rem; border-radius: 15px; border: 1px solid var(--primary); margin-top: 2rem;">
            <h3 style="color: var(--primary); margin-bottom: 1rem;">📖 How to Play</h3>
            <ul style="line-height: 2;">
                <li>Choose your bet amount</li>
                <li>Click "Drop Ball" to release the ball from the top</li>
                <li>Watch the ball bounce through the pegs</li>
                <li>The ball lands in one of the multiplier slots at the bottom</li>
                <li>Win based on the multiplier where the ball lands</li>
                <li>Center slots have lower multipliers but higher probability</li>
                <li>Edge slots have higher multipliers but lower probability</li>
            </ul>
            <p style="margin-top: 1rem; color: var(--primary); font-weight: bold;">💡 Tip: The ball's path is random - every drop is a new chance!</p>
        </div>
    </div>
</div>

<script src="/js/wallet.js"></script>
<script src="/js/game-history.js"></script>
<script src="/js/plinko.js"></script>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
