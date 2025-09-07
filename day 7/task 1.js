function add(a, b) {
    return a + b;
}

function multiply(a, b) {
  return a * b;
}
function applyOperation(a, b, operation) {
    return operation(a, b);
}
document.writeln(applyOperation(5, 3, add)+"<br>");      
document.writeln(applyOperation(5, 3, multiply)+"<br>");   
document.writeln(applyOperation(10, 2, (a, b) => a - b)+"<br>");
document.writeln(applyOperation(10, 2, (a, b) => a / b)+"<br>");