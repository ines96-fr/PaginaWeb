<?php
require_once 'configuraciones/configurar.php';
require_once 'Model/DAO/InicioDAO.php';
require_once 'Model/Conexion.php';

class InicioSesionController {
   private $inicioDAO; 
   public function __construct(){
      $this->inicioDAO = new inicioDAO();
   }
    public function iniciar(){
        require_once 'View/Estaticas/InicioSesion.php';
    }
    public function autenticacion(){
        $bandera=0; 
        if(isset($_POST['user']) && isset($_POST['clave'])){
            $resp = $this->inicioDAO->autenticar();
            foreach($resp as $verificar){
                echo '</br>'.$verificar['password']; 
                if($verificar['usuario'] == $_POST['user'] && md5($_POST['clave'])==$verificar['password']){
                    session_start(); 
                    $_SESSION['usuario']= $verificar['nombre']." ".$verificar['apellido'];
                    $_SESSION['user'] = $verificar['usuario'];
                    $_SESSION['rol']=$verificar['id_perfil'];                
                    header('LOCATION: index.php?c=index&a=inicio');
                    $bandera=1; 
                }                
            }
            if ($bandera==0){
                header('LOCATION: index.php?c=inicioSesion&a=iniciar'); 
            }
        }
    }
    public function cerrar(){
        session_start();
        unset($_SESSION['usuario']);
        unset($_SESSION['rol']);
        header("location:index.php?c=index&a=inicio");
    }
}
