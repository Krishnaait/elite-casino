<?php
$pageTitle = 'Roulette';
require_once __DIR__ . '/../includes/header.php';
?>

<div class="container">
    <h1 class="section-title">🎲 Roulette</h1>
    
    <div class="game-container" style="max-width: 900px; margin: 0 auto;">
        <div style="text-align: center; margin-bottom: 2rem;">
            <p style="font-size: 1.1rem; color: #ccc;">Place your bets and watch the wheel spin!</p>
        </div>
        
        <div style="background: linear-gradient(135deg, var(--bg-card), var(--secondary-light)); padding: 2rem; border-radius: 20px; border: 3px solid var(--primary); box-shadow: 0 0 30px var(--shadow-gold);">
            
            <!-- Roulette Wheel -->
            <div style="text-align: center; margin-bottom: 2rem;">
                <div id="roulette-wheel" style="width: 300px; height: 300px; margin: 0 auto; position: relative; border-radius: 50%; background: linear-gradient(135deg, #2c3e50, #34495e); border: 5px solid var(--primary); box-shadow: 0 0 30px var(--shadow-gold);">
                    <div id="wheel-number" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); font-size: 4rem; font-weight: bold; color: var(--primary);">0</div>
                </div>
                <div id="result-message" style="margin-top: 1rem; min-height: 50px; font-size: 1.5rem; font-weight: bold;"></div>
            </div>
            
            <!-- Betting Table -->
            <div style="background: var(--secondary); padding: 2rem; border-radius: 15px; border: 2px solid var(--primary);">
                <h3 style="color: var(--primary); text-align: center; margin-bottom: 1.5rem;">Place Your Bets</h3>
                
                <!-- Bet Amount Selection -->
                <div style="text-align: center; margin-bottom: 2rem;">
                    <label style="color: var(--primary); font-weight: bold; margin-right: 1rem;">Chip Value:</label>
                    <select id="chip-value" class="bet-input">
                        <option value="10">10 Coins</option>
                        <option value="50" selected>50 Coins</option>
                        <option value="100">100 Coins</option>
                        <option value="250">250 Coins</option>
                        <option value="500">500 Coins</option>
                    </select>
                </div>
                
                <!-- Betting Options -->
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); gap: 1rem; margin-bottom: 2rem;">
                    <button onclick="placeBetOn('red')" class="bet-button" style="background: linear-gradient(135deg, #e74c3c, #c0392b); color: white; padding: 1.5rem; border: 2px solid var(--primary); border-radius: 10px; font-weight: bold; cursor: pointer; transition: all 0.3s;">
                        RED (2x)
                    </button>
                    <button onclick="placeBetOn('black')" class="bet-button" style="background: linear-gradient(135deg, #34495e, #2c3e50); color: white; padding: 1.5rem; border: 2px solid var(--primary); border-radius: 10px; font-weight: bold; cursor: pointer; transition: all 0.3s;">
                        BLACK (2x)
                    </button>
                    <button onclick="placeBetOn('green')" class="bet-button" style="background: linear-gradient(135deg, #27ae60, #229954); color: white; padding: 1.5rem; border: 2px solid var(--primary); border-radius: 10px; font-weight: bold; cursor: pointer; transition: all 0.3s;">
                        GREEN (14x)
                    </button>
                </div>
                
                <!-- Current Bets Display -->
                <div id="current-bets" style="background: var(--bg-card); padding: 1rem; border-radius: 10px; margin-bottom: 1rem; min-height: 60px;">
                    <div style="color: var(--primary); font-weight: bold; margin-bottom: 0.5rem;">Your Bets:</div>
                    <div id="bets-list" style="color: #ccc;">No bets placed yet</div>
                </div>
                
                <!-- Control Buttons -->
                <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                    <button id="spin-btn" onclick="spinRoulette()" class="btn btn-primary" style="font-size: 1.1rem; padding: 1rem 2rem;">
                        🎲 SPIN
                    </button>
                    <button onclick="clearBets()" class="btn btn-secondary" style="font-size: 1.1rem; padding: 1rem 2rem;">
                        Clear Bets
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Game Rules -->
        <div style="margin-top: 3rem; background: var(--bg-card); padding: 2rem; border-radius: 15px; border: 1px solid var(--primary);">
            <h3 style="color: var(--primary); margin-bottom: 1rem;">📖 How to Play</h3>
            <ul style="color: #ccc; line-height: 2;">
                <li><strong>RED:</strong> Numbers 1-7 (Pays 2x)</li>
                <li><strong>BLACK:</strong> Numbers 8-14 (Pays 2x)</li>
                <li><strong>GREEN:</strong> Number 0 (Pays 14x)</li>
            </ul>
            <p style="color: var(--warning); margin-top: 1rem;">💡 Tip: You can place multiple bets before spinning!</p>
        </div>
    </div>
</div>

<script src="/js/roulette.js"></script>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
