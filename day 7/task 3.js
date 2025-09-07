var nameInput = document.createElement("input");
nameInput.placeholder = "Enter Student Name";
var nameError = document.createElement("div");
var ageInput = document.createElement("input");
ageInput.placeholder = "Enter Student Age";
ageInput.type = "number";
var ageError = document.createElement("div");
var addBtn = document.createElement("button");
addBtn.innerText = "Add Student";

var table = document.createElement("table");
var thead = document.createElement("thead");
thead.innerHTML = "<tr><th>ID</th><th>Name</th><th>Age</th><th>Actions</th></tr>";
var tbody = document.createElement("tbody");
table.appendChild(thead);
table.appendChild(tbody);


document.body.appendChild(nameInput);
document.body.appendChild(nameError);
document.body.appendChild(ageInput);
document.body.appendChild(ageError);
document.body.appendChild(addBtn);
document.body.appendChild(table);

// ========== Styling JS ==========
document.body.style.fontFamily = "Arial, sans-serif";
document.body.style.padding = "20px";

[nameInput, ageInput].forEach(function(el) {
el.style.display = "block";
el.style.width = "300px";
el.style.padding = "8px";
el.style.margin = "10px 0";
el.style.fontSize = "16px";
el.style.border = "2px solid black";
el.style.borderRadius = "8px";
});

[nameError, ageError].forEach(function(el) {
el.style.color = "red";
el.style.fontSize = "14px";
el.style.marginBottom = "5px";
});

addBtn.style.backgroundColor = "lightgreen";
addBtn.style.padding = "10px 20px";
addBtn.style.fontSize = "16px";
addBtn.style.border = "none";
addBtn.style.cursor = "pointer";
addBtn.style.marginBottom = "20px";
addBtn.style.borderRadius = "8px";

table.style.borderCollapse = "collapse";
table.style.width = "500px";

[thead, tbody].forEach(function(el) {
el.style.textAlign = "center";
});

table.querySelectorAll("th").forEach(function(th) {
th.style.border = "2px solid black";
th.style.padding = "10px";
th.style.background = "#f2f2f2";
});

// ========== منطق الطلاب ==========
var students = [];
var id = 1;

function displayStudents() {
    tbody.innerHTML = "";
    students.forEach(function(s) {
        var row = document.createElement("tr");
        var tdId = document.createElement("td");
        tdId.innerText = s.id;
        var tdName = document.createElement("td");
        tdName.innerText = s.name;
        var tdAge = document.createElement("td");
        tdAge.innerText = s.age;
        var tdAction = document.createElement("td");
        var del = document.createElement("span");
        del.innerText = "delete Student";
        del.style.color = "red";
        del.style.cursor = "pointer";
        del.style.textDecoration = "underline";
        del.onclick = function() {
        students = students.filter(function(st) { return st.id !== s.id; });
        displayStudents();
        };
        [tdId, tdName, tdAge, tdAction].forEach(function(td) {
            td.style.border = "2px solid black";
            td.style.padding = "10px";
        });
        tdAction.appendChild(del);
        row.appendChild(tdId);
        row.appendChild(tdName);
        row.appendChild(tdAge);
        row.appendChild(tdAction);
        tbody.appendChild(row);
    });
}

// إضافة طالب
addBtn.onclick = function() {
var name = nameInput.value.trim();
var age = parseInt(ageInput.value.trim());
var valid = true;
nameError.innerText = "";
ageError.innerText = "";
if (name === "") {
    nameError.innerText = "Student Name is Required";
    valid = false;
} else if (name.length <= 3) {
    nameError.innerText = "Name Length Must be greater than 3";
    valid = false;
}
if (!age) {
    ageError.innerText = "Age is Required";
    valid = false;
} else if (age <= 18) {
    ageError.innerText = "Age Must be greater than 18";
    valid = false;
}
if (!valid) return;
var student = { id: id++, name: name, age: age };
students.push(student);
displayStudents();
nameInput.value = "";
ageInput.value = "";
};