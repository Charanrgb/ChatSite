
function Copy(c){
var a = document.getElementsByClassName("msg")[c].innerHTML;
    if (a.includes("Reply to"))
        a = a.substr(9);
    if(a.includes('From '))
        a = a.substr(5);
    document.getElementById("Fname").value = a;
}
function change(){
    var x = document.getElementsByName("username");
    x[0].setAttribute("style", "background-color: rgb(212, 83, 78);");
    x = document.getElementsByName("pass");
    x[0].setAttribute("style", "background-color: rgb(212, 83, 78);");
}

