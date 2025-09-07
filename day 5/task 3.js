var arr = [];
for (var i = 0; i < 3; i++) {
    arr[i] = parseFloat(prompt("Enter value " + (i + 1) + ":"));
}
var sum = arr[0] + arr[1] + arr[2];
var mul = arr[0] * arr[1] * arr[2];
var div = arr[0] / arr[1] / arr[2];
document.write("<h2>Adding -- Multiplying -- and dividing 3 values</h2><hr>");
document.write("<p style='color:red'><b>sum of the 3 values</b> " + arr[0] + "+" + arr[1] + "+" + arr[2] + " = " + sum + "</p>");
document.write("<p style='color:red'><b>multiplication of the 3 values</b> " + arr[0] + "*" + arr[1] + "*" + arr[2] + " = " + mul + "</p>");
document.write("<p style='color:red'><b>division of the 3 values</b> " + arr[0] + "/" + arr[1] + "/" + arr[2] + " = " + div + "</p>");
