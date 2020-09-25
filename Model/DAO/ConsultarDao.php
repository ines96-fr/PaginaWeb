<?php
class ConsultarDao {
     private $conexion; 
    
    public function __construct(){
        $this->conexion= Conexion::getConexion();
    }
    
    public function consultar(){
         try{
            //1. Sentencia preparada
            $sen= $this->conexion->prepare(
                    "select * from usuario");
            //2. sentencia declarar los parametros para las sentencias 
            $par= array(); 
            //3. Ejecutar la sentencia 
            $sen->execute($par); 
            //4. obtener resultados
            $res= $sen->fetchAll(PDO::FETCH_ASSOC); 
            //el metodo fetchALl siempre retorna un arreglo
            ////el parametro que recibe determina el tipo de datos del arreglo 
            //ejemplo FETCH_ASSOC retorna arreglo de datos 
            //con indices asociativos 
            //5.return resultados
            return $res; 
        } catch (Exception $ex) {
            echo $ex->getMessage(); 
        }
    }
    
    public function consultarxcedula($cedula){
        $sql = "select * from usuario where cedula = ?";
        //1. prepara la sentencia
        $se = $this->conexion->prepare($sql);
        //2.parametros de la sentencia
        $par = array($cedula);
        //3.ejecutar la sentencia
        $se->execute($par);
       //4. obtener los resultados(esta depende del tipo de sentencia que se este ejecutando)
        $res = $se->fetch(PDO::FETCH_OBJ);//retorna un objeto de una clase anonima
       //5. retornar resultados
       return $res;
    }
    
    public function consultarxperfil($cargo){
        $sql = "select * from usuario where id_perfil = ?  ";
        //1. prepara la sentencia
        $se = $this->conexion->prepare($sql);
        //2.parametros de la sentencia
        $par = array($cargo);
        //3.ejecutar la sentencia
        $se->execute($par);
       //4. obtener los resultados(esta depende del tipo de sentencia que se este ejecutando)
        $res = $se->fetch(PDO::FETCH_OBJ);//retorna un objeto de una clase anonima
       //5. retornar resultados
       return $res;
    }
    
    public function consultar_plato(){
         try{
            //1. Sentencia preparada
            $sen= $this->conexion->prepare(
                    "select * from tipo_plato");
            //2. sentencia declarar los parametros para las sentencias 
            $par= array(); 
            //3. Ejecutar la sentencia 
            $sen->execute($par); 
            //4. obtener resultados
            $res= $sen->fetchAll(PDO::FETCH_ASSOC); 
            //el metodo fetchALl siempre retorna un arreglo
            ////el parametro que recibe determina el tipo de datos del arreglo 
            //ejemplo FETCH_ASSOC retorna arreglo de datos 
            //con indices asociativos 
            //5.return resultados
            return $res; 
        } catch (Exception $ex) {
            echo $ex->getMessage(); 
        }
    }
    
    public function consultarpedido($cedula){
        try{
        $sql = "select * from pedido where cedula = ?";
        //1. prepara la sentencia
        $se = $this->conexion->prepare($sql);
        //2.parametros de la sentencia
        $par = array($cedula);
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
}
