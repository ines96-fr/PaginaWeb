<?php

class RegistroUsuarioDAO {
    private $conexion; 
    public function __construct(){
        $this->conexion=  Conexion::getConexion(); 
    }
    
    public function insertar(RegistroUsuario $ru){
        $sql= "insert into usuario"
              ."(cedula, nombre, apellido, email, fecha_nacimiento, usuario, password,"
              . " id_sexo, id_perfil)values(?,?,?,?,?,?,?,?,?)"; 
        try{
            $sen = $this->conexion->prepare($sql);
            $parametros=array($ru->getCedula(),$ru->getNombre(), $ru->getApellido(),
                              $ru->getEmail(), $ru->getFecha_na(), 
                              $ru->getUsuario(), md5($ru->getContrasena()),
                              $ru->getId_sexo(), $ru->getId_perfil());
            $sen->execute($parametros); 
            return $sen->rowCount();  
        } catch (Exception $ex) {
            echo $ex->getMessage();  
        }
        finally {
            $this->conexion=null; 
        } 
    }
}
