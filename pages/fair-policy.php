<?php
$pageTitle = 'Fair Play Policy';
require_once __DIR__ . '/../includes/header.php';
?>

<div style="background: linear-gradient(rgba(10, 25, 47, 0.92), rgba(10, 25, 47, 0.92)), url('/images/casino-hero.jpg') center/cover fixed; min-height: 100vh; padding: 2rem 0;">
<div class="container">
    <h1 class="section-title">⚖️ Fair Play Policy</h1>
    
    <div style="max-width: 900px; margin: 0 auto;">
        <div style="background: var(--bg-card); padding: 3rem; border-radius: 15px; border: 2px solid var(--primary); margin-bottom: 3rem;">
            <h2 style="color: var(--primary); margin-bottom: 1.5rem;">Our Commitment to Fairness</h2>
            <p style="color: #ccc; line-height: 1.8; margin-bottom: 1.5rem;">
                At Elite Casino, we are committed to providing a fair, transparent, and enjoyable gaming experience for all players. 
                Our Fair Play Policy outlines the principles and mechanisms we use to ensure that every game is conducted with integrity 
                and that all players have an equal opportunity to win.
            </p>
            <p style="color: var(--primary); line-height: 1.8; font-weight: bold; margin-bottom: 1.5rem;">
                ✅ All games use certified Random Number Generation (RNG) algorithms
            </p>
            <p style="color: var(--primary); line-height: 1.8; font-weight: bold;">
                ✅ No manipulation, no rigging, no unfair advantages
            </p>
        </div>

        <!-- Random Number Generation -->
        <div style="background: var(--bg-card); padding: 3rem; border-radius: 15px; border: 1px solid var(--primary); margin-bottom: 3rem;">
            <h2 style="color: var(--primary); margin-bottom: 1.5rem;">🎲 Random Number Generation (RNG)</h2>
            <p style="color: #ccc; line-height: 1.8; margin-bottom: 1.5rem;">
                All our games use industry-standard Random Number Generation (RNG) technology to ensure completely random and unpredictable outcomes:
            </p>
            <ul style="color: #ccc; line-height: 2; margin-left: 2rem; margin-bottom: 1.5rem;">
                <li><strong style="color: var(--primary);">Cryptographically Secure:</strong> We use JavaScript's crypto.getRandomValues() for generating truly random numbers</li>
                <li><strong style="color: var(--primary);">Unpredictable Results:</strong> Each game outcome is independent and cannot be predicted or manipulated</li>
                <li><strong style="color: var(--primary);">Equal Probability:</strong> All possible outcomes have mathematically equal chances of occurring</li>
                <li><strong style="color: var(--primary);">No Pattern Detection:</strong> Results are completely random with no repeating patterns</li>
            </ul>
        </div>

        <!-- Game Integrity -->
        <div style="background: var(--bg-card); padding: 3rem; border-radius: 15px; border: 1px solid var(--primary); margin-bottom: 3rem;">
            <h2 style="color: var(--primary); margin-bottom: 1.5rem;">🛡️ Game Integrity</h2>
            <p style="color: #ccc; line-height: 1.8; margin-bottom: 1.5rem;">
                We maintain the highest standards of game integrity across all our casino games:
            </p>
            
            <h3 style="color: var(--primary); font-size: 1.2rem; margin-top: 2rem; margin-bottom: 1rem;">Slots Game</h3>
            <ul style="color: #ccc; line-height: 2; margin-left: 2rem; margin-bottom: 1.5rem;">
                <li>Each reel spins independently with equal probability for all symbols</li>
                <li>Payout multipliers are fixed and clearly displayed in the paytable</li>
                <li>No hidden mechanics or weighted symbols</li>
            </ul>

            <h3 style="color: var(--primary); font-size: 1.2rem; margin-top: 2rem; margin-bottom: 1rem;">Mines Game</h3>
            <ul style="color: #ccc; line-height: 2; margin-left: 2rem; margin-bottom: 1.5rem;">
                <li>Mine positions are randomly generated at the start of each game</li>
                <li>Multipliers increase fairly based on revealed tiles</li>
                <li>No predetermined win/loss patterns</li>
            </ul>

            <h3 style="color: var(--primary); font-size: 1.2rem; margin-top: 2rem; margin-bottom: 1rem;">Lucky Spin</h3>
            <ul style="color: #ccc; line-height: 2; margin-left: 2rem; margin-bottom: 1.5rem;">
                <li>Wheel segments have equal probability based on their size</li>
                <li>Spin outcome is determined by RNG, not animation</li>
                <li>All multipliers are clearly visible before spinning</li>
            </ul>

            <h3 style="color: var(--primary); font-size: 1.2rem; margin-top: 2rem; margin-bottom: 1rem;">Blackjack</h3>
            <ul style="color: #ccc; line-height: 2; margin-left: 2rem; margin-bottom: 1.5rem;">
                <li>Cards are dealt from a properly shuffled virtual deck</li>
                <li>Dealer follows standard casino rules (stands on 17)</li>
                <li>No card counting prevention or deck manipulation</li>
            </ul>

            <h3 style="color: var(--primary); font-size: 1.2rem; margin-top: 2rem; margin-bottom: 1rem;">Plinko</h3>
            <ul style="color: #ccc; line-height: 2; margin-left: 2rem; margin-bottom: 1.5rem;">
                <li>Ball path is determined by physics simulation and RNG</li>
                <li>Each peg bounce has a 50/50 chance of going left or right</li>
                <li>Multiplier slots are clearly marked and fair</li>
            </ul>

            <h3 style="color: var(--primary); font-size: 1.2rem; margin-top: 2rem; margin-bottom: 1rem;">Dice</h3>
            <ul style="color: #ccc; line-height: 2; margin-left: 2rem; margin-bottom: 1.5rem;">
                <li>Dice roll results are purely random (0-100)</li>
                <li>Over/Under outcomes are determined fairly</li>
                <li>Multipliers are calculated based on mathematical probability</li>
            </ul>
        </div>

        <!-- Transparency -->
        <div style="background: var(--bg-card); padding: 3rem; border-radius: 15px; border: 1px solid var(--primary); margin-bottom: 3rem;">
            <h2 style="color: var(--primary); margin-bottom: 1.5rem;">🔍 Transparency</h2>
            <p style="color: #ccc; line-height: 1.8; margin-bottom: 1.5rem;">
                We believe in complete transparency regarding how our games work:
            </p>
            <ul style="color: #ccc; line-height: 2; margin-left: 2rem; margin-bottom: 1.5rem;">
                <li><strong style="color: var(--primary);">Clear Paytables:</strong> All payout multipliers and winning conditions are clearly displayed</li>
                <li><strong style="color: var(--primary);">Game Rules:</strong> Comprehensive rules are provided for each game</li>
                <li><strong style="color: var(--primary);">Win Probabilities:</strong> Statistical probabilities are based on fair mathematical models</li>
                <li><strong style="color: var(--primary);">No Hidden Fees:</strong> Completely free to play with no hidden costs or purchases</li>
            </ul>
        </div>

        <!-- Player Protection -->
        <div style="background: var(--bg-card); padding: 3rem; border-radius: 15px; border: 1px solid var(--primary); margin-bottom: 3rem;">
            <h2 style="color: var(--primary); margin-bottom: 1.5rem;">🛡️ Player Protection</h2>
            <p style="color: #ccc; line-height: 1.8; margin-bottom: 1.5rem;">
                We are committed to protecting all players and ensuring a fair gaming environment:
            </p>
            <ul style="color: #ccc; line-height: 2; margin-left: 2rem; margin-bottom: 1.5rem;">
                <li><strong style="color: var(--primary);">No Real Money:</strong> All games use virtual coins with no real-world value</li>
                <li><strong style="color: var(--primary);">Equal Treatment:</strong> All players are treated equally with no special advantages</li>
                <li><strong style="color: var(--primary);">Data Privacy:</strong> Your game data is stored locally and never shared</li>
                <li><strong style="color: var(--primary);">Responsible Gaming:</strong> We promote healthy gaming habits and entertainment-only play</li>
            </ul>
        </div>

        <!-- House Edge -->
        <div style="background: var(--bg-card); padding: 3rem; border-radius: 15px; border: 1px solid var(--primary); margin-bottom: 3rem;">
            <h2 style="color: var(--primary); margin-bottom: 1.5rem;">📊 House Edge & RTP</h2>
            <p style="color: #ccc; line-height: 1.8; margin-bottom: 1.5rem;">
                Our games are designed with fair house edges similar to real casinos:
            </p>
            <table style="width: 100%; border-collapse: collapse; margin-bottom: 1.5rem;">
                <thead>
                    <tr style="background: var(--secondary); border-bottom: 2px solid var(--primary);">
                        <th style="padding: 1rem; text-align: left; color: var(--primary);">Game</th>
                        <th style="padding: 1rem; text-align: center; color: var(--primary);">House Edge</th>
                        <th style="padding: 1rem; text-align: center; color: var(--primary);">RTP (Return to Player)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="border-bottom: 1px solid rgba(212, 175, 55, 0.2);">
                        <td style="padding: 1rem; color: #ccc;">Slots</td>
                        <td style="padding: 1rem; text-align: center; color: #ccc;">~5%</td>
                        <td style="padding: 1rem; text-align: center; color: var(--success);">~95%</td>
                    </tr>
                    <tr style="border-bottom: 1px solid rgba(212, 175, 55, 0.2);">
                        <td style="padding: 1rem; color: #ccc;">Mines</td>
                        <td style="padding: 1rem; text-align: center; color: #ccc;">~3%</td>
                        <td style="padding: 1rem; text-align: center; color: var(--success);">~97%</td>
                    </tr>
                    <tr style="border-bottom: 1px solid rgba(212, 175, 55, 0.2);">
                        <td style="padding: 1rem; color: #ccc;">Lucky Spin</td>
                        <td style="padding: 1rem; text-align: center; color: #ccc;">~8%</td>
                        <td style="padding: 1rem; text-align: center; color: var(--success);">~92%</td>
                    </tr>
                    <tr style="border-bottom: 1px solid rgba(212, 175, 55, 0.2);">
                        <td style="padding: 1rem; color: #ccc;">Blackjack</td>
                        <td style="padding: 1rem; text-align: center; color: #ccc;">~2%</td>
                        <td style="padding: 1rem; text-align: center; color: var(--success);">~98%</td>
                    </tr>
                    <tr style="border-bottom: 1px solid rgba(212, 175, 55, 0.2);">
                        <td style="padding: 1rem; color: #ccc;">Plinko</td>
                        <td style="padding: 1rem; text-align: center; color: #ccc;">~5%</td>
                        <td style="padding: 1rem; text-align: center; color: var(--success);">~95%</td>
                    </tr>
                    <tr>
                        <td style="padding: 1rem; color: #ccc;">Dice</td>
                        <td style="padding: 1rem; text-align: center; color: #ccc;">~1%</td>
                        <td style="padding: 1rem; text-align: center; color: var(--success);">~99%</td>
                    </tr>
                </tbody>
            </table>
            <p style="color: #888; font-size: 0.9rem; font-style: italic;">
                *RTP (Return to Player) represents the theoretical percentage of wagered coins that will be returned to players over time. 
                These are statistical averages calculated over millions of plays.
            </p>
        </div>

        <!-- No Manipulation -->
        <div style="background: var(--bg-card); padding: 3rem; border-radius: 15px; border: 1px solid var(--primary); margin-bottom: 3rem;">
            <h2 style="color: var(--primary); margin-bottom: 1.5rem;">🚫 Zero Tolerance for Manipulation</h2>
            <p style="color: #ccc; line-height: 1.8; margin-bottom: 1.5rem;">
                Elite Casino has a zero-tolerance policy for any form of game manipulation:
            </p>
            <ul style="color: #ccc; line-height: 2; margin-left: 2rem; margin-bottom: 1.5rem;">
                <li>We do not alter game outcomes based on player behavior</li>
                <li>We do not use "near-miss" programming to create false hope</li>
                <li>We do not adjust odds based on winning or losing streaks</li>
                <li>We do not track or target individual players</li>
                <li>We do not use any deceptive practices</li>
            </ul>
        </div>

        <!-- Verification -->
        <div style="background: var(--bg-card); padding: 3rem; border-radius: 15px; border: 1px solid var(--primary); margin-bottom: 3rem;">
            <h2 style="color: var(--primary); margin-bottom: 1.5rem;">✅ Verification & Testing</h2>
            <p style="color: #ccc; line-height: 1.8; margin-bottom: 1.5rem;">
                Our games undergo rigorous testing to ensure fairness:
            </p>
            <ul style="color: #ccc; line-height: 2; margin-left: 2rem; margin-bottom: 1.5rem;">
                <li><strong style="color: var(--primary);">Statistical Testing:</strong> Games are tested over millions of simulated plays</li>
                <li><strong style="color: var(--primary);">RNG Verification:</strong> Random number generation is verified for true randomness</li>
                <li><strong style="color: var(--primary);">Payout Verification:</strong> All payout calculations are mathematically verified</li>
                <li><strong style="color: var(--primary);">Regular Audits:</strong> Game code is regularly reviewed for fairness</li>
            </ul>
        </div>

        <!-- Contact -->
        <div style="background: linear-gradient(135deg, rgba(212, 175, 55, 0.1), rgba(184, 134, 11, 0.1)); padding: 3rem; border-radius: 15px; border: 2px solid var(--primary); text-align: center;">
            <h2 style="color: var(--primary); margin-bottom: 1.5rem;">📧 Questions About Fair Play?</h2>
            <p style="color: #ccc; line-height: 1.8; margin-bottom: 2rem;">
                If you have any questions or concerns about our Fair Play Policy or game fairness, 
                please don't hesitate to contact us. We're committed to transparency and will gladly 
                address any inquiries.
            </p>
            <a href="/pages/contact.php" class="btn btn-primary">Contact Us</a>
        </div>
    </div>
</div>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
