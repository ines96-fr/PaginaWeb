<?php
class MenuDAO {
    private $conexion;
    public function __construct() {
        $this->conexion=  Conexion::getConexion();
    }
    
    public function insertarPlato(MenuDTO $plato){
        $sql = 'insert into menu_imagen(nombre, imagen, tipo_menu, precio_plato)'
                . 'values (?,?,?,?)';
        try{
            $sen = $this->conexion->prepare($sql);
            $par = array($plato->getNombre_plato(),
                         $plato->getImagen_plato(),
                         $plato->getTipo_menu(),
                         $plato->getPrecio_plato()
                    );
            $sen->execute($par);
            return $sen->rowCount();
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        finally{
            $this->conexion=null; 
        }
    }
    public function presentar($tipo_menu){
        $sql='select * from menu_imagen where tipo_menu = ?';
        try{
            $sen=$this->conexion->prepare($sql);
            $par= array($tipo_menu); 
            $sen->execute($par);
            $res=$sen->fetchAll(PDO::FETCH_ASSOC);
            return $res; 
        } catch (Exception $ex) {
            echo $ex->getMessage(); 
        }
        finally{
            $this->conexion=null; 
        }
    }
    
    public function editarPlato(MenuDTO $plato){
        $sql = 'update menu_imagen '
                . 'set nombre=?, tipo_menu=?, '
                . 'precio_plato=? where id_menu_imagen=?';
        try{
            $sen = $this->conexion->prepare($sql);
            $par = array($plato->getNombre_plato(),
                         $plato->getTipo_menu(),
                         $plato->getPrecio_plato(),
                         $plato->getId_menuimagen()
                    );
           
            $sen->execute($par);
            $res=$sen->rowCount();
            return $res; 
        } catch (Exception $ex) {
            echo $ex->getMessage(); 
        }
        finally{
            $this->conexion=null; 
        }
    }
    
    public function consultar($id){

        $sql = "select * from menu_imagen where id_menu_imagen=?";
        try{
            $sen=$this->conexion->prepare($sql);
            $par=array($id); 
            $sen->execute($par);
            $res=$sen->fetch(PDO::FETCH_ASSOC);
            return $res; 
        } catch (Exception $ex) {
            echo $ex->getMessage(); 
        }finally{
            $this->conexion=null;
        }
    }
    
    public function eliminar($id){
        $sql='delete from menu_imagen where id_menu_imagen=? ';
        try{
            $sen=$this->conexion->prepare($sql);
            $par=array($id);
            $sen->execute($par);
            $res=$sen->rowCount(); 
            return $res;
        } catch (Exception $ex) {
            echo $ex->getMessage(); 
        }
        finally {
            $this->conexion=null; 
        }   
    }
}
