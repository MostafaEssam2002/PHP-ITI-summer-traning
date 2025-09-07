function findLetterPositions(sentence, letter) {
    const positions = [];
    for (let i = 0; i < sentence.length; i++) {
        if (sentence[i].toLowerCase() === letter.toLowerCase()) {
            positions.push(i);
        }
    }
    return positions;
}
const sentence = prompt("Enter a sentence:");
const letter = prompt("Enter a letter to find its positions:");
const positions = findLetterPositions(sentence, letter);
// document.write("<h2>Letter Positions</h2><hr>");
document.writeln(positions);