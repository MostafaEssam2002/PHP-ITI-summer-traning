# Day 7 - JavaScript Tasks
## ITI PHP Summer Internship

This repository contains JavaScript exercises focusing on advanced DOM manipulation, event handling, and interactive web components using pure JavaScript (no external libraries).

## 📁 Project Structure

```
├── index.html          # Main HTML file with script imports
├── task1.js           # Higher-order functions and callbacks
├── task2.js           # Array processing with callbacks
├── task3.js           # Student management system
├── task4.js           # DOM element analyzer
├── task5.js           # Dark/Light theme toggle
├── task6.js           # (Empty file)
├── task7.js           # Interactive image slider
└── README.md          # This file
```

## 🎯 Tasks Overview

### Task 1: Higher-Order Functions (`task1.js`)
**Objective:** Implement and demonstrate higher-order functions with callbacks.

**Features:**
- `applyOperation()` function that accepts two numbers and an operation callback
- Demonstrates usage with addition, multiplication, subtraction, and division
- Uses both named functions and arrow functions as callbacks

**Output:** Mathematical operations results displayed on the page

### Task 2: Array Processing (`task2.js`)
**Objective:** Process arrays using callback functions.

**Features:**
- `processArray()` function that applies a callback to each array element
- `square()` function as a callback example
- Iterates through an array and displays squared values

**Output:** Squared numbers from 1-5 displayed on the page

### Task 3: Student Management System (`task3.js`)
**Objective:** Create a complete CRUD system for student records with validation.

**Features:**
- **Form Inputs:** Name and Age with real-time validation
- **Validation Rules:**
  - Name: Required, must be longer than 3 characters
  - Age: Required, must be greater than 18
- **Dynamic Table:** Displays all students with ID, Name, Age, and Actions
- **CRUD Operations:** Add and delete students
- **Responsive Styling:** Clean, professional appearance with borders and colors

**Validation Messages:**
- Name errors: "Student Name is Required" / "Name Length Must be greater than 3"
- Age errors: "Age is Required" / "Age Must be greater than 18"

### Task 4: DOM Element Analyzer (`task4.js`)
**Objective:** Build a tool to analyze and count DOM elements by various selectors.

**Features:**
- **Input Fields:** Tag name, Class name, ID, and Name attribute
- **Real-time Analysis:** Counts elements matching each selector type
- **Results Display:** Shows counts in a styled output box
- **Dynamic Querying:** Uses `getElementsByTagName()`, `getElementsByClassName()`, `getElementById()`, and `getElementsByName()`

**Output Format:** "Number Of [tag] : [count] Class [class] : [count] Id : [exists] Name : [count]"

### Task 5: Theme Toggle System (`task5.js`)
**Objective:** Implement a complete dark/light mode toggle with persistence.

**Features:**
- **Theme Persistence:** Saves preference to localStorage
- **System Preference Detection:** Automatically detects OS dark mode preference
- **Smooth Transitions:** 0.25s transitions for all color changes
- **Dynamic Theme Application:** Changes background, text, cards, and buttons
- **Arabic Support:** Includes Arabic text for demonstration
- **Real-time Updates:** Responds to system theme changes

**Theme Properties:**
- **Light Mode:** Light backgrounds, dark text, subtle shadows
- **Dark Mode:** Dark backgrounds, light text, enhanced shadows

### Task 7: Interactive Image Slider (`task7.js`)
**Objective:** Create a feature-rich, responsive image slider component.

**Features:**
- **5 Gradient Slides:** Beautiful gradient backgrounds with slide numbers
- **Multiple Navigation Methods:**
  - Previous/Next buttons
  - Clickable indicators
  - Keyboard arrows (← →)
  - Spacebar for play/pause
- **Auto-play Functionality:** 
  - Play/Stop controls
  - 30ms interval between slides
  - Pauses on hover, resumes on mouse leave
- **Visual Feedback:**
  - Slide counter (current/total)
  - Active indicator highlighting
  - Play status indicator
  - Button hover effects
- **Responsive Design:** Adapts to different screen sizes
- **Modern Styling:** Gradient backgrounds, rounded corners, smooth transitions

## 🚀 Getting Started

### Prerequisites
- Modern web browser (Chrome, Firefox, Safari, Edge)
- Basic understanding of HTML/JavaScript

### Installation & Usage

1. **Clone or Download** the project files
2. **Open `index.html`** in your web browser
3. **Uncomment** the desired task script in the HTML file:
   ```html
   <!-- Uncomment the task you want to run -->
   <script src="task1.js"></script>
   <!-- <script src="task2.js"></script> -->
   <!-- <script src="task3.js"></script> -->
   <!-- <script src="task4.js"></script> -->
   <!-- <script src="task5.js"></script> -->
   <!-- <script src="task7.js"></script> -->
   ```
4. **Refresh** the page to see the task in action

### Running Multiple Tasks
- Each task is self-contained and can run independently
- To switch between tasks, comment out the current script and uncomment another
- Task 7 (slider) is currently active by default

## 🛠️ Technical Implementation Details

### DOM Manipulation Techniques Used
- **Dynamic Element Creation:** `createElement()`, `appendChild()`
- **Event Handling:** `onclick`, `addEventListener()`
- **Style Manipulation:** Direct style property modification
- **Form Validation:** Real-time input validation with error displays
- **Local Storage:** Theme preference persistence
- **Responsive Design:** CSS-in-JS with media query equivalents

### JavaScript Concepts Demonstrated
- **Higher-Order Functions:** Functions accepting other functions as parameters
- **Callbacks:** Function references passed and executed
- **Array Methods:** Manual iteration and processing
- **Object-Oriented Programming:** ES6 classes (Task 7)
- **Event-Driven Programming:** User interaction handling
- **State Management:** Application state tracking and updates
- **Module Pattern:** Self-executing anonymous functions (IIFE)

### Browser Compatibility
- **Modern Browsers:** Full support for ES6+ features
- **Fallbacks:** Uses traditional function syntax where needed
- **Progressive Enhancement:** Degrades gracefully on older browsers

## 🎨 Styling Approach

All styling is implemented using **JavaScript-only** (no external CSS files):
- **Consistent Design Language:** Unified color schemes and spacing
- **Responsive Layout:** Flexible sizing and positioning
- **Interactive Feedback:** Hover effects, transitions, and visual states
- **Accessibility:** High contrast ratios and semantic markup
- **Modern Aesthetics:** Gradient backgrounds, rounded corners, shadows

## 🔧 Customization Options

### Task 3 (Student System)
- Modify validation rules in the `addBtn.onclick` function
- Change table styling in the styling section
- Add new fields by creating additional inputs

### Task 5 (Theme Toggle)
- Customize colors in the `light` and `dark` theme objects
- Modify transition duration in the CSS-in-JS
- Add new theme properties for additional elements

### Task 7 (Slider)
- Adjust `autoPlayDelay` for different slide timing
- Modify `slideColors` array for different gradients
- Change `totalSlides` for more or fewer slides

## 🏆 Learning Outcomes

After completing these tasks, you will have gained experience in:
- **Advanced DOM Manipulation:** Creating complex interfaces with vanilla JavaScript
- **Event-Driven Programming:** Handling user interactions and system events
- **State Management:** Tracking and updating application state
- **Form Validation:** Implementing robust client-side validation
- **Component Architecture:** Building reusable, self-contained components
- **Modern JavaScript:** ES6+ features including classes, arrow functions, and modules
- **User Experience Design:** Creating smooth, responsive, and intuitive interfaces
- **Code Organization:** Structuring larger JavaScript applications

## 📚 Additional Resources

- [MDN Web Docs - JavaScript](https://developer.mozilla.org/en-US/docs/Web/JavaScript)
- [MDN Web Docs - DOM Manipulation](https://developer.mozilla.org/en-US/docs/Web/API/Document_Object_Model)
- [JavaScript.info](https://javascript.info/)
- [W3Schools JavaScript Tutorial](https://www.w3schools.com/js/)

## 📝 Notes

- **No External Dependencies:** All functionality implemented with vanilla JavaScript
- **Progressive Enhancement:** Features degrade gracefully if JavaScript is disabled
- **Performance Optimized:** Efficient DOM manipulation and event handling
- **Cross-Browser Compatible:** Works on all modern browsers

---

**Developed during ITI PHP Summer Internship - Day 7**  
*Focus: Advanced JavaScript DOM Manipulation & Interactive Components*
