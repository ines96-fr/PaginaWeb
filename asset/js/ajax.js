var xmlhttp;
function cargarPlatos(){
    xmlhttp = new XMLHttpRequest(); 
    var tipoMenu=document.getElementById('tipoMenu').value;
    xmlhttp.onreadystatechange=actualiza;
    xmlhttp.open('GET','index.php?c=Pedido&a=menuPlatos&tipoMenu='+tipoMenu,true); 
    xmlhttp.send(); 
}

function actualiza(){
    if(xmlhttp.readyState===4 && xmlhttp.status===200){
        var res=xmlhttp.responseText;
        console.log(res);
        var tipoPlatos= JSON.parse(res);
        console.log(tipoPlatos); 
        var output="";
        for(i=0; i < tipoPlatos.length;i++){
            output+="<option value="+tipoPlatos[i].id_menu_imagen
                    +">"+tipoPlatos[i].nombre+"</option>";
        }
        var comboPlatos = document.getElementById('tipoPlato');
        document.getElementById('precio').value=tipoPlatos[0].precio_plato; 
        comboPlatos.innerHTML=output; 
    }
}
function cargarPrecio(){
    xmlhttp = new XMLHttpRequest(); 
    var tipoPlato=document.getElementById('tipoPlato').value;
    console.log(tipoPlato)
    xmlhttp.onreadystatechange=actualizar;
    xmlhttp.open('GET','index.php?c=Pedido&a=menuPlatos&tipoPlato='+tipoPlato,true); 
    xmlhttp.send(); 
}

function actualizar(){
    if(xmlhttp.readyState===4 && xmlhttp.status===200){
        var res=xmlhttp.responseText;
        console.log(res);
        var tipoPlatos= JSON.parse(res);
        console.log(tipoPlatos); 
        document.getElementById('precio').value=tipoPlatos[0].precio_plato; 
    }
}

