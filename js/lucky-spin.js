/**
 * Elite Casino - Lucky Spin Game Engine
 * Wheel of fortune with canvas-based animation
 */

const prizes = [
    { label: '💎', multiplier: 10, color: '#9b59b6' },
    { label: '💰', multiplier: 1, color: '#3498db' },
    { label: '⭐', multiplier: 5, color: '#e74c3c' },
    { label: '🎁', multiplier: 2, color: '#2ecc71' },
    { label: '🍀', multiplier: 3, color: '#f39c12' },
    { label: '💰', multiplier: 1, color: '#1abc9c' },
    { label: '🎯', multiplier: 1.5, color: '#e67e22' },
    { label: '💰', multiplier: 1, color: '#34495e' }
];

let isSpinning = false;
let currentRotation = 0;
const canvas = document.getElementById('wheel-canvas');
const ctx = canvas.getContext('2d');

function drawWheel() {
    const centerX = canvas.width / 2;
    const centerY = canvas.height / 2;
    const radius = 180;
    const sliceAngle = (2 * Math.PI) / prizes.length;
    
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    ctx.save();
    ctx.translate(centerX, centerY);
    ctx.rotate(currentRotation);
    
    prizes.forEach((prize, index) => {
        const startAngle = index * sliceAngle;
        const endAngle = startAngle + sliceAngle;
        
        // Draw slice
        ctx.beginPath();
        ctx.arc(0, 0, radius, startAngle, endAngle);
        ctx.lineTo(0, 0);
        ctx.fillStyle = prize.color;
        ctx.fill();
        ctx.strokeStyle = '#D4AF37';
        ctx.lineWidth = 2;
        ctx.stroke();
        
        // Draw text
        ctx.save();
        ctx.rotate(startAngle + sliceAngle / 2);
        ctx.textAlign = 'center';
        ctx.fillStyle = '#ffffff';
        ctx.font = 'bold 24px Arial';
        ctx.fillText(prize.label, radius * 0.65, 10);
        ctx.font = 'bold 16px Arial';
        ctx.fillText(prize.multiplier + 'x', radius * 0.65, 30);
        ctx.restore();
    });
    
    // Draw center circle
    ctx.beginPath();
    ctx.arc(0, 0, 30, 0, 2 * Math.PI);
    ctx.fillStyle = '#D4AF37';
    ctx.fill();
    ctx.strokeStyle = '#ffffff';
    ctx.lineWidth = 3;
    ctx.stroke();
    
    ctx.restore();
}

function spinWheel() {
    if (isSpinning) return;
    
    const betAmount = parseInt(document.getElementById('bet-amount').value);
    
    // Check balance
    if (!canAfford(betAmount)) {
        showResult('Insufficient balance! 😢', 'danger');
        return;
    }
    
    // Place bet
    const betResult = placeBet(betAmount);
    if (!betResult.success) {
        showResult(betResult.message, 'danger');
        return;
    }
    
    isSpinning = true;
    document.getElementById('spin-btn').disabled = true;
    showResult('Spinning... 🎡', 'info');
    
    // Random final position - HIGH SPEED CONSISTENT ROTATION
    const spins = 8 + Math.random() * 2; // 8-10 full rotations (HIGH SPEED!)
    const randomSlice = Math.floor(Math.random() * prizes.length);
    const sliceAngle = (2 * Math.PI) / prizes.length;
    const targetRotation = (spins * 2 * Math.PI) + (randomSlice * sliceAngle) + (sliceAngle / 2);
    
    animateSpin(targetRotation, betAmount, randomSlice);
}

function animateSpin(targetRotation, betAmount, winningSlice) {
    const duration = 5000; // 5 seconds for high-speed spin
    const startTime = Date.now();
    const startRotation = currentRotation;
    
    function animate() {
        const elapsed = Date.now() - startTime;
        const progress = Math.min(elapsed / duration, 1);
        
        // Easing function (ease-out)
        const easeOut = 1 - Math.pow(1 - progress, 3);
        currentRotation = startRotation + (targetRotation - startRotation) * easeOut;
        
        drawWheel();
        
        if (progress < 1) {
            requestAnimationFrame(animate);
        } else {
            // Spin complete
            const prize = prizes[winningSlice];
            const winAmount = Math.floor(betAmount * prize.multiplier);
            
            if (prize.multiplier > 1) {
                addWinnings(winAmount, prize.multiplier);
                showResult(`🎉 You won ${formatCoins(winAmount)} coins! (${prize.multiplier}x)`, 'success');
            } else {
                addWinnings(winAmount, prize.multiplier);
                showResult(`You got your bet back! (${prize.multiplier}x)`, 'warning');
            }
            
            isSpinning = false;
            document.getElementById('spin-btn').disabled = false;
        }
    }
    
    animate();
}

function showResult(message, type) {
    const resultDiv = document.getElementById('result-message');
    let color = 'var(--text-light)';
    
    if (type === 'success') color = 'var(--success)';
    else if (type === 'danger') color = 'var(--danger)';
    else if (type === 'warning') color = 'var(--warning)';
    else if (type === 'info') color = 'var(--primary)';
    
    resultDiv.innerHTML = `<span style="color: ${color};">${message}</span>`;
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', function() {
    drawWheel();
});
