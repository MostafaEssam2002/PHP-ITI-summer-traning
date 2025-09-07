<?php
// 1- Print “Welcome to php”
echo "Welcome to php<br>";

// 2- Define the below variables
$x = 5;
$y = 'Welcome';
$z = True;

// 3- Display the type of each variable
echo "Type of x: " . gettype($x) . "<br>";
echo "Type of y: " . gettype($y) . "<br>";
echo "Type of z: " . gettype($z) . "<br>";

// 4- Write a php script to print numbers from 0 to 15 using 2 methods
echo "<h3>Numbers 0 to 15 - Method 1 (for loop)</h3>";
for ($i = 0; $i <= 15; $i++) {
    echo $i . " ";
}
echo "<br>";
echo "<h3>Numbers 0 to 15 - Method 2 (while loop)</h3>";
$i = 0;
while ($i <= 15) {
    echo $i . " ";
    $i++;
}
echo "<br>";

// 5- Define a constant with value “ITI”
define("ORG", "ITI");
const organization = "ITI"; 
echo "Constant ORG = " . ORG . "<br>";
echo "Constant organization = " . organization . "<br>";

// 6- Print the gettype of all variables
echo "gettype(x) = " . gettype($x) . "<br>";
echo "gettype(y) = " . gettype($y) . "<br>";
echo "gettype(z) = " . gettype($z) . "<br>";

// 7- Print the isset of all variables
echo "isset(x): " . (isset($x) ? "true" : "false") . "<br>";
echo "isset(y): " . (isset($y) ? "true" : "false") . "<br>";
echo "isset(z): " . (isset($z) ? "true" : "false") . "<br>";

// 8- Print the empty of all variables
echo "empty(x): " . (empty($x) ? "true" : "false") . "<br>";
echo "empty(y): " . (empty($y) ? "true" : "false") . "<br>";
echo "empty(z): " . (empty($z) ? "true" : "false") . "<br>";

// 9- Add two numbers m and n
$m = 30;
$n = 25;
$result = $m + $n;
echo "Result = $result<br>";
if ($result > 50) {
    echo "Accepted<br>";
} else {
    echo "Not Accepted<br>";
}

// 10- Write a PHP script to display string, values within a table
echo "<h3>Salaries Table</h3>";
echo "<table border='1' cellpadding='5'>";
echo "  <tr>
            <td>Salary of Mr. A is </td>
            <td>1000$</td>
        </tr>";
echo "<tr>
        <td>Salary of Mr. B is </td>
        <td>1200$</td>
    </tr>";
echo "<tr>
        <td>Salary of Mr. C is </td>
        <td>1400$</td>
    </tr>";
echo "</table>";

// ---- Extra: Number to String Function ----
function numberToString($num) {
    // return strval($num);
    // return (string)$num;
    return $num."";

}
echo "<h3>Number to String Function</h3>";
echo numberToString(123) . "<br>";
echo numberToString(999) . "<br>";
?>