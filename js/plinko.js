// Plinko Game Engine with Physics - MULTIPLE BALLS SUPPORT
let canvas, ctx;
let balls = []; // Changed from single ball to array of balls
let pegs = [];
let slots = [];
let betAmount = 50;
let animationFrameId = null;

const ROWS = 12;
const PEG_RADIUS = 5;
const BALL_RADIUS = 8;
const GRAVITY = 0.3;
const BOUNCE = 0.7;
const MAX_BALLS = 10; // Maximum simultaneous balls

// Multipliers from center to edge
const MULTIPLIERS = [16, 9, 4, 2, 1, 0.5, 0.5, 1, 2, 4, 9, 16];
const SLOT_COLORS = ['#e74c3c', '#e67e22', '#f39c12', '#27ae60', '#3498db', '#95a5a6', '#95a5a6', '#3498db', '#27ae60', '#f39c12', '#e67e22', '#e74c3c'];

// Initialize game
document.addEventListener('DOMContentLoaded', () => {
    canvas = document.getElementById('plinko-canvas');
    ctx = canvas.getContext('2d');
    
    setupBoard();
    drawBoard();
    startAnimation(); // Start continuous animation loop
    
    document.getElementById('drop-btn').addEventListener('click', dropBall);
    
    document.getElementById('bet-amount').addEventListener('change', (e) => {
        betAmount = parseInt(e.target.value);
    });
});

// Setup board
function setupBoard() {
    const width = canvas.width;
    const height = canvas.height;
    const pegSpacingX = width / (ROWS + 1);
    const pegSpacingY = (height - 100) / (ROWS + 1);
    
    // Create pegs
    pegs = [];
    for (let row = 0; row < ROWS; row++) {
        for (let col = 0; col <= row; col++) {
            const x = width / 2 - (row * pegSpacingX / 2) + (col * pegSpacingX);
            const y = 80 + row * pegSpacingY;
            pegs.push({ x, y, radius: PEG_RADIUS });
        }
    }
    
    // Create slots
    slots = [];
    const slotWidth = width / MULTIPLIERS.length;
    for (let i = 0; i < MULTIPLIERS.length; i++) {
        slots.push({
            x: i * slotWidth,
            y: height - 80,
            width: slotWidth,
            height: 60,
            multiplier: MULTIPLIERS[i],
            color: SLOT_COLORS[i]
        });
    }
}

// Draw board
function drawBoard() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    
    // Draw pegs
    pegs.forEach(peg => {
        ctx.beginPath();
        ctx.arc(peg.x, peg.y, peg.radius, 0, Math.PI * 2);
        ctx.fillStyle = '#d4af37';
        ctx.fill();
        ctx.strokeStyle = '#b8941f';
        ctx.lineWidth = 1;
        ctx.stroke();
    });
    
    // Draw slots
    slots.forEach(slot => {
        ctx.fillStyle = slot.color;
        ctx.fillRect(slot.x, slot.y, slot.width, slot.height);
        
        // Draw border
        ctx.strokeStyle = '#fff';
        ctx.lineWidth = 2;
        ctx.strokeRect(slot.x, slot.y, slot.width, slot.height);
        
        // Draw multiplier text
        ctx.fillStyle = '#fff';
        ctx.font = 'bold 16px Arial';
        ctx.textAlign = 'center';
        ctx.fillText(`${slot.multiplier}x`, slot.x + slot.width / 2, slot.y + 35);
    });
    
    // Draw all balls
    balls.forEach(ball => {
        if (!ball.landed) {
            ctx.beginPath();
            ctx.arc(ball.x, ball.y, BALL_RADIUS, 0, Math.PI * 2);
            ctx.fillStyle = '#fff';
            ctx.fill();
            ctx.strokeStyle = '#d4af37';
            ctx.lineWidth = 2;
            ctx.stroke();
        }
    });
}

// Drop ball - NOW ALLOWS MULTIPLE DROPS!
function dropBall() {
    // Limit maximum simultaneous balls
    if (balls.filter(b => !b.landed).length >= MAX_BALLS) {
        showMessage('⏳ Too many balls! Wait for some to land.', '#e67e22');
        return;
    }
    
    const balance = getBalance();
    if (balance < betAmount) {
        showMessage('❌ Insufficient balance!', '#e74c3c');
        return;
    }
    
    deductBalance(betAmount);
    
    // Create new ball at top center
    const newBall = {
        id: Date.now() + Math.random(), // Unique ID
        x: canvas.width / 2 + (Math.random() - 0.5) * 20,
        y: 30,
        vx: (Math.random() - 0.5) * 2,
        vy: 0,
        betAmount: betAmount,
        landed: false,
        landTime: null
    };
    
    balls.push(newBall);
    showMessage(`Ball ${balls.length} dropping...`, '#3498db');
}

// Continuous animation loop
function startAnimation() {
    function animate() {
        updateBalls();
        drawBoard();
        animationFrameId = requestAnimationFrame(animate);
    }
    animate();
}

// Update all balls
function updateBalls() {
    balls.forEach((ball, index) => {
        if (ball.landed) {
            // Remove ball after display time
            if (ball.landTime && Date.now() - ball.landTime > 2000) {
                balls.splice(index, 1);
            }
            return;
        }
        
        // Apply gravity
        ball.vy += GRAVITY;
        
        // Update position
        ball.x += ball.vx;
        ball.y += ball.vy;
        
        // Check collision with pegs
        pegs.forEach(peg => {
            const dx = ball.x - peg.x;
            const dy = ball.y - peg.y;
            const distance = Math.sqrt(dx * dx + dy * dy);
            
            if (distance < BALL_RADIUS + peg.radius) {
                // Collision detected
                const angle = Math.atan2(dy, dx);
                const targetX = peg.x + Math.cos(angle) * (BALL_RADIUS + peg.radius);
                const targetY = peg.y + Math.sin(angle) * (BALL_RADIUS + peg.radius);
                
                // Move ball to edge of peg
                ball.x = targetX;
                ball.y = targetY;
                
                // Bounce
                const vMag = Math.sqrt(ball.vx * ball.vx + ball.vy * ball.vy);
                ball.vx = Math.cos(angle) * vMag * BOUNCE;
                ball.vy = Math.sin(angle) * vMag * BOUNCE;
                
                // Add random horizontal velocity
                ball.vx += (Math.random() - 0.5) * 3;
            }
        });
        
        // Check walls
        if (ball.x - BALL_RADIUS < 0) {
            ball.x = BALL_RADIUS;
            ball.vx *= -BOUNCE;
        }
        if (ball.x + BALL_RADIUS > canvas.width) {
            ball.x = canvas.width - BALL_RADIUS;
            ball.vx *= -BOUNCE;
        }
        
        // Check if ball reached bottom
        if (ball.y + BALL_RADIUS >= slots[0].y) {
            landBall(ball);
        }
    });
}

// Land ball in slot
function landBall(ball) {
    // Find which slot the ball landed in
    let slotIndex = Math.floor(ball.x / (canvas.width / slots.length));
    slotIndex = Math.max(0, Math.min(slots.length - 1, slotIndex));
    
    const slot = slots[slotIndex];
    const multiplier = slot.multiplier;
    const winAmount = Math.floor(ball.betAmount * multiplier);
    
    // Position ball in center of slot
    ball.x = slot.x + slot.width / 2;
    ball.y = slot.y + slot.height / 2;
    ball.vx = 0;
    ball.vy = 0;
    ball.landed = true;
    ball.landTime = Date.now();
    
    // Show result
    if (multiplier >= 2) {
        showMessage(`🎉 ${multiplier}x Multiplier! You won ${winAmount} coins!`, '#2ecc71');
        addBalance(winAmount);
        addTransaction('Plinko', ball.betAmount, winAmount - ball.betAmount);
    } else if (multiplier === 1) {
        showMessage(`🤝 ${multiplier}x - Break even! ${winAmount} coins returned.`, '#f39c12');
        addBalance(winAmount);
        addTransaction('Plinko', ball.betAmount, 0);
    } else {
        showMessage(`😞 ${multiplier}x - You won ${winAmount} coins.`, '#e67e22');
        addBalance(winAmount);
        addTransaction('Plinko', ball.betAmount, winAmount - ball.betAmount);
    }
}

// Show message
function showMessage(text, color) {
    const messageDiv = document.getElementById('game-message');
    messageDiv.textContent = text;
    messageDiv.style.color = color;
}
