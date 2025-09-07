function getTwoRandomNames(names) {
    let copy = [...names];
    copy.sort(() => 0.5 - Math.random());
    return copy.slice(0, 2);
}
let arr = ["ahmed", "islam", "sandra", "Fatma", "Ali"];
document.writeln(getTwoRandomNames(arr));
