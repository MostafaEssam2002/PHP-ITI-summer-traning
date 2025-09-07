let radius = prompt("What is the value of your circle's radius");
let area = Math.PI * Math.pow(radius, 2);
document.writeln("Total area of the circle is " + area+"<br>");
let value = prompt("What is the value you want to calculate its square root");
let sqrtValue = Math.sqrt(value);
document.writeln("Square root of " + value + " is " + sqrtValue+"<br>");
let angle = prompt("What is the angle you want to calculate its cos value");
let cosValue = Math.cos(angle * Math.PI / 180);
document.writeln("cos " + angle + "° is " + cosValue.toFixed(4)+"<br>");