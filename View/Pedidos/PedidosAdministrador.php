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
        .fondo{
            background: url(asset/Imagenes/textura.jpg);
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
            width: 40%;
            margin: 0 auto; 
            opacity: 0.9;
            font-family: "arial";
            font-size: 20px;
            color:green;
            font-weight: bold;
        }
        .formulario{
            border: 2px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            background: whitesmoke;
            width: 75%;
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
              <h1> Pedidos </h1>
          </div>
          <div class="formularios">
              <form name="formCon" method="POST" action="index.php?c=pedido&a=consultarpedidoA">
                  <?php  if(isset($_SESSION ['resultado'])){ ?>
                <label>Fecha del pedido:</label>
                 <input type="date" name="fechaN" id="fechaN"/>
                  <?php }else{ ?>
                  <label>Ingrese fecha del pedido:</label>
                    <input type="date" name="fechaN" id="fechaN"/>
                  <?php } ?>
                  <div class="botones">
                  <input class="btn" type="submit" value="Buscar" style="padding: 5px 35px; margin-right: 5px;"/>
               </div>     
              </form>
          </div>
          <br>
          <br>
              <div class="formulario">
                  <?php  if(isset($_SESSION['resultado'])){ ?>
                  <table>
                      <thead>
                          <tr>
                              <th style=" border:2px solid black; width:15% ;text-align: center"> Factura </th>
                              <th style=" border:2px solid black; width:25%;text-align: center"> Plato </th>
                              <th style=" border:2px solid black; width:10%;text-align: center"> Precio </th>
                              <th style=" border:2px solid black; width:10%;text-align: center "> Cantidad </th>
                              <th style=" border:2px solid black;  width:10%;text-align: center"> Editar </th>
                              <th style=" border:2px solid black;  width:10%;text-align: center"> Eliminar </th>
                          </tr>
                        </thead>
                        
                          
                      <tbody>
                          <?php  if($_SESSION['rol'] == 'cli'){ ?>
                           <?php foreach($resultado as $res){?>
                          
                          <?php if($_SESSION['cedula'] == $res['cedula']){  ?>
                          <tr>
                              <td style=" border:2px solid black; width:15%;text-align: center "> <?php echo $res['id_factura'] ?> </td>
                              <td style=" border:2px solid black; width:20%;text-align: center "> <?php echo $res['nombre'] ?> </td>
                              <td style=" border:2px solid black; width:10%;text-align: center "> <?php echo $res['precio_plato'] ?> </td>
                              <td style=" border:2px solid black; width:10%;text-align: center "> <?php echo $res['cantidad'] ?> </td>
                              <td style=" border:2px solid black; width:15% "><a href="index.php?c=pedido&a=mostrarModificar&id=<?php echo $res['id_factura'] ?>">Modificar</a></td>                              
                              <td style=" border:2px solid black; width:15% "><a href="index.php?c=pedido&a=eliminar&id=<?php echo $res['id_factura'] ?>" 
                              onclick="javascript:return confirm('esta seguro?');">Eliminar</a></td>
                          </tr>       
                  <?php } } ?>
                          <?php } ?>
                              <?php  if($_SESSION['rol'] == 'adm'){ ?>
                           <?php foreach($resultado as $res){?>
                          <tr>
                              <td style=" border:2px solid black; width:15%;text-align: center "> <?php echo $res['id_factura'] ?> </td>
                              <td style=" border:2px solid black; width:20%;text-align: center "> <?php echo $res['nombre'] ?> </td>
                              <td style=" border:2px solid black; width:10%;text-align: center "> <?php echo $res['precio_plato'] ?> </td>
                              <td style=" border:2px solid black; width:10%;text-align: center "> <?php echo $res['cantidad'] ?> </td>
                              <td style=" border:2px solid black; width:10%;text-align: center ">Editar</td>
                              <td style=" border:2px solid black; width:15% "><a href="index.php?c=pedido&a=eliminar&id=<?php echo $res['id_factura'] ?>" 
                              onclick="javascript:return confirm('esta seguro?');">Eliminar</a></td>
                          </tr>       
                  <?php  } ?>
                          <?php } ?>
                      </tbody> 
                  </table>   
                  <?php }?>
                  </div>
          <br>
          <br>
                  <div class="formularios">
                      <form name="formCon" method="POST" action="index.php?c=index&a=inicio">
                          <div class="botones">
                       <input class="btn" type="submit" value="Salir" style="padding: 5px 35px; margin-right: 5px;"/>
                          </div>  
                      </form>
                  </div>
       
        
             
      </div>
      
  </body>

