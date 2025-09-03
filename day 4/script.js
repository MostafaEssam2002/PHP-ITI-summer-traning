// let name = prompt("Enter your name:");
// document.writeln(`<h1>${name}</h1><br>`)
// document.writeln(`<h2>${name}</h2><br>`)
// document.writeln(`<h3>${name}</h3><br>`)
// document.writeln(`<h4>${name}</h4><br>`)
// document.writeln(`<h5>${name}</h5><br>`)
// document.writeln(`<h6>${name}</h6><br>`)
// ++++++++++++++++++++++++++++++++++++++++++++++
// task 2
// let sum = 0;

// while (true) {
// let input = prompt("Enter a number (0 to stop):");
// if (input === null) {
//     alert("Input cancelled. Total sum: " + sum);
//     break;
// }
// let value = Number(input);
// if (isNaN(value)) {
//     alert("Invalid input! Please enter a numeric value.");
//     continue;
// }
// if (value === 0) {
//     alert("You entered 0. Total sum: " + sum);
//     break;
// }
// sum += value;
// if (sum > 100) {
//     alert("Sum exceeded 100! Final sum: " + sum);
//     break;
// }
// }
// +++++++++++++++++++++++++++++++++++++++++++++++
// task 3
// function checkNumber() {
// let num = document.getElementById("num").value;
// num = Number(num);

// let output = "";

// if (num % 3 === 0 && num % 5 === 0) {
//     output = "fizz buzz";
// } else if (num % 3 === 0) {
//     output = "fizz";
// } else if (num % 5 === 0) {
//     output = "buzz";
// } else {
//     output = num; 
// }

// document.getElementById("result").innerText = "Output: " + output;
// }