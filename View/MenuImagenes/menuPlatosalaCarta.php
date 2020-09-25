<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="asset/CSS/estilos.css">
    <link rel="stylesheet" href="asset/CSS/estilosMenu.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="asset/bootstrap-4.0.0-alpha.6-dist/css/bootstrap.min.css">
    <title>Envueltos</title>
    <link rel="shortcut icon" href="asset/Imagenes/logo.jpg"/>
    <script src="asset/js/imagenes.js"></script>
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
        h2{
            text-align: center;
            font-family: "brusher";
            font-size: 50px;
        }
        .bebidas{
            width: 30%;
            padding: 20px;
            margin: 10px;
            background: white;
            opacity: 0.95;
            border-radius:10px;
            border: 1px solid white;
        }
        #btn{
            margin-top: 0px ; 
            background: green; 
            color: white;
            padding: 7px 30px;
            border:none;
            border-radius: 5px;
            font-weight: bold;   
        }
        #btn:hover{
            background: limegreen; 
        }
        .botones{
            margin-top: 10px;
            display: inline-block;
        }             
        .fondo{
            background: url(asset/Imagenes/textura.jpg) no-repeat fixed;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100%;
            padding: 30px;
            margin-bottom: 10px;
        }
    </style>
    
  </head>
  <body>
      <div class="fondo">
          <div>
              <h1 style="text-shadow:5px 3px black;">Menu Platos a la Carta</h1>
          </div>
          <div class="container-fluid galeria">
            <div class="row">
              <?php foreach($platos as $p){?>
                  <div class="col bebidas" onmouseover="color(this)" onmouseout="quitar()">
                      <h2 style="color: green;"><?php echo $p['nombre'] ?></h2>
                      <img width="420" height="200" src="data:image/jpg;base64,<?php echo base64_encode($p['imagen']); ?>"/>
                  <?php 
                       if(isset($_SESSION['rol'])=='adm'){
                  ?>
                      <div class="botones">
<!--                          <input type="hidden" name="menu" value="<?php echo $p['tipo_menu'];?>" />-->
                          <a id="btn"  href="index.php?c=MenuImagenes&a=eliminar&id=<?php echo $p['id_menu_imagen'];?>&menu= 
                              <?php echo $p['tipo_menu'];?>">Eliminar</a> 
                      </div>
                      <div  class="botones">
                          <a id="btn"  href="index.php?c=MenuImagenes&a=mostrar&id=<?php echo $p['id_menu_imagen'];?>">Modificar</a> 
                      </div> 
                   <?php }?>
                  </div>
              <?php } ?>   
            </div>
          </div>
          </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
