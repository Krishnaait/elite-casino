# 🎰 Elite Casino - Free-to-Play Social Casino Platform

![Elite Casino](https://img.shields.io/badge/Status-Live-success)
![PHP](https://img.shields.io/badge/PHP-8.1-blue)
![License](https://img.shields.io/badge/License-MIT-green)
![Age](https://img.shields.io/badge/Age-18%2B-red)

**Elite Casino** is a premium free-to-play social casino platform featuring multiple casino games with elegant design and smooth gameplay. Built with PHP, HTML, CSS, and JavaScript, it provides an authentic casino experience without any real money gambling.

## ✨ Features

### 🎮 Four Exciting Games

1. **🎰 Slots** - Classic 3-reel slot machine
   - 6 unique symbols with different payouts
   - Multiple bet amounts (10 to 500 coins)
   - Up to 50x multiplier on jackpots
   - Smooth spinning animations

2. **💣 Mines** - Strategic grid-based game
   - 5x5 grid with hidden mines
   - Progressive multiplier system
   - Multiple difficulty levels (3-10 mines)
   - Cash out anytime feature

3. **🎡 Lucky Spin** - Wheel of fortune
   - Beautiful animated spinning wheel
   - 8 prize segments
   - Up to 10x multiplier
   - Visual prize indicators

4. **🎲 Roulette** - Classic casino roulette
   - Red, black, and green betting options
   - Realistic wheel animation
   - Up to 14x payout
   - Multiple bet amounts

### 💰 Virtual Currency System

- **10,000 starting coins** for all new players
- **Daily bonus** of 1,000 coins (claim once per day)
- **localStorage-based** - no server storage, complete privacy
- **Transaction history** - track all your bets and wins
- **Achievement system** - unlock achievements as you play

### 📊 Player Statistics

- Total games played
- Total coins won/lost
- Biggest win tracking
- Win/loss ratio
- Achievement progress

### 📱 Responsive Design

- Works seamlessly on desktop, tablet, and mobile
- Elegant dark theme with gold accents
- Smooth animations and transitions
- Professional casino aesthetic

## 🚀 Quick Start

### Prerequisites

- PHP 8.1 or higher
- Web server (Apache, Nginx, or PHP built-in server)
- Modern web browser with JavaScript enabled

### Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/Krishnaait/elite-casino.git
   cd elite-casino
   ```

2. **Start PHP development server**
   ```bash
   php -S localhost:8080
   ```

3. **Open in browser**
   ```
   http://localhost:8080
   ```

That's it! No database setup, no configuration files, no dependencies to install.

## 📁 Project Structure

```
elite-casino/
├── index.php                 # Landing page
├── css/
│   └── style.css            # Global styling
├── js/                       # JavaScript for games only
│   ├── wallet.js            # localStorage coin management
│   ├── slots.js             # Slots game engine
│   ├── mines.js             # Mines game engine
│   ├── lucky-spin.js        # Lucky Spin game engine
│   └── roulette.js          # Roulette game engine
├── games/
│   ├── slots.php
│   ├── mines.php
│   ├── lucky-spin.php
│   └── roulette.php
├── pages/
│   ├── play-now.php
│   ├── about.php
│   ├── contact.php
│   ├── leaderboard.php
│   ├── terms.php
│   ├── privacy.php
│   ├── disclaimer.php
│   ├── responsible-gaming.php
│   └── community-rules.php
└── includes/
    ├── header.php
    └── footer.php
```

## 🎯 How It Works

### No Registration Required

Elite Casino doesn't require user accounts or personal information. Players can start playing immediately without any sign-up process.

### localStorage-Based Wallet

All player data (coins, transaction history, achievements) is stored in the browser's localStorage. This means:

- ✅ Complete privacy - no data sent to servers
- ✅ Instant gameplay - no loading from databases
- ✅ Works offline - once loaded, games work without internet
- ⚠️ Data is device-specific - clearing browser data resets progress

### Game Mechanics

All games use JavaScript for:
- Random number generation
- Game logic and rules
- Animations and visual effects
- Wallet updates

PHP is used only for serving HTML pages - no server-side game logic.

## ⚠️ Important Disclaimers

### Age Restriction

**You must be 18 years or older to use this platform.**

Elite Casino is intended for adult audiences only. While it doesn't involve real money, it simulates casino gaming and is designed for adults.

### No Real Money Gambling

**This platform does NOT offer real money gambling.**

- All coins are virtual and have no real-world value
- No purchases are required or accepted
- No withdrawals or redemptions available
- For entertainment purposes only

### Responsible Gaming

Practice or success at social casino gaming does not imply future success at real money gambling. If you or someone you know has a gambling problem, help is available:

- **National Council on Problem Gambling**: 1-800-522-4700
- **Gamblers Anonymous**: www.gamblersanonymous.org
- **SAMHSA National Helpline**: 1-800-662-4357

## 🛠️ Technology Stack

- **Backend**: PHP 8.1
- **Frontend**: HTML5, CSS3, JavaScript (ES6)
- **Storage**: Browser localStorage
- **No Database**: All data stored client-side
- **No Dependencies**: Pure vanilla JavaScript

## 📄 Legal Pages

The platform includes comprehensive legal documentation:

- **Terms of Service** - Usage terms and conditions
- **Privacy Policy** - Data handling and privacy practices
- **Disclaimer** - Age restrictions and gambling disclaimers
- **Responsible Gaming** - Resources and support information
- **Community Rules** - User conduct guidelines

## 🤝 Contributing

Contributions are welcome! Please feel free to submit a Pull Request. For major changes, please open an issue first to discuss what you would like to change.

### Development Guidelines

1. Keep JavaScript only for game mechanics
2. Maintain the elegant casino theme
3. Ensure all games work without server-side logic
4. Test on multiple browsers and devices
5. Update documentation for new features

## 📝 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 🙏 Acknowledgments

- Emoji icons from Unicode Standard
- CSS animations inspired by modern casino designs
- Game mechanics based on traditional casino games

## 📞 Contact

For questions, suggestions, or support, please use the contact form on the website or open an issue on GitHub.

---

**Remember**: Elite Casino is for entertainment purposes only. No real money gambling. Play responsibly! 🎰✨

**Made with ❤️ by the Elite Casino Team**
