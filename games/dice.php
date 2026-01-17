<?php
$pageTitle = 'Dice - Elite Casino';
require_once __DIR__ . '/../includes/header.php';
?>

<div class="container">
    <h1 class="game-title">🎲 Dice</h1>
    
    <div class="game-container">
        <p style="text-align: center; margin-bottom: 2rem;">Roll the dice and predict if the result will be over or under your target!</p>
        
        <div class="game-board" style="background: linear-gradient(135deg, #1a3a52, #0f2537); padding: 2rem; border-radius: 15px; border: 2px solid var(--primary);">
            
            <!-- Dice Display -->
            <div style="text-align: center; margin: 2rem 0;">
                <div id="dice-result" style="font-size: 8rem; margin: 2rem 0; min-height: 150px; display: flex; justify-content: center; align-items: center;">
                    🎲
                </div>
                <div id="roll-number" style="font-size: 3rem; color: var(--primary); font-weight: bold; margin: 1rem 0;"></div>
            </div>
            
            <!-- Game Controls -->
            <div style="max-width: 500px; margin: 0 auto;">
                <!-- Target Number -->
                <div style="margin-bottom: 2rem;">
                    <label style="color: var(--primary); font-weight: bold; display: block; margin-bottom: 0.5rem;">Target Number: <span id="target-display">50</span></label>
                    <input type="range" id="target-slider" min="2" max="98" value="50" style="width: 100%; height: 8px; background: linear-gradient(to right, #e74c3c 0%, #f39c12 50%, #2ecc71 100%); border-radius: 5px; outline: none;">
                    <div style="display: flex; justify-content: space-between; font-size: 0.8rem; color: #ccc; margin-top: 0.5rem;">
                        <span>2</span>
                        <span>50</span>
                        <span>98</span>
                    </div>
                </div>
                
                <!-- Bet Amount -->
                <div style="margin-bottom: 2rem;">
                    <label for="bet-amount" style="color: var(--primary); font-weight: bold; display: block; margin-bottom: 0.5rem;">Bet Amount:</label>
                    <select id="bet-amount" style="width: 100%; padding: 0.75rem; background: var(--bg-card); color: #fff; border: 1px solid var(--primary); border-radius: 5px; font-size: 1rem;">
                        <option value="10">10 Coins</option>
                        <option value="50" selected>50 Coins</option>
                        <option value="100">100 Coins</option>
                        <option value="250">250 Coins</option>
                        <option value="500">500 Coins</option>
                    </select>
                </div>
                
                <!-- Prediction Buttons -->
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 2rem;">
                    <button id="roll-under-btn" class="btn" style="padding: 1.5rem; font-size: 1.2rem; background: linear-gradient(135deg, #e74c3c, #c0392b);">
                        <div>⬇️ Roll Under</div>
                        <div id="under-multiplier" style="font-size: 0.9rem; margin-top: 0.5rem;">2.00x</div>
                    </button>
                    <button id="roll-over-btn" class="btn" style="padding: 1.5rem; font-size: 1.2rem; background: linear-gradient(135deg, #2ecc71, #27ae60);">
                        <div>⬆️ Roll Over</div>
                        <div id="over-multiplier" style="font-size: 0.9rem; margin-top: 0.5rem;">2.00x</div>
                    </button>
                </div>
                
                <!-- Potential Win -->
                <div style="text-align: center; padding: 1rem; background: rgba(212, 175, 55, 0.1); border: 1px solid var(--primary); border-radius: 10px;">
                    <div style="font-size: 0.9rem; color: #ccc;">Potential Win</div>
                    <div id="potential-win" style="font-size: 1.5rem; color: var(--primary); font-weight: bold; margin-top: 0.5rem;">100 coins</div>
                </div>
            </div>
            
            <!-- Game Message -->
            <div id="game-message" style="text-align: center; margin: 2rem 0; font-size: 1.3rem; min-height: 40px; font-weight: bold;"></div>
        </div>
        
        <!-- Rules Section -->
        <div style="background: var(--bg-card); padding: 2rem; border-radius: 15px; border: 1px solid var(--primary); margin-top: 2rem;">
            <h3 style="color: var(--primary); margin-bottom: 1rem;">📖 How to Play</h3>
            <ul style="line-height: 2;">
                <li>Set your target number using the slider (2-98)</li>
                <li>Choose your bet amount</li>
                <li>Predict if the dice roll will be <strong>UNDER</strong> or <strong>OVER</strong> your target</li>
                <li>The dice rolls a number between 0 and 100</li>
                <li>Win multiplier is calculated based on probability</li>
                <li>Lower target = Higher multiplier for "Over"</li>
                <li>Higher target = Higher multiplier for "Under"</li>
                <li>Target of 50 gives 2x multiplier for both options</li>
            </ul>
            <p style="margin-top: 1rem; color: var(--primary); font-weight: bold;">💡 Tip: Higher risk = Higher reward! Adjust your target for better multipliers.</p>
        </div>
    </div>
</div>

<script src="/js/dice.js"></script>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
