<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="asset/CSS/estilos.css">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="asset/bootstrap-4.0.0-alpha.6-dist/css/bootstrap.min.css">
        <title>Envueltos</title>
        <link rel="shortcut icon" href="asset/Imagenes/logo.jpg"/>
        <style>
            @font-face{
                font-family: "Brusher";
                src: url(asset/fuentes/Brusher.ttf);
            }
            .titulo{
                color:green; 
                margin-top: 70px;
            }
            .cuerpo{
                max-width: 100%;
                background: url("asset/Imagenes/textura2.jpg") no-repeat fixed;
            }            
            .contImagen{
                width: 50%; 
                margin: 0 auto;
                background: limegreen;
                opacity: 0.7; 
                color:white;
                font-family:'Arial';
                font-weight: bold;
                font-size: 1.5em;
                position:relative;
                
            }
            .filas{
                padding: 20px; 
            }
            .filas input[type='file']{
                color:limegreen;
                padding: 15px;
                margin:0 auto; 
                width: 80%;
                background: white;
                border-radius: 5px;
                box-shadow: 5px 5px 5px grey; 
            }
        </style>   
        
    </head>
    <body class="cuerpo">
        <div class="titulo">
            <h1 style="font-size: 80px;font-family:'Brusher'; text-align:center;">Nuevos Platos</h1>
        </div>        
        <div  style="margin-top: 70px; margin-bottom:40px; "class="container-fluid contImagen">
            <form action="index.php?c=MenuImagenes&a=<?php echo isset($datos)? 'editar': 'insertar';?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo isset($datos)? $datos['id_menu_imagen']: '';?>" />
                <div class="row filas">
                    <label>Nombre del Plato: </label>
                    <input style="margin-left: 10px;" type="text" name="plato" value="<?php echo isset($datos)? $datos['nombre']: '';?>" placeholder="Ingrese el nombre del plato"/>
                </div>
                <div class="row filas">
                    <label>Tipo de Menu: </label>
                    <select style="margin-left: 50px;" type="tipo" name="menu">
                        <option value="0" >Seleccionar</option>
                        <?php foreach ($tipos as $t){?>
                            <option value="<?php echo $t['id_tipomenu']; ?>"
                                  <?php
                                    if (isset($datos)){
                                        if($t['id_tipomenu']== $datos['tipo_menu']){
                                            echo 'selected';
                                        }
                                    }
                                  ?>  
                            ><?php echo $t['descripcion']; ?></option>
                        <?php }
                        ?>
                    </select>
                </div> 
                <div class="row filas">
                    <label>Precio del Plato: </label>
                    <input style="margin-left: 22px;" type="text" name="precio_plato" value="<?php echo isset($datos)? $datos['precio_plato']: '';?>" placeholder="Ingrese el precio del plato"/>
                </div>
                <?php echo isset($datos)? '' : 
                    '<div class="row filas boton">
                       <label>Seleccione una imagen: </label>
                       <input type="file" name="imagen"/>
                   </div>'
                ?>               
                <div class="row filas">
                    <input style="margin-left: 40%;" type="submit" name="enviar" value="Subir Imagen"/>      
                </div>        
            </form>  
        <div>
        </div>
        </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>

