<?php 
if(!isset($_SESSION))session_start ();
?>
<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script type="text/javascript" src="validaciones/validaciones.js"></script>
    <link rel="stylesheet" href="CSS/estilos.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap-4.0.0-alpha.6-dist/css/bootstrap.min.css">
    <title>Envueltos</title>
    <link rel="shortcut icon" href="Imagenes/logo.jpg"/>
    
    <style>
        @font-face{
            font-family: "Brusher";
            src: url(fuentes/Brusher.ttf);
        }
        .fondo{
            background: url(Imagenes/textura.jpg);
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100%;
            padding: 30px;
            margin-bottom: 10px;
        }
        h1{
            text-align: center;
            font-family: "brusher";
            font-size: 60px;
            color: white;
            text-shadow:5px 3px black;
        }
        .zona{
            padding-top:30px; 
        } 
        .formularios{
            border: 2px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            background: whitesmoke;
            width: 70%;
            margin: 0 auto; 
            opacity: 0.9;
            font-family: "arial";
            font-size: 20px;
            color:green;
            font-weight: bold;
        }

        .cedula label{
            padding-right:  27px;
        }

        .nombre label{
            padding-right: 19px;
        }

        .telefono label{
            padding-right: 15px;
        }
        .apellidos label{
            padding-right: 4.5px;
        }
        .direccion label{
            padding-right: 5px;
        }
        .direccion{
            padding-top: 2px;
        }
        .seleccionMenu, .tipoPago, .botones{
            padding-top: 20px;
            text-align: center;
        }
        
        .seleccionMenu input[type="checkbox"], .tipoPago input[type="radio"]{
            margin-left: 10px;
        }  
        
        .btn:hover{
            background: green;
            opacity: 0.7;
        }
 

    </style>
  </head>
  
  <body>
      <div class="fondo">
          <div class="zona">
              <h1> Eliminar Pedidos </h1>
          </div>
          <div class="formularios">
              <form name="formCon" method="POST" action="index.php?c=pedido&a=consultarpedido">
                  <?php  if(isset($_SESSION ['resultado'])){ ?>
                  <input type="text" name="cedula" id="cedu" value="<?php echo  $_SESSION['resultado'];?>"
                  <?php }else{ ?>
                  <label> Ingrese cedula  </label>
                  <input type="text" name="cedula" id="cedu" >
                  <?php } ?>
                  <div class="botones">
                  <input class="btn" type="submit" value="Buscar" style="padding: 5px 35px; margin-right: 5px;"/>
                  <input class="btn"type="reset" name="limpieza" value="Cancelar" style="padding: 5px 27px;"/>
               </div>      
              </form>
          </div>
           <?php if(isset($_SESSION['resultado'])){ ?>
              <div class="formularios">
                 
              <form name="formCon" method="POST" action="index.php?c=pedido&a=eliminar">
                  
                  <?php  if(isset($_SESSION['resultado'])){ ?>
                    <?php foreach ($resultado as $res){  ?>
                  <?php  if($_SESSION['resultado'] == $res['cedula']){ ?>
                   <div class="cedula">
                       <label>Cedula:</label>
                       <input type="text" name="cedula" id="cedu" value=" <?php echo $res['cedula'];  ?>"/>
                </div>
                  <div class="direcciones">
                       <label>Direccion:</label>
                       <input type="text" name="cedula" id="cedu" value=" <?php echo $res['direccion'];  ?>"/>
                  </div>
                    <div class="telefono">
                       <label>Telefono:</label>
                       <input type="text" name="cedula" id="cedu" value=" <?php echo $res['telefono'];  ?>"/>
                       <table >
                           <thead style="border:2px solid black">
                            <tr style="border:2px solid black">
                                <th style="border:2px solid black; padding-left: 30px;padding-right: 30px">cantidad</th>
                                <th style="border:2px solid black;padding-left: 30px;padding-right: 30px">Pedido</th>
                                <th style="border:2px solid black;padding-left: 30px;padding-right: 30px">Tipo</th>
                            </tr>
                            </thead>
                            
                            <tbody >
                            <tr>         
                           <td style="border:2px solid black; padding-left: 30px;padding-right: 30px">  <?php echo $res['cantidad'];  ?>   </td>
                           <?php foreach ($po as $plato) { ?>
                           <?php if($res['id_plato'] == $plato['id_plato']) { ?>
                           <td style="border:2px solid black; padding-left: 30px;padding-right: 30px">  <?php echo $plato['nombre_plato'];  ?> </td>
                           <?php } } ?>

                           
                           <?php foreach ($pe as $menu) { ?>
                           <?php if($res['id_tipomenu'] == $menu['id_tipomenu']) { ?>
                           <td style="border:2px solid black; padding-left: 30px;padding-right: 30px"> <?php  echo $menu['descripcion'];  ?> </td>
                           <?php }}  ?>
        </tr>
    </tbody> 
                       </table>
                       
                  </div>
                  <?php } } }  ?>
                   <?php  if(isset($_SESSION['resultado'])){ ?>
                  <input class="btn" type="submit" value="Eliminar Pedido" style="padding: 5px 35px; margin-right: 5px;"/>
                  <?php  } } ?>
                  
              </form>
          </div>
      </div>
      
      
      
      
  </body>


