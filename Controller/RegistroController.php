<?php
require_once 'configuraciones/configurar.php';
require_once 'Model/Conexion.php';
require_once 'Model/DAO/RegistroUsuarioDAO.php';
require_once 'Model/DTO/registroUsuario.php';

class RegistroController {
    private $registroDAO; 
    public function __construct(){
        $this->registroDAO=new RegistroUsuarioDAO;
    }
    
    public function mostrar(){
        require_once HEADER;
        require_once 'View/Dinamicas/RegistroUsuario.php';
        require_once FOOTER; 
    }
    public function guardar(){
        $ru=new RegistroUsuario();
        $ru->setCedula($_POST['cedula']); 
        $ru->setNombre($_POST['nombres']); 
        $ru->setApellido($_POST['apellido']); 
        $ru->setEmail($_POST['correo']);
        $ru->setFecha_na($_POST['fechaN']); 
        $ru->setUsuario($_POST['usuario']); 
        $ru->setContrasena($_POST['password']);        
        $ru->setId_sexo($_POST['sexo']);
        $ru->setId_perfil("cli"); 

        $res = $this->registroDAO->insertar($ru); 
        header('Location:index.php?c=Registro&a=mostrar'); 
    }
}
