<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="asset/js/ajax.js"></script>
    <style>
        @font-face{
            font-family: "Brusher";
            src: url(asset/fuentes/Brusher.ttf);
        }
        h1{
            margin-top: 25px;
            text-align: center;
            font-family: "brusher";
            font-size: 80px;
            color: white;
        }
        .fondo{
            background: url(asset/Imagenes/textura.jpg) no-repeat fixed;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100%;
            padding: 30px;
            margin-bottom: 10px;
        }
        .contenido{
            padding: 20px;
            width:65%;
            background:whitesmoke; 
            margin: 30px auto;
            border-radius:10px;          
        }
        .encabezado{
            padding: 20px;
            border: 2px solid grey;
            border-radius: 10px;
        }

        .btnPedido{
            background: gainsboro; 
            color: green;
            
        }
        label{
            font-weight: bold;
            color:green;
        }
        .btn{
            border:none;
            border-radius: 5px;
            font-weight: bold;   
            text-decoration: none; 
        }
        #btnbuscar{
            margin-top: 0px ;  
            padding: 2px 2px;
            margin-left: 10px;
        }
        .fila1{
            text-align: center;
            font-weight: bold;
            border:2px solid green;
        }
        #btn:hover{
            background: gainsboro; 
        }
        .btnPedido:hover{
            background: greenyellow;
        }
    </style>
  </head>
  <body>
      <div class="fondo">
          <h1>Registro de Pedidos</h1>
          <form class="contenido" method="POST" action="index.php?c=pedido&a=editarPedido">
              <div class="encabezado">
                <div class="row">
                    <div class="col">
                        <label>Cedula: </label>
                        <input style="margin-left:110px" type="text" name="cedula" id="cedula"
                               <?php if(isset($_SESSION['rol'])&& $_SESSION['rol']=='cli'){?>
                                 readonly value="<?php echo $_SESSION['cedula']?>"
                               <?php } ?> 
                               >
                    </div>
                    <div class="col">
                            <label>N° Factura: </label>
                            <input style="margin-left:61px" type="text" name="numeroFactura" id="numFactura"
                                   readonly value="<?php echo $factura['id_factura'];?>"
                            >
                         </div>        
                </div> 
                <div class="row">
                    <div class="col">
                        <label>Nombre: </label>
                        <input style="margin-left:100px;" type="text" name="nombre" id="nombre"
                               <?php if(isset($_SESSION['rol'])&& $_SESSION['rol']=='cli'){?>
                                readonly value="<?php echo $_SESSION['nombre']?>"
                               <?php } ?>                                
                        >
                    </div>
                    <div class="col">
                        <label>Apellido: </label>
                        <input style="margin-left:77px;" type="text" name="apellido" id="apellido"
                               <?php if(isset($_SESSION['rol'])&& $_SESSION['rol']=='cli'){?>
                                 readonly value="<?php echo $_SESSION['apellido']?>"
                               <?php } ?>                                
                        >
                     
                    </div>
                </div> 
                <div class="row">
                    <div class="col">
                        <label>Direccion de Entrega:</label>
                        <input style="margin-left:6px;" type='text' name='direccion' id='direccion' value="<?php echo $factura['direccion_entrega'];?>">
                    </div>
                    <div class="col">
                        <label>Fecha de entrega: </label>
                        <input style="margin-left:12px;" type='date' name='fechae' id='fechae' value=''>
                    </div>
                </div>
              </div>
              <div style="padding-left:780px;">
                  <input style="border-radius:5px;border:none; font-weight: bold;
                         padding: 8px 20px;"type="submit" value='Guardar' class='btnPedido'>
              </div>
          </form>  
      </div>
 </body>