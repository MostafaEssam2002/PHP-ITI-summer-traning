# Day 6 - JavaScript Tasks
## ITI PHP Summer Internship

This repository contains JavaScript exercises completed on Day 6 of the ITI PHP Summer Internship program. Each script demonstrates different JavaScript concepts and programming techniques.

## 📁 Project Structure

```
├── index.html          # Main HTML file to run the scripts
├── script 1.js         # Random name selector
├── script 2.js         # Mathematical calculations
├── script 3.js         # Array manipulation - second lowest/greatest
├── script 4.js         # String manipulation - capitalize words
├── script 5.js         # Object traversal with recursion
├── script 6.js         # Library book management
└── README.md           # This file
```

## 🚀 How to Run

1. Open `index.html` in your web browser
2. Uncomment the desired script in the HTML file by removing `<!-- -->` around the script tag
3. Refresh the page to see the output
4. Only run one script at a time for clear output

**Example:**
```html
<script src="script 1.js"></script>
<!-- <script src="script 2.js"></script> -->
<!-- <script src="script 3.js"></script> -->
```

## 📋 Task Descriptions

### Script 1: Random Name Selector
- **File:** `script 1.js`
- **Purpose:** Selects 2 random names from an array
- **Concepts:** Array manipulation, random sorting, array slicing
- **Output:** Two randomly selected names from the predefined list

### Script 2: Mathematical Calculations
- **File:** `script 2.js`
- **Purpose:** Performs various mathematical operations
- **Features:**
  - Circle area calculation using user input
  - Square root calculation
  - Cosine value calculation (with degree to radian conversion)
- **Concepts:** `Math` object, user input with `prompt()`, mathematical formulas
- **Interactive:** Yes - requires user input

### Script 3: Second Lowest and Greatest Finder
- **File:** `script 3.js`
- **Purpose:** Finds the second lowest and second greatest numbers in an array
- **Features:**
  - Removes duplicates using `Set`
  - Handles edge cases (insufficient unique numbers)
  - Returns both values in an array
- **Concepts:** Array sorting, Set for uniqueness, array destructuring
- **Input:** `[1, 2, 3, 4, 5, 1, 5]`
- **Output:** `[2, 4]` (second lowest, second greatest)

### Script 4: Word Capitalizer
- **File:** `script 4.js`
- **Purpose:** Capitalizes the first letter of each word in a string
- **Method:** 
  - Split string into words
  - Capitalize first letter of each word
  - Join words back together
- **Concepts:** String methods (`split`, `charAt`, `toUpperCase`, `slice`, `join`), array mapping
- **Input:** `"the quick brown fox"`
- **Output:** `"The Quick Brown Fox"`

### Script 5: Object Deep Traversal
- **File:** `script 5.js`
- **Purpose:** Recursively traverses a nested object and prints all key-value pairs
- **Features:**
  - Handles nested objects of any depth
  - Creates dot notation for nested keys (e.g., `grades.math: 90`)
  - Uses recursion for deep traversal
- **Concepts:** Object iteration, recursion, conditional logic, template literals
- **Data Structure:** Student object with personal info, grades, and contact details

### Script 6: Library Book Manager
- **File:** `script 6.js`
- **Purpose:** Displays book titles from a library object
- **Features:**
  - Organized data structure for books
  - Function-based approach for reusability
  - Clean HTML output formatting
- **Concepts:** Object structure, array iteration with `forEach`, function parameters
- **Data:** Contains 4 classic books with title, author, and publication year

## 🎯 Learning Objectives

This day's tasks covered:

- **Array Manipulation:** Sorting, filtering, and transforming arrays
- **Mathematical Operations:** Using the Math object for calculations
- **String Processing:** Text manipulation and formatting
- **Object Handling:** Creating, traversing, and displaying object data
- **Recursion:** Implementing recursive functions for nested data structures
- **User Interaction:** Getting input from users via prompts
- **Function Design:** Writing reusable and modular functions
- **HTML Integration:** Displaying JavaScript output in web pages

## 💡 Key JavaScript Concepts Demonstrated

### ES6+ Features Used:
- Spread operator (`...`) for array copying
- Arrow functions for concise syntax
- Template literals for string formatting
- Destructuring for clean variable assignment

### Core JavaScript Methods:
- `Math.PI`, `Math.pow()`, `Math.sqrt()`, `Math.cos()`
- `Array.forEach()`, `Array.map()`, `Array.sort()`, `Array.slice()`
- `String.split()`, `String.charAt()`, `String.toUpperCase()`, `String.slice()`, `String.join()`
- `Set()` for removing duplicates
- `Object.keys()` and `for...in` loops for object iteration

### Programming Patterns:
- Functional programming approach
- Recursive algorithms
- Error handling for edge cases
- Modular code organization

