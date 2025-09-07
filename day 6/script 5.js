const student = {
name: "John Doe",
age: 20,
grades: {
    math: 90,
    science: 85,
    literature: 88
},
contactInfo: {
    email: "johndoe@example.com",
    phone: "123-456-7890"
}
};

function printKeyValuePairs(obj, parentKey = "") {
for (let key in obj) {
    let fullKey = parentKey ? parentKey + "." + key : key;
    if (typeof obj[key] === "object" && obj[key] !== null) {
        printKeyValuePairs(obj[key], fullKey); // recursion
    } else {
    d   ocument.writeln(`${fullKey}: ${obj[key]}`+"<br>");
    }
}
}

// Test with student object
printKeyValuePairs(student);
