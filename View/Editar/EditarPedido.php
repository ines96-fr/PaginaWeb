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
            width: 50%;
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
              <h1> Busque el pedido que desea editar </h1>
          </div>
               <div class="formularios">
              <form name="formCon" method="POST" action="index.php?c=pedido&a=consultarpedidoA2">
                  <?php  if(isset($_SESSION ['resultado'])){ ?>
                  <label>  Cedula  </label>
                  <input type="text" name="cedula" id="cedu" value="<?php echo  $_SESSION['resultado'];?>"
                  <?php }else{ ?>
                  <label> Ingrese cedula  </label>
                  <input type="text" name="cedula" id="cedu" >
                  <?php } ?>
                  <div>
                      
           <?php if(isset($_SESSION['resultado'])){ ?>
          <?php foreach ($_SESSION['respuesta'] as $res){  ?>
          <?php if($res['cedula'] == $_SESSION['resultado']){  ?>
                      <h1> Informacion de Pedido  </h1>
           <div class="cedula">
                    <label>Cedula:</label>
                   
                     <input type="text" name="dire" id="direccion" value="<?php 
                     echo $res['cedula'];?>"/>
                   
                </div>
                  <div class="direccion">
                    <label>Direccion:</label>
                
                    <input type="text" name="dire" id="direccion" value="<?php echo $res['direccion'];  ?>"/>
                 
                </div>
                  <div class="telefono">
                      <label> Telefono </label>
                    <input type="text" name="tele" id="telefono" value="<?php echo $res['telefono'];  ?>"/>
                </div>
                            <table>
                           <thead style="border:2px solid black">
                            <tr style="border:2px solid black">
                                <th style="border:2px solid black; padding-left: 30px;padding-right: 30px">cantidad</th>
                                <th style="border:2px solid black;padding-left: 30px;padding-right: 30px">Pedido</th>
                                <th style="border:2px solid black;padding-left: 30px;padding-right: 30px">Tipo de plato</th>
                            </tr>
                            </thead>
                            
                            <tbody >
                            <tr>         
                           <td style="border:2px solid black; padding-left: 30px;padding-right: 30px">  <?php echo $res['cantidad'];  ?>   </td>
                           <?php foreach ($_SESSION['po'] as $plato) { ?>
                           <?php if($res['id_plato'] == $plato['id_plato']) { ?>
                           <td style="border:2px solid black; padding-left: 30px;padding-right: 30px">  <?php echo $plato['nombre_plato'];  ?> </td>
                           <?php } } ?>
                           <?php foreach ($_SESSION['pe'] as $menu) { ?>
                           <?php if($res['id_tipomenu'] == $menu['id_tipomenu']) { ?>
                           <td style="border:2px solid black; padding-left: 30px;padding-right: 30px"> <?php  echo $menu['descripcion'];  ?> </td>
                           <?php }}  ?>
                           </tr>
                          </tbody> 
                       </table> 
                  <?php  } } } ?>
                  </div>
                     <div class="botones">
                  <input class="btn" type="submit" value="Buscar" style="padding: 5px 35px; margin-right: 5px;"/>
               </div>  
              </form>
          </div>
          <div class="formularios">
               <?php if(isset($_SESSION['resultado'])){ ?>
              <?php foreach ($_SESSION['respuesta'] as $res){  ?>
              <form name="formCon" method="POST" action="index.php?c=pedido&a=sesiones1">
                  <div class="cedula">
                    <label>Cedula:</label>
                    <?php  if(isset($_SESSION['cedula'])){ ?>
                    <input type="text" name="cedula" id="cedu" value="<?php  echo $_SESSION['cedula'] ;?>"/>
                    <?php }else { ?>
                    <input type="text" name="cedula" id="cedu" value="<?php 
                     echo $res['cedula'];?>"/>
              <?php }  ?>
                </div>
                   <div class="direccion">
                    <label>Direccion:</label>
                    <?php if(isset($_SESSION['direccion'])){  ?>
                    <input type="text" name="direccion" id="direccion" value="<?php echo $_SESSION['direccion']  ?>"/>
                    <?php }else{  ?>
                     <input type="text" name="direccion" id="direccion" value="<?php 
                     echo $res['direccion'];?>"/>
                    <?php }  ?>
                </div>
                   <div class="telefono">
                    <label>Telefono:</label>
                     <?php if(isset($_SESSION['telefono'])){  ?>
                    <input type="text" name="telefono" id="telefono" value="<?php echo $_SESSION['telefono']  ?>"/>
                     <?php }else{  ?>
                     <input type="text" name="telefono" id="telefono" value="<?php 
                     echo $res['telefono'];?>"/>
                      <?php }  ?>
                </div>
                  
                   <div >
                    <label>Pedidos:</label>
                    <br>
                    <input type="checkbox" name="envuelto" value="1" />Envueltos
                    <input type="checkbox" name="carta" value="3"/>Platos a la carta
                    <input type="checkbox" name="desayuno" value="2"/>Desayuno
                    <input type="checkbox" name="bebida" value="4"/>Bebidas
             <?php  if(isset($_SESSION['envuelto'])){ ?>
                    <?php foreach ( $_SESSION['po'] as $a){ ?>
                   
                    <?php  if($_SESSION['envuelto'] == $a['id_tipomenu'] && $a['id_plato'] == 22) { ?>
                    <br>
             <label>Menu envuelto:</label>
            <input type="checkbox" name="bollo" value="22" /> <?php echo $a['nombre_plato'];  ?>
                    <?php  } ?>
            <?php  if($_SESSION['envuelto'] == $a['id_tipomenu'] && $a['id_plato'] == 23) { ?>
            <input type="checkbox" name="huma" value="23" /><?php echo $a['nombre_plato'];  ?>
            <?php  } ?>
            <?php  if($_SESSION['envuelto'] == $a['id_tipomenu'] && $a['id_plato'] == 24) { ?>
            <input type="checkbox" name="hayaca" value="24" /><?php echo $a['nombre_plato'];  ?>
            <?php  } ?>
                    <?php  } } ?>
            
              <?php  if(isset($_SESSION['carta'])){ ?>
             <?php foreach ( $_SESSION['po'] as $a){ ?>
            
             <?php  if($_SESSION['carta'] == $a['id_tipomenu'] && $a['id_plato'] == 11) { ?>
            <br>
                    <label>Menu platos a la carta:</label>
                    <input type="checkbox" name="caldoG" value="11" /><?php echo $a['nombre_plato'];  ?>
             <?php }?>
               <?php  if($_SESSION['carta'] == $a['id_tipomenu'] && $a['id_plato'] == 12) { ?>
                    <input type="checkbox" name="secoP" value="12" /><?php echo $a['nombre_plato'];  ?>
             <?php }?>
                    
              <?php  if($_SESSION['carta'] == $a['id_tipomenu'] && $a['id_plato'] == 13) { ?>
                    <input type="checkbox" name="secoC" value="13" /><?php echo $a['nombre_plato'];  ?>
             <?php }?>
             <?php } }  ?>
                    
                       
             <?php  if(isset($_SESSION['desayuno'])){ ?>
             <?php foreach ( $_SESSION['po'] as $a){ ?>
                     <?php  if($_SESSION['desayuno'] == $a['id_tipomenu'] && $a['id_plato'] == 1) { ?>
            <br>
                    <label>Menu de desayunos:</label>
                    <input type="checkbox" name="bistecH" value="1" /><?php echo $a['nombre_plato'];  ?>
             <?php }?>
              <?php  if($_SESSION['desayuno'] == $a['id_tipomenu'] && $a['id_plato'] == 2) { ?>
                    <input type="checkbox" name="bistecP" value="2" /><?php echo $a['nombre_plato'];  ?>
             <?php }?>
             <?php  if($_SESSION['desayuno'] == $a['id_tipomenu'] && $a['id_plato'] == 3) { ?>
                    <input type="checkbox" name="bistecC" value="3" /><?php echo $a['nombre_plato'];  ?>
             <?php }?>
             <?php }}  ?>
                    
              <?php  if(isset($_SESSION['bebida'])){ ?>
                  <?php foreach ( $_SESSION['po'] as $a){ ?>   
                    <?php  if($_SESSION['bebida'] == $a['id_tipomenu'] && $a['id_plato'] == 17) { ?>
            <br>
                    <label>Menu de bebidas:</label>
                    <input type="checkbox" name="Gaseosas" value="17" /><?php echo $a['nombre_plato'];  ?>
             <?php }?>
             <?php  if($_SESSION['bebida'] == $a['id_tipomenu'] && $a['id_plato'] == 18) { ?>
                    <input type="checkbox" name="Cafe" value="18" /><?php echo $a['nombre_plato'];  ?>
             <?php }?>
             <?php  if($_SESSION['bebida'] == $a['id_tipomenu'] && $a['id_plato'] == 19) { ?>
                    <input type="checkbox" name="Te" value="19" /><?php echo $a['nombre_plato'];  ?>
             <?php }?>
              <?php }}  ?>
                    <br>
                </div>
                  
                  <div class="formItem">
                            <label>Ingrese Cantidad de Pedido:</label>
                            <input type="number" min="1" max="500" name="cPedido" id="nPaginas"/>
                            <br> 
                        </div>
                 <div class="tipoPago">
                    <label>Tipo de pago:</label>
                    <input type="radio" name="pago" value="2"/>Efectivo
                    <input type="radio" name="pago" value="1" id="pagos"/>tarjeta de credito
                </div>
                  
                  <div class="botones">
                    <input class="btn" type="submit" value="Añadir pedido" style="padding: 5px 35px; margin-right: 5px;"/>
                    <input class="btn"type="reset" name="limpieza" value="Cancelar" style="padding: 5px 27px;"/>
               </div>  
                  <br>
                  <br>
              </form>
               <?php  } } ?>
          </div>
          <div class="formularios">
               <form name="formCon" method="POST" action="index.php?c=pedido&a=guardarP&id=<?php 
                      echo $res['cedula'] ?>">
          <table style="border:2px solid black">
                     
                            <thead style="border:2px solid black">
                            <tr style="border:2px solid black">
                                <th style="border:2px solid black; padding-left: 30px;padding-right: 30px">cantidad</th>
                                <th style="border:2px solid black;padding-left: 30px;padding-right: 30px">Pedido</th>
                                <th style="border:2px solid black;padding-left: 30px;padding-right: 30px">Tipo</th>
                            </tr>
                            </thead>
                    
                            <tbody>
               
      
        <tr>
            

            <?php if(isset($_SESSION['cantidad'])) { ?>          
            <td style="border:2px solid black; padding-left: 30px;padding-right: 30px">  <?php echo $_SESSION['cantidad'];  ?>   </td>
            <td style="border:2px solid black; padding-left: 30px;padding-right: 30px">  <?php  if(isset($_SESSION['nameP'])){ ?> <?php  echo $_SESSION['nameP'];?>  <?php  } ?>  </td>
            <td style="border:2px solid black; padding-left: 30px;padding-right: 30px"> <?php  echo $_SESSION['nameT'];  ?> </td>
            <?php } ?>
        </tr>
    </tbody> 
                        </table>
                    <div class="botones">
                    <input class="btn" type="submit" value="Editar Pedido" style="padding: 5px 35px; margin-right: 5px;"/>
                    <input class="btn"type="reset" name="limpieza" value="Cancelar" style="padding: 5px 27px;"/>
               </div>     
               </form>
          </div>
      </div>
  </body>