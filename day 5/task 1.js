// task1
function data(text){
    let sum = 0;
    for(let i=0;i<text.length;i++){
        if(text[i].toLowerCase()==='e'){
            sum++;
            
        }
    }
    document.writeln(sum);
    // document.writeln(text);
}
let text = prompt("enter text");
data(text);
// document.writeln("<script>alert(xss)</script>");