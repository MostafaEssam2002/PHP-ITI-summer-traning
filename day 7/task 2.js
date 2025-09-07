function processArray(arr, callback) {
    for (var i = 0; i < arr.length; i++) {
        document.writeln(callback(arr[i])+"<br>");
    }
}
function square(num) {
    return num * num;
}
var numbers = [1, 2, 3, 4, 5];
processArray(numbers, square);