function color(nodoA){
    nodoA.setAttribute("style", "background:whitesmoke; border-radius: 20px;\n\
    border: 3px dotted grey");
}
function quitar(){
    var bebidas=document.querySelectorAll(".bebidas"); 
    for(var i=0; i < bebidas.length; i++){
        bebidas[i].setAttribute("style", "background:white;");
    }
}
function atl(){
var imagen = document.querySelector("alt");
imagen.setAttribute("style","visibility:visible");

}
function salir(){
    var imagen = document.querySelectorAll("alt");
    imagen.setAttribute("style","visibility:hidden");
}


