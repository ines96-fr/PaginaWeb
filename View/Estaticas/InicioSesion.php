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
    
    <style>
        @font-face{
            font-family: "Brusher";
            src: url(asset/fuentes/Brusher.ttf);
        }
        
        body{
            background-image: url("asset/Imagenes/paseando.jpg");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100%;
            background-position: center; 
        }
        
        .fondo{
            margin: 0 auto;
            width:45%;
            margin-top: 7%; 
            background: green; 
            opacity:0.8; 
            color:white;
        }
        h1, .sesion{
            text-align: center; 
            padding: 20px;
            font-family: "brusher";
            text-shadow:5px 3px black;
        }
        
        .sesion{
            margin-top: 20px;
            font-size: 30px;
        }
        .sesion input[type="text"], .sesion input[type="password"]{
            background: green; 
            opacity:0.8; 
            color:white;
            border: 0px;
            border-bottom: 2px solid greenyellow;  
        }
        .sesion a, #ingresar{
            text-decoration: none;
            color: greenyellow;
            
        }
        
        #ingresar{
            background: white; 
            color:green;
            font-size: 20px;
            font-family: "arial";
            font-weight: bold; 
            padding: 10px 30px; 
            border-radius: 10px;
            box-shadow: 5px 5px 5px black;
            margin-bottom: 20px;
        }
    </style>
  </head>
  <body>
      <div class="container fondo" style="margin-top:30px">
          <form action="index.php?c=inicioSesion&a=autenticacion" method="POST" style="text-align:center; padding:20px;">
              <div>
                  <h1>Envueltos <br/> Cafeteria - Restaurante</h1>
              </div>
              
              <div class="sesion">
                  <label>Usuario</label><br/>
                  <input type="text" name="user">
              </div>
              <div class="sesion">
                  <label>Contraseña</label><br/>
                  <input type="password" name="clave">
              </div>
              <div class="sesion">
                  ¿No tiene una cuenta? <a href="index.php?c=registro&a=mostrar">Cree una</a>
              </div>
              <div>
                  <input type="submit" value="Iniciar Sesión" id="ingresar">              
              </div>
          </form>
      </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>