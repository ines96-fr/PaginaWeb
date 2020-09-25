<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="asset/CSS/estilos.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="asset/bootstrap-4.0.0-alpha.6-dist/css/bootstrap.min.css">
    <title>Envueltos</title>
    <link rel="shortcut icon" href="asset/Imagenes/logo.jpg"/>
  </head>
  <body>
      <div class="container-fluid header">
          <div class="row">
              <div class="col cabecera">
                    <span>Lun - Vie: 7:00 - 11:30 / Sáb - Dom - Feriados: 7:00 - 17:00</span>
              </div>  
                <?php 
                if(!isset($_SESSION)){
                    session_start();
                }
                    if(isset($_SESSION['usuario'])){
                        echo "<div class='col cabecera'>"
                            . "<span style='margin-left:30%;'> Bienvenido ". $_SESSION['usuario']."</span>"
                            ."</div>"; 
                ?>              
              <div class="col cabecera">
                    <a id="sesion" style='margin-left: 60%; ' href="index.php?c=inicioSesion&a=cerrar">Cerrar Sesion</a>
                <?php   
                    }else {  
                ?>
                <div class="col cabecera">
                    <a id="sesion" href="index.php?c=inicioSesion&a=iniciar">Iniciar Sesión</a>
                <?php }  ?>
              </div>  
          </div>
      </div>
      <div class="container-fluid nav">
          <div class="row menu">
            <div id="logo"><a href="index.php"><img src="asset/Imagenes/logo.jpg" alt="Logo de envueltos" 
                            width=100% height="300"></a></div>
                <ul>
                    <li ><a href="index.php">Inicio</a></li>  
                    <li>
                        <a href="index.php">Nosotros</a>
                        <ul class="submenu" id="nosotros">
                            <li><a href="index.php?c=index&a=estatica&p=NuestraHistoria">Historia</a></li>
                            <li><a href="index.php?c=index&a=estatica&p=GaleriaFotos">Galería de Imágenes</a></li>
                        </ul>  
                    </li> 
                    <li>
                        <a href="index.php">Menú</a>
                        <ul class="submenu" id="bmenu">
                            <?php
                            if(isset($_SESSION['rol'])){
                                if($_SESSION['rol']=='adm'){
                            ?>
                               <li><a href="index.php?c=menuimagenes&a=mostrar">Agregar Platos</a></li>                            
                            <?php
                                }
                            }
                            ?>                             
                            <li><a href="index.php?c=menuImagenes&a=mostrarEnvueltos">Envueltos</a></li>
                            <li><a href="index.php?c=menuImagenes&a=mostrarDesayuno">Desayunos</a></li>
                            <li><a href="index.php?c=menuImagenes&a=mostrarPlatosalaCarta">Platos a la Carta</a></li>
                            <li><a href="index.php?c=menuImagenes&a=mostrarBebidas">Bebidas</a></li>
                        </ul>                    
                    </li>  
                    <li>
                        <a href="index.php">Servicios</a>
                        <ul class="submenu" id="servicio">
                            <li><a href="index.php?c=inicioSesion&a=iniciar">Pedido a Domicilio</a>
                                <ul class="bservicio">
                                    <?php
                                    if(isset($_SESSION['rol'])){
                                        if($_SESSION['rol']=='adm'){
                                    ?>
                                        <li><a href="index.php?c=pedido&a=mostrar">Crear Pedido</a></li>
                                        <li><a href="index.php?c=pedido&a=mostrarformulario">Consultar Pedido</a></li>
                                    <?php
                                        } else if($_SESSION['rol']=='cli'){                                  
                                    ?>
                                        <li><a href="index.php?c=pedido&a=mostrar">Crear Pedido</a></li>
                                        <li><a href="index.php?c=pedido&a=mostrarformulario">Consultar Pedido</a></li>

                                    <?php
                                        }
                                    }
                                    ?>                                    
                                </ul> 
                            </li>
                        </ul> 
                    </li>   
                    <li><a href="index.php?c=index&a=estatica&p=Contactenos">Contáctenos</a></li>                       
                </ul>             
          </div>
      </div>
            
      
     



