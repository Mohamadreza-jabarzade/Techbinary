const input = document.getElementsByTagName("input");
let x = document.getElementById('ad');
let fa = /^[آ-ی]/;
for(let inp of input){
    if(inp.getAttribute("type") == "email" || inp.getAttribute("type") == "text"){
        inp.addEventListener("input",()=> align(inp));
    }
}


function align(elem){
    
    if(fa.test(elem.value[0]) === true){
        elem.dir = "rtl";
        elem.style.textAlign = 'right';
    }else{
        elem.dir = "ltr";
        elem.style.textAlign = 'left';
    }
}