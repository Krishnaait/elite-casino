<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($pageTitle) ? $pageTitle . ' - ' : ''; ?>RISHIKANT</title>
    <link rel="stylesheet" href="/css/style.css">
    <script src="/js/wallet.js"></script>
</head>
<body>
    <header>
        <nav>
            <a href="/index.php" class="logo">🎰 RISHIKANT</a>
            <ul class="nav-links">
                <li><a href="/index.php">Home</a></li>
                <li><a href="/pages/play-now.php">Play Now</a></li>
                <li><a href="/pages/about.php">About</a></li>
                <li><a href="/pages/contact.php">Contact</a></li>
            </ul>
            <div class="user-info">
                <span class="balance-display" id="balance-display">💰 10,000 Coins</span>
            </div>
        </nav>
    </header>
    
    <script>
        // Update balance display on page load
        document.addEventListener('DOMContentLoaded', function() {
            updateBalanceDisplay();
        });
    </script>
