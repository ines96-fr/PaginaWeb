<?php
class InicioDAO {
    private $conexion; 
    
    public function __construct() {
        $this->conexion= Conexion::getConexion();
    }
    public function autenticar(){
        
        $sql='select * from usuario';
        try{
           $sen=$this->conexion->prepare($sql); 
           $par=array(); 
           $sen->execute($par);
           $res= $sen->fetchAll(PDO::FETCH_ASSOC); 
           return $res;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }finally{
            $this->conexion=null; 
        }
    }
}
