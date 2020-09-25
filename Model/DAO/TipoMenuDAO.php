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
    
    public function llenarPlatos($tipo_menu){
        $sql='select id_menu_imagen, nombre, precio_plato from menu_imagen where tipo_menu=?'; 
        try{
            $sen=$this->conexion->prepare($sql);
            $par=array($tipo_menu);
            $sen->execute($par); 
            $res=$sen->fetchAll(PDO::FETCH_ASSOC); 
            return $res; 
        } catch (Exception $ex) {
             echo $ex->getMessage();
        }
    }
    
    public function precio($tipo_plato){
        $sql='select precio_plato from menu_imagen where id_menu_imagen=?'; 
        try{
            $sen=$this->conexion->prepare($sql);
            $par=array($tipo_plato);
            $sen->execute($par); 
            $res=$sen->fetchAll(PDO::FETCH_ASSOC); 
            return $res; 
        } catch (Exception $ex) {
             echo $ex->getMessage();
        }
    }
}
