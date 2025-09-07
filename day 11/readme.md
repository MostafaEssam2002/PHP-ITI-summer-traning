\# PHP Day 11 Task - ITI Summer Internship



\## Overview

This repository contains the solutions for Day 11 PHP exercises from the ITI Summer Internship program. The task covers fundamental PHP concepts including variables, data types, loops, constants, and basic web output formatting.



\## Task Requirements



\### 1. Welcome Message

\- Print "Welcome to php" message



\### 2. Variable Declaration

\- Define three variables with different data types:

&nbsp; - `$x = 5` (integer)

&nbsp; - `$y = 'Welcome'` (string)  

&nbsp; - `$z = True` (boolean)



\### 3. Data Type Display

\- Display the type of each variable using `gettype()` function



\### 4. Loop Implementation

\- Print numbers from 0 to 15 using two different methods:

&nbsp; - Method 1: `for` loop

&nbsp; - Method 2: `while` loop



\### 5. Constants Definition

\- Define constants with value "ITI" using:

&nbsp; - `define()` function

&nbsp; - `const` keyword



\### 6. Variable Type Checking

\- Use `gettype()` to check data types of all variables



\### 7. Variable Existence Check

\- Use `isset()` to verify if variables are set



\### 8. Empty Variable Check

\- Use `empty()` to check if variables are empty



\### 9. Conditional Logic

\- Add two numbers (m=30, n=25)

\- Display "Accepted" if result > 50, otherwise "Not Accepted"



\### 10. HTML Table Generation

\- Create an HTML table displaying salary information for three employees



\### Bonus: Type Conversion Function

\- Custom function to convert numbers to strings using string concatenation



\## Code Structure



```php

<?php

// Welcome message

echo "Welcome to php<br>";



// Variable declarations

$x = 5;

$y = 'Welcome';

$z = True;



// Data type operations

gettype($x), gettype($y), gettype($z)



// Loop implementations

for($i = 0; $i <= 15; $i++) { ... }

while($i <= 15) { ... }



// Constants

define("ORG", "ITI");

const organization = "ITI";



// Variable testing functions

isset(), empty(), gettype()



// Conditional logic

if($result > 50) { ... }



// HTML table generation

echo "<table border='1'>...</table>";



// Custom function

function numberToString($num) { ... }

?>

```



\## Key PHP Concepts Demonstrated



\### Data Types

\- \*\*Integer\*\*: Whole numbers (`$x = 5`)

\- \*\*String\*\*: Text data (`$y = 'Welcome'`)

\- \*\*Boolean\*\*: True/False values (`$z = True`)



\### Built-in Functions

\- `gettype()`: Returns the data type of a variable

\- `isset()`: Checks if a variable is set and not null

\- `empty()`: Checks if a variable is empty

\- `define()`: Creates a constant

\- `echo`: Outputs data to the browser



\### Control Structures

\- \*\*For Loop\*\*: `for($i = 0; $i <= 15; $i++)`

\- \*\*While Loop\*\*: `while($condition)`

\- \*\*If-Else Statement\*\*: Conditional execution



\### Constants

\- `define("NAME", "value")`: Runtime constant definition

\- `const NAME = "value"`: Compile-time constant definition



\## Output Example



```

Welcome to php

Type of x: integer

Type of y: string

Type of z: boolean



Numbers 0 to 15 - Method 1 (for loop)

0 1 2 3 4 5 6 7 8 9 10 11 12 13 14 15



Numbers 0 to 15 - Method 2 (while loop)

0 1 2 3 4 5 6 7 8 9 10 11 12 13 14 15



Result = 55

Accepted



\[HTML Table with salary data]

```



\## Running the Code



1\. Ensure you have a PHP environment set up (XAMPP, WAMP, or local PHP installation)

2\. Place the `task.php` file in your web server directory

3\. Access the file through your browser: `http://localhost/task.php`

4\. View the formatted output in your browser



\## Learning Objectives



By completing this task, you will understand:

\- PHP variable declaration and initialization

\- Data type checking and manipulation

\- Loop structures and their applications

\- Constant definition and usage

\- Variable testing functions (`isset`, `empty`)

\- Basic HTML output generation with PHP

\- Conditional logic implementation

\- Custom function creation



\## File Structure



```

Day11-PHP-Task/

├── task.php          # Main PHP file with all exercises

└── README.md         # This documentation file

```



\## Notes



\- The code includes proper HTML formatting with `<br>` tags for line breaks

\- Comments are provided for each section to explain the functionality

\- The bonus function demonstrates three different methods for type conversion

\- All tasks are completed in a single PHP file for simplicity



\## ITI Summer Internship - Day 11

\*\*Program\*\*: PHP Development Track  

\*\*Focus\*\*: PHP Fundamentals, Variables, Loops, and Basic Web Output

