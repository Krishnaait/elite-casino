# Stake.com Casino Games Research

## Popular Stake Original Games

Based on research, these are the most popular Stake Original games:

### 1. **Crash** ⭐ Most Popular
- **Concept**: Watch a multiplier increase from 1.00x and cash out before it crashes
- **Mechanics**: 
  * Multiplier starts at 1.00x and increases rapidly
  * Players bet and choose when to cash out
  * If you don't cash out before crash, you lose
  * Crash point is random (could be 1.01x or 100x+)
  * Visual: Rocket or line graph ascending
- **Strategy**: Balance between risk and reward timing

### 2. **Limbo**
- **Concept**: Predict a target multiplier and roll
- **Mechanics**:
  * Set a target multiplier (1.01x to 1,000,000x)
  * Roll the dice
  * If result is >= your target, you win the multiplier
  * Higher targets = lower probability but higher payout
  * Fast-paced, instant results
- **Visual**: Simple number display with animation

### 3. **Wheel**
- **Concept**: Spin a wheel with different risk levels
- **Mechanics**:
  * 15 different game modes (risk levels)
  * Each mode has different segment counts and multipliers
  * Low risk = more segments, lower multipliers
  * High risk = fewer segments, higher multipliers
  * Wheel spins and lands on a multiplier
- **Visual**: Colorful spinning wheel with segments

### 4. **HiLo** (Hi-Lo)
- **Concept**: Predict if next card is higher or lower
- **Mechanics**:
  * Start with a card
  * Guess if next card is higher or lower
  * Correct guess = multiplier increases
  * Can cash out anytime or continue
  * Wrong guess = lose everything
  * Progressive multiplier system
- **Visual**: Playing cards with simple interface

### 5. **Dragon Tower**
- **Concept**: Climb a tower by choosing safe paths
- **Mechanics**:
  * Grid of tiles per level
  * Choose correct tile to advance
  * Each level increases multiplier
  * Wrong tile = game over
  * Cash out anytime
  * Similar to Mines but vertical progression
- **Visual**: Tower with levels and tiles

### 6. **Slide**
- **Concept**: Ball slides down multiplier track
- **Mechanics**:
  * Ball slides through multiplier zones
  * Random path determines final multiplier
  * Max win up to 1,000,000x
  * Physics-based movement
- **Visual**: Sliding track with multipliers

---

## Games to Implement for Elite Casino

### Priority 1: **Crash** (Replace Roulette)
- Most popular Stake game
- Exciting multiplier mechanics
- Real-time tension and strategy
- Visual appeal with ascending graph/rocket

### Priority 2: **Limbo**
- Fast-paced gameplay
- Simple but engaging
- High multiplier potential
- Easy to understand

### Priority 3: **Hi-Lo**
- Card-based game
- Progressive multiplier
- Strategic decision making
- Classic casino feel

### Priority 4: **Wheel** (Enhanced version of Lucky Spin)
- Multiple risk modes
- Colorful and engaging
- Different from our current Lucky Spin
- More variety in gameplay

---

## Implementation Plan

### Remove:
- ❌ Roulette (games/roulette.php, js/roulette.js)

### Add:
- ✅ Crash (Multiplier crash game)
- ✅ Limbo (Target multiplier prediction)
- ✅ Hi-Lo (Card prediction game)
- ✅ Wheel (Multi-mode spinning wheel)

### Keep Existing:
- Slots
- Mines
- Lucky Spin
- Blackjack
- Plinko
- Dice

**Total Games After Update**: 10 games (6 existing + 4 new - 1 removed)
