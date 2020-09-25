<?php
require_once 'Model/Conexion.php';
class TipoMenuDAO {
    private $conexion;
    public function __construct() {
        $this->conexion= Conexion::getConexion(); 
    }
    public function llenarMenu(){
        $sql='select * from tipo_menu';
        
        try{
            $sen= $this->conexion->prepare($sql);
            $par=array();
            $sen->execute($par); 
            $res= $sen->fetchAll(PDO::FETCH_ASSOC); 
            return $res; 
        } catch (Exception $ex) {
            echo $ex->getMessage(); 
        }
        finally {
            $this->conexion=null; 
        }
        

    }
}
