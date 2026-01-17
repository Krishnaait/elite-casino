<?php
$pageTitle = 'Contact Us';
require_once __DIR__ . '/../includes/header.php';

$success = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name'] ?? '');
    $email = htmlspecialchars($_POST['email'] ?? '');
    $subject = htmlspecialchars($_POST['subject'] ?? '');
    $message = htmlspecialchars($_POST['message'] ?? '');
    
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        $error = 'Please fill in all fields';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Please enter a valid email address';
    } else {
        // In a real application, you would save this to a database or send an email
        // For this demo, we'll just show a success message
        $success = 'Thank you for contacting us! We will get back to you soon.';
        
        // Clear form
        $name = $email = $subject = $message = '';
    }
}
?>

<div class="container">
    <h1 class="section-title">📧 Contact Us</h1>
    
    <div style="max-width: 800px; margin: 0 auto;">
        <div style="text-align: center; margin-bottom: 3rem;">
            <p style="font-size: 1.1rem; color: #ccc;">
                Have questions, feedback, or need support? We're here to help!
            </p>
        </div>
        
        <div class="form-container" style="max-width: 600px;">
            <?php if ($error): ?>
                <div class="alert alert-danger"><?php echo $error; ?></div>
            <?php endif; ?>
            
            <?php if ($success): ?>
                <div class="alert alert-success"><?php echo $success; ?></div>
            <?php endif; ?>
            
            <form method="POST" action="">
                <div class="form-group">
                    <label for="name">Your Name *</label>
                    <input type="text" id="name" name="name" value="<?php echo $name ?? ''; ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="email">Your Email *</label>
                    <input type="email" id="email" name="email" value="<?php echo $email ?? ''; ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="subject">Subject *</label>
                    <input type="text" id="subject" name="subject" value="<?php echo $subject ?? ''; ?>" required>
                </div>
                
                <div class="form-group">
                    <label for="message">Message *</label>
                    <textarea id="message" name="message" rows="6" required><?php echo $message ?? ''; ?></textarea>
                </div>
                
                <button type="submit" class="btn btn-primary" style="width: 100%;">Send Message</button>
            </form>
        </div>
        
        <div style="margin-top: 4rem; background: var(--bg-card); padding: 2rem; border-radius: 15px; border: 1px solid var(--primary);">
            <h2 style="color: var(--primary); text-align: center; margin-bottom: 2rem;">📍 Other Ways to Reach Us</h2>
            
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 2rem;">
                <div style="text-align: center;">
                    <div style="font-size: 3rem; margin-bottom: 1rem;">💬</div>
                    <h3 style="color: var(--primary); margin-bottom: 0.5rem;">General Inquiries</h3>
                    <p style="color: #ccc;">For general questions about Elite Casino and our games</p>
                </div>
                
                <div style="text-align: center;">
                    <div style="font-size: 3rem; margin-bottom: 1rem;">🛠️</div>
                    <h3 style="color: var(--primary); margin-bottom: 0.5rem;">Technical Support</h3>
                    <p style="color: #ccc;">Having technical issues? Let us know and we'll help you out</p>
                </div>
                
                <div style="text-align: center;">
                    <div style="font-size: 3rem; margin-bottom: 1rem;">💡</div>
                    <h3 style="color: var(--primary); margin-bottom: 0.5rem;">Feedback & Suggestions</h3>
                    <p style="color: #ccc;">We love hearing your ideas for improving Elite Casino</p>
                </div>
            </div>
        </div>
        
        <div style="margin-top: 3rem; background: linear-gradient(135deg, var(--accent), var(--secondary-light)); padding: 2rem; border-radius: 15px; border: 2px solid var(--primary);">
            <h3 style="color: var(--primary); text-align: center; margin-bottom: 1rem;">❓ Frequently Asked Questions</h3>
            
            <div style="color: #ccc; line-height: 1.8;">
                <details style="margin-bottom: 1rem; padding: 1rem; background: var(--bg-card); border-radius: 8px; cursor: pointer;">
                    <summary style="font-weight: bold; color: var(--primary);">Is Elite Casino really free?</summary>
                    <p style="margin-top: 1rem;">Yes! Elite Casino is 100% free to play. There are no deposits, purchases, or hidden costs. You start with 10,000 virtual coins for free.</p>
                </details>
                
                <details style="margin-bottom: 1rem; padding: 1rem; background: var(--bg-card); border-radius: 8px; cursor: pointer;">
                    <summary style="font-weight: bold; color: var(--primary);">Do I need to create an account?</summary>
                    <p style="margin-top: 1rem;">No registration required! Your progress is automatically saved in your browser using localStorage technology.</p>
                </details>
                
                <details style="margin-bottom: 1rem; padding: 1rem; background: var(--bg-card); border-radius: 8px; cursor: pointer;">
                    <summary style="font-weight: bold; color: var(--primary);">Can I win real money?</summary>
                    <p style="margin-top: 1rem;">No. Elite Casino is a social casino for entertainment purposes only. All coins are virtual and have no real-world value. No real money gambling is involved.</p>
                </details>
                
                <details style="margin-bottom: 1rem; padding: 1rem; background: var(--bg-card); border-radius: 8px; cursor: pointer;">
                    <summary style="font-weight: bold; color: var(--primary);">Is my data safe?</summary>
                    <p style="margin-top: 1rem;">Yes! We don't collect any personal information. Your game progress is stored locally in your browser and never leaves your device.</p>
                </details>
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
