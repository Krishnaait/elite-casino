<?php
$pageTitle = 'Slots Game';
require_once __DIR__ . '/../includes/header.php';
?>

<div class="container">
    <h1 class="section-title">🎰 Slots Game</h1>
    
    <div class="game-container" style="max-width: 700px; margin: 0 auto;">
        <div style="text-align: center; margin-bottom: 2rem;">
            <p style="font-size: 1.1rem; color: #ccc;">Match 3 symbols to win! Different symbols have different payouts.</p>
        </div>
        
        <!-- Slot Machine Display -->
        <div id="slot-machine" style="background: linear-gradient(135deg, var(--bg-card), var(--secondary-light)); padding: 3rem; border-radius: 20px; border: 3px solid var(--primary); box-shadow: 0 0 30px var(--shadow-gold);">
            <div id="reels" style="display: flex; justify-content: center; gap: 1rem; margin-bottom: 2rem;">
                <div class="reel" style="background: var(--secondary); border: 2px solid var(--primary); border-radius: 10px; padding: 2rem 1rem; min-width: 120px;">
                    <div class="symbol" id="reel1" style="font-size: 4rem; text-align: center;">🍒</div>
                </div>
                <div class="reel" style="background: var(--secondary); border: 2px solid var(--primary); border-radius: 10px; padding: 2rem 1rem; min-width: 120px;">
                    <div class="symbol" id="reel2" style="font-size: 4rem; text-align: center;">🍒</div>
                </div>
                <div class="reel" style="background: var(--secondary); border: 2px solid var(--primary); border-radius: 10px; padding: 2rem 1rem; min-width: 120px;">
                    <div class="symbol" id="reel3" style="font-size: 4rem; text-align: center;">🍒</div>
                </div>
            </div>
            
            <div id="result-message" style="text-align: center; min-height: 60px; font-size: 1.5rem; font-weight: bold; margin-bottom: 1rem;"></div>
            
            <!-- Game Controls -->
            <div class="game-controls">
                <div style="display: flex; align-items: center; gap: 1rem;">
                    <label style="color: var(--primary); font-weight: bold;">Bet Amount:</label>
                    <select id="bet-amount" class="bet-input" style="width: 150px;">
                        <option value="10">10 Coins</option>
                        <option value="50" selected>50 Coins</option>
                        <option value="100">100 Coins</option>
                        <option value="250">250 Coins</option>
                        <option value="500">500 Coins</option>
                    </select>
                </div>
                <button id="spin-btn" onclick="spin()" class="btn btn-primary" style="font-size: 1.2rem; padding: 1rem 3rem;">
                    🎰 SPIN
                </button>
            </div>
        </div>
        
        <!-- Paytable -->
        <div style="margin-top: 3rem; background: var(--bg-card); padding: 2rem; border-radius: 15px; border: 1px solid var(--primary);">
            <h3 style="color: var(--primary); text-align: center; margin-bottom: 1.5rem;">💰 Paytable</h3>
            <table style="width: 100%;">
                <thead>
                    <tr>
                        <th>Symbols</th>
                        <th>Payout</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="font-size: 1.5rem;">💎 💎 💎</td>
                        <td style="color: var(--primary); font-weight: bold;">50x Bet</td>
                    </tr>
                    <tr>
                        <td style="font-size: 1.5rem;">⭐ ⭐ ⭐</td>
                        <td style="color: var(--primary); font-weight: bold;">20x Bet</td>
                    </tr>
                    <tr>
                        <td style="font-size: 1.5rem;">🍀 🍀 🍀</td>
                        <td style="color: var(--primary); font-weight: bold;">10x Bet</td>
                    </tr>
                    <tr>
                        <td style="font-size: 1.5rem;">🍒 🍒 🍒</td>
                        <td style="color: var(--primary); font-weight: bold;">5x Bet</td>
                    </tr>
                    <tr>
                        <td style="font-size: 1.5rem;">🍋 🍋 🍋</td>
                        <td style="color: var(--primary); font-weight: bold;">3x Bet</td>
                    </tr>
                    <tr>
                        <td style="font-size: 1.5rem;">🍊 🍊 🍊</td>
                        <td style="color: var(--primary); font-weight: bold;">2x Bet</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="/js/slots.js"></script>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
