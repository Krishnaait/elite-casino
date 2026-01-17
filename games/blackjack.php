<?php
$pageTitle = 'Blackjack - Elite Casino';
require_once __DIR__ . '/../includes/header.php';
?>

<div class="container">
    <h1 class="game-title">🃏 Blackjack</h1>
    
    <div class="game-container">
        <p style="text-align: center; margin-bottom: 2rem;">Beat the dealer by getting as close to 21 as possible without going over!</p>
        
        <div class="game-board" style="background: linear-gradient(135deg, #1a3a52, #0f2537); padding: 2rem; border-radius: 15px; border: 2px solid var(--primary);">
            
            <!-- Dealer Section -->
            <div style="margin-bottom: 3rem; text-align: center;">
                <h3 style="color: var(--primary); margin-bottom: 1rem;">🎩 Dealer's Hand</h3>
                <div id="dealer-cards" style="display: flex; gap: 10px; justify-content: center; min-height: 120px; flex-wrap: wrap;"></div>
                <div id="dealer-score" style="margin-top: 1rem; font-size: 1.2rem; color: #fff;"></div>
            </div>
            
            <!-- Player Section -->
            <div style="text-align: center;">
                <h3 style="color: var(--primary); margin-bottom: 1rem;">👤 Your Hand</h3>
                <div id="player-cards" style="display: flex; gap: 10px; justify-content: center; min-height: 120px; flex-wrap: wrap;"></div>
                <div id="player-score" style="margin-top: 1rem; font-size: 1.2rem; color: #fff;"></div>
            </div>
            
            <!-- Game Message -->
            <div id="game-message" style="text-align: center; margin: 2rem 0; font-size: 1.3rem; min-height: 40px; font-weight: bold;"></div>
            
            <!-- Betting Section -->
            <div id="betting-section" style="text-align: center; margin: 2rem 0;">
                <label for="bet-amount" style="color: var(--primary); font-weight: bold; margin-right: 1rem;">Bet Amount:</label>
                <select id="bet-amount" style="padding: 0.5rem 1rem; background: var(--bg-card); color: #fff; border: 1px solid var(--primary); border-radius: 5px; font-size: 1rem;">
                    <option value="10">10 Coins</option>
                    <option value="50" selected>50 Coins</option>
                    <option value="100">100 Coins</option>
                    <option value="250">250 Coins</option>
                    <option value="500">500 Coins</option>
                </select>
            </div>
            
            <!-- Action Buttons -->
            <div style="display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                <button id="deal-btn" class="btn btn-primary" style="font-size: 1.1rem; padding: 1rem 2rem;">🎴 Deal Cards</button>
                <button id="hit-btn" class="btn btn-primary" style="font-size: 1.1rem; padding: 1rem 2rem; display: none;">👊 Hit</button>
                <button id="stand-btn" class="btn" style="font-size: 1.1rem; padding: 1rem 2rem; background: var(--secondary); display: none;">✋ Stand</button>
                <button id="double-btn" class="btn" style="font-size: 1.1rem; padding: 1rem 2rem; background: var(--accent); display: none;">💰 Double Down</button>
            </div>
        </div>
        
        <!-- Rules Section -->
        <div style="background: var(--bg-card); padding: 2rem; border-radius: 15px; border: 1px solid var(--primary); margin-top: 2rem;">
            <h3 style="color: var(--primary); margin-bottom: 1rem;">📖 How to Play</h3>
            <ul style="line-height: 2;">
                <li>Goal: Get a hand value closer to 21 than the dealer without going over</li>
                <li>Number cards (2-10) are worth their face value</li>
                <li>Face cards (J, Q, K) are worth 10 points</li>
                <li>Aces can be worth 1 or 11 points (whichever is better)</li>
                <li><strong>Blackjack:</strong> Ace + 10-value card = 21 (pays 2.5x)</li>
                <li><strong>Hit:</strong> Take another card</li>
                <li><strong>Stand:</strong> Keep your current hand</li>
                <li><strong>Double Down:</strong> Double your bet and take exactly one more card</li>
                <li>Dealer must hit on 16 or less, stand on 17 or more</li>
                <li>If you bust (go over 21), you lose immediately</li>
            </ul>
            <p style="margin-top: 1rem; color: var(--primary); font-weight: bold;">💡 Tip: Basic strategy suggests standing on 17+ and hitting on 16 or less!</p>
        </div>
    </div>
</div>

<script src="/js/wallet.js"></script>
<script src="/js/game-history.js"></script>
<script src="/js/blackjack.js"></script>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
