<?php

class RegistroPedidoDAO {
    private $conexion; 
    public function __construct(){
        $this->conexion=  Conexion::getConexion(); 
    }
    
    public function registro_pedido(RegistroPedido $pe){
        $sql= "insert into pedido"
              ."(direccion,telefono,id_tipomenu,id_plato,"
              . "cantidad,id_pago,cedula,estado_pedido)values(?,?,?,?,?,?,?,1)"; 
        try{
            $sen = $this->conexion->prepare($sql); 
            $parametros=array($pe->getDireccion(),$pe->getTelefono(),$pe->getTipo_plato(),$pe->getTipo_platoB(),
                              $pe->getCantidad(),$pe->getTipo_pago(),$pe->getCedula());
            $sen->execute($parametros); 
            return $sen->rowCount();  
        } catch (Exception $ex) {
            echo $ex->getMessage(); 
        }
    }
    public function editar(RegistroPedido $pe){
        $sql = "update pedido "
                . "set direccion=?,telefono=?,id_tipomenu=?,id_plato=?, "
                . "cantidad=?,id_pago=?,cedula=? where cedula = ?";
                try{
            $sen = $this->conexion->prepare($sql); 
            $parametros=array($pe->getDireccion(),$pe->getTelefono(),$pe->getTipo_plato(),$pe->getTipo_platoB(),
                              $pe->getCantidad(),$pe->getTipo_pago(),$pe->getCedula(),$pe->getCedulaB());
            $sen->execute($parametros); 
            return $sen->rowCount();  
        } catch (Exception $ex) {
            echo $ex->getMessage(); 
        }
    }

        public function eliminarpedido($cedula){
        $sql = "delete from pedido where cedula = ?";
       $se= $this->conexion->prepare($sql);
        //2.parametros de la sentencia
        $par = array($cedula);
        //3.ejecutar la sentencia
        $se->execute($par);
        //4.obtener resultados
        $res = $se->rowCount();
        //5.retornar resultados
        return $res;
    }
}
