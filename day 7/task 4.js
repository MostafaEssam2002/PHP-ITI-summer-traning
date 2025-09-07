// ===== Create Inputs & Button =====
var tagInput = document.createElement("input");
tagInput.placeholder = "TagName";

var classInput = document.createElement("input");
classInput.placeholder = "className";

var idInput = document.createElement("input");
idInput.placeholder = "Id";

var nameInput = document.createElement("input");
nameInput.placeholder = "Name";

var btn = document.createElement("button");
btn.innerText = "Show Result";

// Output div
var output = document.createElement("div");
output.style.marginTop = "20px";
output.style.border = "2px solid black";
output.style.padding = "10px";
output.style.minHeight = "40px";
output.style.fontFamily = "Arial";
output.style.fontSize = "16px";
output.style.fontWeight = "bold";
output.style.color = "purple";

// Add elements to page
document.body.appendChild(tagInput);
document.body.appendChild(classInput);
document.body.appendChild(idInput);
document.body.appendChild(nameInput);
document.body.appendChild(btn);
document.body.appendChild(output);

// ===== Styling inputs & button =====
[tagInput, classInput, idInput, nameInput].forEach(function (el) {
    el.style.margin = "5px";
    el.style.padding = "6px";
    el.style.border = "2px solid black";
    el.style.borderRadius = "6px";
});

btn.style.margin = "10px";
btn.style.padding = "10px 20px";
btn.style.background = "blue";
btn.style.color = "white";
btn.style.border = "none";
btn.style.cursor = "pointer";
btn.style.borderRadius = "6px";

// ===== Logic =====
btn.onclick = function () {
var tagName = tagInput.value.trim();
var className = classInput.value.trim();
var idName = idInput.value.trim();
var nameAttr = nameInput.value.trim();

var tagCount = tagName ? document.getElementsByTagName(tagName).length : 0;
var classCount = className ? document.getElementsByClassName(className).length : 0;
var idExists = idName ? (document.getElementById(idName) ? "True" : "False") : "False";
var nameCount = nameAttr ? document.getElementsByName(nameAttr).length : 0;

output.innerText = 
    "Number Of " + tagName + " : " + tagCount +
    "   Class " + className + " : " + classCount +
    "   Id : " + idExists +
    "   Name : " + nameCount;
};
