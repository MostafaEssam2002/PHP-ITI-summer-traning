// إنشاء مصفوفة فاضية
var arr = [];

// إدخال 5 أرقام من المستخدم
for (var i = 0; i < 5; i++) {
    arr[i] = parseFloat(prompt("Enter value " + (i + 1) + ":"));
}

// نسخ المصفوفة علشان نعمل منها Asc و Desc
var descArr = arr.slice().sort(function(a, b) { return b - a; });
var ascArr = arr.slice().sort(function(a, b) { return a - b; });

// عرض النتائج
document.write("<h2>Sorting</h2><hr>");
document.write("<p style='color:red'>u've entered the values of " + arr.join(", ") + "</p>");
document.write("<p style='color:red'>ur values after being sorted descending " + descArr.join(", ") + "</p>");
document.write("<p style='color:red'>ur values after being sorted ascending " + ascArr.join(", ") + "</p>");
