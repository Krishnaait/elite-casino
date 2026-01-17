/**
 * Elite Casino - Mines Game Engine
 * Grid-based mine avoidance game with multiplier system
 */

const GRID_SIZE = 25; // 5x5 grid
let gameActive = false;
let betAmount = 0;
let mineCount = 0;
let minePositions = [];
let revealedTiles = 0;
let currentMultiplier = 1.0;

function initializeGrid() {
    const grid = document.getElementById('mines-grid');
    grid.innerHTML = '';
    
    for (let i = 0; i < GRID_SIZE; i++) {
        const tile = document.createElement('div');
        tile.className = 'mine-tile';
        tile.id = 'tile-' + i;
        tile.style.cssText = `
            background: var(--secondary);
            border: 2px solid var(--primary);
            border-radius: 8px;
            aspect-ratio: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            cursor: pointer;
            transition: all 0.3s ease;
        `;
        tile.onclick = () => revealTile(i);
        tile.onmouseenter = () => {
            if (gameActive && !tile.classList.contains('revealed')) {
                tile.style.transform = 'scale(1.05)';
                tile.style.borderColor = 'var(--warning)';
            }
        };
        tile.onmouseleave = () => {
            if (gameActive && !tile.classList.contains('revealed')) {
                tile.style.transform = 'scale(1)';
                tile.style.borderColor = 'var(--primary)';
            }
        };
        grid.appendChild(tile);
    }
}

function startGame() {
    betAmount = parseInt(document.getElementById('bet-amount').value);
    mineCount = parseInt(document.getElementById('mine-count').value);
    
    // Check balance
    if (!canAfford(betAmount)) {
        showMessage('Insufficient balance! 😢', 'danger');
        return;
    }
    
    // Place bet
    const betResult = placeBet(betAmount);
    if (!betResult.success) {
        showMessage(betResult.message, 'danger');
        return;
    }
    
    // Initialize game
    gameActive = true;
    revealedTiles = 0;
    currentMultiplier = 1.0;
    minePositions = generateMinePositions();
    
    // Update UI
    document.getElementById('current-bet').textContent = formatCoins(betAmount);
    document.getElementById('tiles-revealed').textContent = '0';
    document.getElementById('current-multiplier').textContent = '1.00x';
    document.getElementById('potential-win').textContent = formatCoins(betAmount);
    document.getElementById('start-controls').style.display = 'none';
    document.getElementById('cashout-controls').style.display = 'flex';
    
    initializeGrid();
    showMessage('Click on tiles to reveal them! 🎯', 'info');
}

function generateMinePositions() {
    const positions = [];
    while (positions.length < mineCount) {
        const pos = Math.floor(Math.random() * GRID_SIZE);
        if (!positions.includes(pos)) {
            positions.push(pos);
        }
    }
    return positions;
}

function revealTile(position) {
    if (!gameActive) return;
    
    const tile = document.getElementById('tile-' + position);
    if (tile.classList.contains('revealed')) return;
    
    tile.classList.add('revealed');
    tile.style.cursor = 'default';
    
    if (minePositions.includes(position)) {
        // Hit a mine!
        tile.textContent = '💣';
        tile.style.background = 'linear-gradient(135deg, #dc3545, #c82333)';
        tile.style.animation = 'explode 0.5s ease';
        gameOver(false);
    } else {
        // Safe tile!
        tile.textContent = '💎';
        tile.style.background = 'linear-gradient(135deg, var(--success), #1e7e34)';
        tile.style.animation = 'reveal 0.3s ease';
        
        revealedTiles++;
        updateMultiplier();
        showMessage(`Safe! Keep going or cash out! 💎`, 'success');
    }
}

function updateMultiplier() {
    // Calculate multiplier based on revealed tiles and mine count
    const safeTiles = GRID_SIZE - mineCount;
    const multiplierIncrease = (mineCount / safeTiles) * 0.3;
    currentMultiplier = 1.0 + (revealedTiles * multiplierIncrease);
    
    const potentialWin = Math.floor(betAmount * currentMultiplier);
    
    document.getElementById('tiles-revealed').textContent = revealedTiles;
    document.getElementById('current-multiplier').textContent = currentMultiplier.toFixed(2) + 'x';
    document.getElementById('potential-win').textContent = formatCoins(potentialWin);
}

function cashOut() {
    if (!gameActive) return;
    
    const winAmount = Math.floor(betAmount * currentMultiplier);
    addWinnings(winAmount, currentMultiplier);
    
    showMessage(`🎉 Cashed out! You won ${formatCoins(winAmount)} coins!`, 'success');
    gameOver(true);
}

function gameOver(won) {
    gameActive = false;
    
    // Reveal all mines
    minePositions.forEach(pos => {
        const tile = document.getElementById('tile-' + pos);
        if (!tile.classList.contains('revealed')) {
            tile.textContent = '💣';
            tile.style.background = 'rgba(220, 53, 69, 0.3)';
            tile.style.cursor = 'default';
        }
    });
    
    if (!won) {
        showMessage('💥 BOOM! You hit a mine! Try again!', 'danger');
    }
    
    document.getElementById('cashout-controls').style.display = 'none';
    document.getElementById('start-controls').style.display = 'flex';
}

function resetGame() {
    gameActive = false;
    revealedTiles = 0;
    currentMultiplier = 1.0;
    minePositions = [];
    
    document.getElementById('current-bet').textContent = '0';
    document.getElementById('tiles-revealed').textContent = '0';
    document.getElementById('current-multiplier').textContent = '1.00x';
    document.getElementById('potential-win').textContent = '0';
    document.getElementById('game-message').innerHTML = '';
    document.getElementById('cashout-controls').style.display = 'none';
    document.getElementById('start-controls').style.display = 'flex';
    
    initializeGrid();
}

function showMessage(message, type) {
    const messageDiv = document.getElementById('game-message');
    let color = 'var(--text-light)';
    
    if (type === 'success') color = 'var(--success)';
    else if (type === 'danger') color = 'var(--danger)';
    else if (type === 'warning') color = 'var(--warning)';
    else if (type === 'info') color = 'var(--primary)';
    
    messageDiv.innerHTML = `<span style="color: ${color};">${message}</span>`;
}

// Add CSS animations
const style = document.createElement('style');
style.textContent = `
    @keyframes explode {
        0% { transform: scale(1); }
        50% { transform: scale(1.3); }
        100% { transform: scale(1); }
    }
    @keyframes reveal {
        0% { transform: scale(0.8); opacity: 0; }
        100% { transform: scale(1); opacity: 1; }
    }
`;
document.head.appendChild(style);

// Initialize on page load
document.addEventListener('DOMContentLoaded', function() {
    initializeGrid();
});
