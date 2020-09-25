<?php
require_once 'Model/Conexion.php';
class PedidoDAO {
    private $conexion; 
    public function __construct(){
        $this->conexion=  Conexion::getConexion(); 
    }    
    
    public function GuardarCabecera(PedidosDTO $p){
        $sql='insert into cabeceraFactura(cedula, nombre, apellido, fecha_entrega, direccion_entrega)'
                . 'values(?,?,?,?,?)'; 
        try{
            $sen = $this->conexion->prepare($sql);
            $par = array($p->getCedula(),$p->getNombre(),
                    $p->getApellido(), $p->getFecha_entrega(), $p->getDireccion_entrega());
            $sen->execute($par); 
            $res= $sen->rowCount(); 
        } catch (Exception $ex) {
            echo $ex->getMessage();  
        }
        finally {
            $this->conexion=null; 
        } 
    }
    
    public function numFactura(){
        $sql='select MAX(id_factura) from cabecerafactura';
        
        try{
            $sen= $this->conexion->prepare($sql);
            $par=array();
            $sen->execute($par); 
            $res= $sen->fetch(PDO::FETCH_ASSOC); 
            return $res; 
        } catch (Exception $ex) {
            echo $ex->getMessage(); 
        }
        finally {
            $this->conexion=null; 
        }       
    }
    public function GuardarPedido(PedidosDTO $p){
        $sql='insert into detalle(num_factura, id_menu_imagen, cantidad, estado_pedido) values(?,?,?,?)';
        try{
            $sen= $this->conexion->prepare($sql);
            $par = array($p->getId_factura(),$p->getDescripcion(),
                    $p->getCantidad(),$p->getEstado_pedido());
            $sen->execute($par); 
            $res= $sen->rowCount(); 
            return $res;
        } catch (Exception $ex) {
            echo $ex->getMessage();  
        }
        finally {
            $this->conexion=null; 
        } 
    }
    public function consultarpedido($fechaN){
        try{
        $sql = "select cabecerafactura.id_factura,cabecerafactura.cedula, menu_imagen.nombre,menu_imagen.precio_plato,detalle.cantidad from "
                . "cabecerafactura join detalle on cabecerafactura.id_factura = detalle.num_factura join menu_imagen on "
                . "detalle.id_menu_imagen = menu_imagen.id_menu_imagen where cabecerafactura.fecha_entrega = ?";
        //1. prepara la sentencia
        $se = $this->conexion->prepare($sql);
        //2.parametros de la sentencia
        $par = array($fechaN);
        //3.ejecutar la sentencia
        $se->execute($par);
       //4. obtener los resultados(esta depende del tipo de sentencia que se este ejecutando)
        $res = $se->fetchALL(PDO::FETCH_ASSOC);//retorna un objeto de una clase anonima
       //5. retornar resultados
       return $res;
    } catch (Exception $ex){
         echo $ex->getMessage(); 
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
        public function consultarmenu(){
         try{
        $sql = "select * from tipo_menu ";
        //1. prepara la sentencia
        $se = $this->conexion->prepare($sql);
        //2.parametros de la sentencia
        $par = array();
        //3.ejecutar la sentencia
        $se->execute($par);
       //4. obtener los resultados(esta depende del tipo de sentencia que se este ejecutando)
        $res = $se->fetchALL(PDO::FETCH_ASSOC);//retorna un objeto de una clase anonima
       //5. retornar resultados
       return $res;
    } catch (Exception $ex){
         echo $ex->getMessage(); 
    }
    }
        public function eliminarfactura($id){
        $sql = "delete from cabecerafactura where id_factura = ? ";
       $se= $this->conexion->prepare($sql);
        //2.parametros de la sentencia
        $par = array($id);
        //3.ejecutar la sentencia
        $se->execute($par);
        //4.obtener resultados
        $res = $se->rowCount();
        //5.retornar resultados
        return $res;
    }
        public function eliminardetalle($id){
        $sql = "delete from detalle where num_factura = ? ";
       $se= $this->conexion->prepare($sql);
        //2.parametros de la sentencia
        $par = array($id);
        //3.ejecutar la sentencia
        $se->execute($par);
        //4.obtener resultados
        $res = $se->rowCount();
        //5.retornar resultados
        return $res;
    }
    
    public function facturaxId($id){
        $sql='select * from cabecerafactura where id_factura=?';
        try{
            $sen= $this->conexion->prepare($sql);
            $par=array($id);
            $sen->execute($par); 
            $res= $sen->fetch(PDO::FETCH_ASSOC); 
            return $res; 
        } catch (Exception $ex) {
            echo $ex->getMessage(); 
        }
        finally {
            $this->conexion=null; 
        }
    }
    
    public function editarCabecera(PedidosDTO $p){
        $sql = 'update cabeceraFactura '
                . 'set fecha_entrega=?, direccion_entrega=? '
                . 'where id_factura=?';
        try{
            $sen = $this->conexion->prepare($sql);
            $par = array($p->getFecha_entrega(),
                         $p->getDireccion_entrega(),
                         $p->getId_factura()
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
    
}
