<?php
class RegistroUsuario {
    private $cedula; 
    private $nombre;
    private $apellido; 
    private $email; 
    private $contrasena;
    private $usuario;
    private $fecha_na; 
    private $id_sexo; 
    private $id_perfil;
    
    public function __construt(){
        
    }
    function getCedula() {
        return $this->cedula;
    }

    function setCedula($cedula) {
        $this->cedula = $cedula;
    }

        function getNombre() {
        return $this->nombre;
    }

    function getApellido() {
        return $this->apellido;
    }

    function getEmail() {
        return $this->email;
    }

    function getContrasena() {
        return $this->contrasena;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function getFecha_na() {
        return $this->fecha_na;
    }

    function getId_sexo() {
        return $this->id_sexo;
    }

    function getId_perfil() {
        return $this->id_perfil;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setContrasena($contrasena) {
        $this->contrasena = $contrasena;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    function setFecha_na($fecha_na) {
        $this->fecha_na = $fecha_na;
    }

    function setId_sexo($id_sexo) {
        $this->id_sexo = $id_sexo;
    }

    function setId_perfil($id_perfil) {
        $this->id_perfil = $id_perfil;
    }


}
