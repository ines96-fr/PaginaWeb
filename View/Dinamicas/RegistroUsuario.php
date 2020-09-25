<!doctype html>
<html lang="es">
  <head>
    <link rel="stylesheet" href="asset/bootstrap-4.0.0-alpha.6-dist/css/bootstrap.min.css">
    <style>
        @font-face{
            font-family: "Brusher";
            src: url(asset/fuentes/Brusher.ttf);
        }
        
        body{
            background-image: url("asset/Imagenes/textura2.jpg");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100%;
            background-position: center; 
        }
        .titulo{
            margin-top: 30px;
        }
        .fondo{
            width:60%;
            margin-top: 4%; 
            background: green; 
            opacity:0.8; 
            color:white;
            margin-bottom: 20px;
        }
        h1, .sesion{
            text-align: justify; 
            padding: 20px;
            font-family: "Arial";   
        }
        
        .sesion{
            margin-top: 5px;
            font-size: 35px;
            margin-bottom: 30px;
            font-family:'Brusher';
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
      
      <div class="titulo">
          <h1 style="font-size: 50px;font-family:'Brusher'; text-align:center;">Formulario de Registro</h1>
      </div>
      <div class="container fondo">
          <form action="index.php?c=registro&a=guardar" method="POST"  style="text-align:center; padding:20px;">
                <div class="row">
                      <div class="col sesion">
                          <label>Cédula</label><br/>
                          <input type="text" name="cedula" id="cedula">
                      </div>
                      <div class="col sesion">
                          <label>Nombres</label><br/>
                          <input type="text" name="nombres" id="nombres">
                      </div>
                      <div class="col sesion">
                          <label>Apellidos</label><br/>
                          <input type="text" name="apellido" id="apellidos"/>
                      </div>                  
                  </div>  

                  <div class="sesion">
                      <label>Correo</label><br/>
                      <input type="text" name="correo" style="width:100%;" id="correo">
                  </div>
                  <div class="sesion">
                      <label>Nombre de Usuario</label><br/>
                      <input type="text" name="usuario" style="width:100%;" id="usuario">
                  </div>
                  <div class="row">
                    <div class="col sesion">
                        <label>Contraseña</label><br/>
                        <input type="password" name="password">
                    </div >
                    <div class="col sesion">
                        <label>Confirmación de contraseña</label><br/>
                        <input type="password" name="confir" id="confir">
                  </div >                  
                 </div>

                <div class="sesion">
                    <label>Fecha nacimiento:</label>
                    <input type="date" name="fechaN" id="fechaN"/>
                </div>
              <div class="row">
                <div class="col sesion sexo">
                    <label>Sexo:</label>
                    <input type="radio" name="sexo" value="1" style="width:30px;height:30px"/>Masculino         
                    <input type="radio" name="sexo" value="2" id="sexos" style="width:30px;height:30px"/>Femenino
                </div>            
             </div>
              <div>
                  <input type="submit" value="Guardar" id="ingresar" value="Crear Cuenta"/>                  
              </div>
          </form>
      </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>