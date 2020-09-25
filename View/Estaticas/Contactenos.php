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
    <script type="text/javascript" src="validaciones/validacion_contactenos.js"></script>
    <style>

        .contactos{
            width: 25%;
            background: whitesmoke;
            border: 1px solid whitesmoke;
            position: absolute;
            top: 70%;
            right:5%;
            border-radius: 10px;
            box-shadow: 5px 5px 10px gray;
        }
        .datosContactenos{
            margin: 5px;
            padding: 0;
        }
        .informacion{
            max-width: 70%;
            padding:15px;
        }
        .imagenes{
            padding-top: 30px;
        }
        .formularios{
            padding: 15px;
            background: green;
            margin-bottom: 10px;
            margin-top: 10px;
        }
        .cajas{
            margin: 0 auto;
        }
        
        .texto{
            padding: 10px 208px 10px 5px;
            border-radius: 10px;
            border: 1px solid white;
            background: white;
            margin: 5px;
            color: #999;
        }
        textarea{
           margin: 5px;
           border-radius: 10px;
           border: 1px solid white;
           background: white;
           color: #999;
        }
        @font-face{
            font-family: "Brusher";
            src: url(asset/fuentes/Brusher.ttf);
        }
        
        .titulo{
            font-family: "Brusher";
            text-align: center;
            color:white;
            font-size: 60px;
        }
        .boton{
            text-align: center;
        }
        .btn{
            padding: 10px 50px; 
            border-radius: 10px;
            color: green; 
            background: white;
            font-weight: bold;
        }
        .btn:hover{
            background: limegreen;
            color:white; 
        }
    </style>
    
  </head>
  <body>        
      <div class="mapa">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1409.8212993341642!2d-80.01158660069275!3d-1.9206682256431824!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x902d0731e0beaa85%3A0x81ddf244a0a02bb5!2sEnvueltos.ec!5e0!3m2!1ses-419!2sec!4v1576009868028!5m2!1ses-419!2sec" 
        width="100%" height="550" frameborder="0" style="border:0;" ></iframe>
      </div>
      <div class="container contactos">
          <div class="row datos">
              <div class="col imagenes" style="max-width: 15%;">
                <img src="asset/Imagenes/ubicacion.png" width="40px">
              </div>
              <div class="col informacion">
                <h4><b>Dirección</b></h4>
                <p>Av.Río Amazonas y Camilo Ponce <br/><span>(A lado del Parque) - Nobol</span> </p>                  
              </div>

          </div>
          <div class="row datosContactenos">
              <div class="col imagenes" style="max-width: 15%;">
                <img src="asset/Imagenes/telefono.png" width="35px">
              </div>
              <div class="col informacion">
                <h4><b>Contáctenos</b></h4>
                <p><b>Télefono:</b>(04) 2708-42 <br/><b>Celular:</b>(+593) 994874078</p>                  
              </div>
          </div>
          <div class="row datos">
             <div class="col imagenes" style="max-width: 15%;">
                <img src="asset/Imagenes/horario.png" width="40px">
             </div>
              <div class="col informacion">
                 <h4><b>Horarios</b></h4>
                 <p>Lun. - Vie.: 07:00-11:30 <br/><span>Sáb - Dom - Feriados: 07:00 - 17:00</span></p> 
              </div>
          </div>
      </div>
      <div class="container-fluid">
          <div class="row formularios">
              <form name="formCon" class="cajas" method="GET" onsubmit="return validar_contactos()"  >
                <div class="titulo">
                  <p>Contactese <br/> con Nosotros</p> 
                </div>
                  <div class="formItem">
                      <input class="texto" type="text" name="nombre" id="nombres" value="nombre completo" onfocus="vaciar(this)" onblur="llenar(this, 'nombre completo')"/>
                      <input  class="texto" type="text" name="tel" id="telefonos" value="telefono" onfocus="vaciar(this)" onblur="llenar(this, 'telefono')"/>
                  </div>
                  <div class="formItem">
                      <input class="texto" type="text" name="negocio" id="negocios" value="negocio" onfocus="vaciar(this)" onblur="llenar(this, 'negocio')"/>
                      <input class="texto" type="email" name="e-mail" id="e-mails" value="e-mail" onfocus="vaciar(this)" onblur="llenar(this), 'e-mail')"/>
                  </div> 
                  <div class="formItem">
                      <textarea name="mensaje" rows="10" cols="100">mensaje</textarea>
                  </div>
                  <div class="boton">
                      <input class="btn" type="submit" name="envio" value="Enviar"/>
                    <input class="btn" type="reset" name="limpieza" value="Cancelar" style="padding: 10px 35px;"/>
                  </div>                  
              </form>
          </div>
      </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>

