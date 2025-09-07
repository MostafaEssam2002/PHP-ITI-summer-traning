function checkPalindrome() {
    let str = prompt("Enter a string to check if it's a palindrome:");
    let caseSensitive = confirm("Do you want to consider case sensitivity?");
    let originalStr = str;
    if (!caseSensitive) {
        str = str.toLowerCase();
    }
    let reversedStr = str.split("").reverse().join("");
    if (str === reversedStr) {
        alert(originalStr + " is a Palindrome ");
    } else {
        alert(originalStr + " is NOT a Palindrome ");
    }
}
checkPalindrome();