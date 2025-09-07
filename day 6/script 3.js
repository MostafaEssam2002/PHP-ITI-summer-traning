function secondLowestGreatest(arr) {
    let sorted = [...new Set(arr)].sort((a, b) => a - b);
    if (sorted.length < 2) {
        return "Not enough unique numbers!";
    }
    let secondLowest = sorted[1];
    let secondGreatest = sorted[sorted.length - 2];
    return [secondLowest, secondGreatest];
}
let input = [1, 2, 3, 4, 5, 1, 5];
document.writeln(secondLowestGreatest(input));