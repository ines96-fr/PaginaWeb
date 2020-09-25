<?php
require_once 'configuraciones/configurar.php';
require_once 'Model/Conexion.php';
require_once 'Model/DAO/RegistroPedidoDAO.php';
require_once 'Model/DTO/RegistroPedido.php';
require_once 'Model/DAO/ConsultarDao.php';
class PedidoController {
    private $registroDAO; 
    private $consultarDao;
    public function __construct(){
        $this->registroDAO= new RegistroPedidoDAO();
        $this->consultarDao = new ConsultarDao();
    }
    public function guardarP(){
       if(!isset($_SESSION))session_start ();
       //$_SESSION['lista']=isset($_SESSION['lista'])? $_SESSION['lista'] : array();
       $pe = new RegistroPedido();
       $pe->setCedula($_SESSION['cedula']);
       $pe->setTelefono( $_SESSION['telefono']);
       $pe->setDireccion($_SESSION['direccion']);
       $pe->setTipo_plato($_SESSION['tipo']);
       $pe->setTipo_platoB($_SESSION['plato']);
       $pe->setCantidad($_SESSION['cantidad']);
       $pe->setTipo_pago($_SESSION['tipo_pago']);
       if(isset($_REQUEST['id']) && !empty($_REQUEST['id'])){
           $pe->setCedulaB($_REQUEST['id']);
           $res = $this->registroDAO->editar($pe);
       }else{
       $res = $this->registroDAO->registro_pedido($pe);
       }
        if($res>0){
            if( $_SESSION['perfil'] == 1){
            header('Location:index.php?c=index&a=inicio');
            }else{
            if( $_SESSION['perfil'] == 2){
            header('Location:index.php?c=index&a=inicio');  
              }  
            }
        
        }else{
            echo 'no se guardo en la base de datos';
        }
        unset($_SESSION['cedula'],$_SESSION['telefono'],$_SESSION['cantidad'],$_SESSION['direccion'],$_SESSION['tipo'],$_SESSION['plato'],$_SESSION['tipo_pago']);

    }
    
    public function sesiones(){
        session_start();
        $_SESSION['cedula'];
        $_SESSION['telefono'];
        $_SESSION['direccion'];
        $_SESSION['cantidad'];
        $_SESSION['plato'];
        $_SESSION['tipo'];
        $_SESSION['tipo_pago'];
        if($_POST){
            $cedula = $_POST['cedula'];
            $telefono = $_POST['telefono'];
            $direccion = $_POST['direccion'];
            $cantidad = $_POST['cPedido'];
            //$pedido = $_POST['pedido'];
            if(isset($_POST['envuelto'])){
            $tipo = $_POST['envuelto'];
            $_SESSION['nameT'] = "envuelto";
            }
             if(isset($_POST['carta'])){
            $tipo = $_POST['carta'];
            $_SESSION['nameT'] = "carta";
            }
             if(isset($_POST['desayuno'])){
            $tipo = $_POST['desayuno'];
            $_SESSION['nameT'] = "desayuno";
            }
             if(isset($_POST['bebida'])){
            $tipo = $_POST['bebida'];
            $_SESSION['nameT'] = "bebida";
            }
            
            if(isset($_POST['bollo'])){
            $plato = $_POST['bollo'];
            $_SESSION['nameP'] = "Bollo de pescado";
            }
            if(isset($_POST['huma'])){
            $plato = $_POST['huma'];
            $_SESSION['nameP'] = "Humita";
            }else
             if(isset($_POST['hayaca'])){
            $plato = $_POST['hayaca'];
            $_SESSION['nameP'] = "Hayaca";
            }
            
            if(isset($_POST['caldoG'])){
            $plato = $_POST['caldoG'];
            $_SESSION['nameP'] = "Caldo de Gallina";
            }
            if(isset($_POST['secoP'])){
            $plato = $_POST['secoP'];
            $_SESSION['nameP'] = "Seco de Pato";
            }
            if(isset($_POST['secoC'])){
            $plato = $_POST['secoC'];
            $_SESSION['nameP'] = "Seco de Chancho";
            }

            if(isset($_POST['bistecH'])){
            $plato = $_POST['bistecH'];
            $_SESSION['nameP'] = "Bistec de Higado";
            }
            if(isset($_POST['bistecP'])){
            $plato = $_POST['bistecP'];
            $_SESSION['nameP'] = "Bistec de Pescado";
            }

            if(isset($_POST['Gaseosas'])){
            $plato = $_POST['Gaseosas'];
            $_SESSION['nameP'] = "Gaseosas";
            }
            if(isset($_POST['Cafe'])){
            $plato = $_POST['Cafe'];
            $_SESSION['nameP'] = "Cafe";
            }
            if(isset($_POST['Te'])){
            $plato = $_POST['Te'];
            $_SESSION['nameP'] = "Te";
            }

            $tipo_pago = $_POST['pago'];
            //$conta = count($_SESSION['cantidad']);
            $_SESSION['cedula']=$cedula;
            $_SESSION['telefono']=$telefono;
            $_SESSION['direccion']=$direccion;
            $_SESSION['cantidad'] = $cantidad;
            $_SESSION['plato']= $plato;
            $_SESSION['tipo']=$tipo;
            $_SESSION['tipo_pago'] = $tipo_pago;
            
            $_SESSION['envuelto'] = $_POST['envuelto'];
            $_SESSION['carta'] = $_POST['carta'];
            $_SESSION['desayuno'] = $_POST['desayuno'];
            $_SESSION['bebida'] = $_POST['bebida'];
        }
         if(isset($_POST['envuelto'])){
            session_unset($_SESSION['carta']);
             session_unset($_SESSION['desayuno']);
              session_unset($_SESSION['bebida']);               
        }
        if(isset($_POST['carta'])){
            session_unset($_SESSION['envuelto']);
             session_unset($_SESSION['desayuno']);
              session_unset($_SESSION['bebida']);               
        }
         if(isset($_POST['desayuno'])){
            session_unset($_SESSION['envuelto']);
             session_unset($_SESSION['carta']);
              session_unset($_SESSION['bebida']);               
        }
         if(isset($_POST['bebida'])){
            session_unset($_SESSION['envuelto']);
             session_unset($_SESSION['desayuno']);
              session_unset($_SESSION['carta']);               
        }
        

      //$_SESSION['cantidad'] = $_POST['cPedido'];
      //echo $_SESSION['cantidad'];
      
        
       header('Location:index.php?c=cliente&a=mostrarformulario');
    }
    
    public function sesiones1(){
        session_start();
        $_SESSION['cedula'];
        $_SESSION['telefono'];
        $_SESSION['direccion'];
        $_SESSION['cantidad'];
        $_SESSION['plato'];
        $_SESSION['tipo'];
        $_SESSION['tipo_pago'];
        if($_POST){
            $cedula = $_POST['cedula'];
            $telefono = $_POST['telefono'];
            $direccion = $_POST['direccion'];
            $cantidad = $_POST['cPedido'];
            //$pedido = $_POST['pedido'];
            if(isset($_POST['envuelto'])){
            $tipo = $_POST['envuelto'];
            $_SESSION['nameT'] = "envuelto";
            }
             if(isset($_POST['carta'])){
            $tipo = $_POST['carta'];
            $_SESSION['nameT'] = "carta";
            }
             if(isset($_POST['desayuno'])){
            $tipo = $_POST['desayuno'];
            $_SESSION['nameT'] = "desayuno";
            }
             if(isset($_POST['bebida'])){
            $tipo = $_POST['bebida'];
            $_SESSION['nameT'] = "bebida";
            }
             if(isset($_POST['bollo'])){
            $plato = $_POST['bollo'];
            $_SESSION['nameP'] = "Bollo de pescado";
            }
            if(isset($_POST['huma'])){
            $plato = $_POST['huma'];
            $_SESSION['nameP'] = "Humita";
            }else
             if(isset($_POST['hayaca'])){
            $plato = $_POST['hayaca'];
            $_SESSION['nameP'] = "Hayaca";
            }
            
            if(isset($_POST['caldoG'])){
            $plato = $_POST['caldoG'];
            $_SESSION['nameP'] = "Caldo de Gallina";
            }
            if(isset($_POST['secoP'])){
            $plato = $_POST['secoP'];
            $_SESSION['nameP'] = "Seco de Pato";
            }
            if(isset($_POST['secoC'])){
            $plato = $_POST['secoC'];
            $_SESSION['nameP'] = "Seco de Chancho";
            }

            if(isset($_POST['bistecH'])){
            $plato = $_POST['bistecH'];
            $_SESSION['nameP'] = "Bistec de Higado";
            }
            if(isset($_POST['bistecP'])){
            $plato = $_POST['bistecP'];
            $_SESSION['nameP'] = "Bistec de Pescado";
            }

            if(isset($_POST['Gaseosas'])){
            $plato = $_POST['Gaseosas'];
            $_SESSION['nameP'] = "Gaseosas";
            }
            if(isset($_POST['Cafe'])){
            $plato = $_POST['Cafe'];
            $_SESSION['nameP'] = "Cafe";
            }
            if(isset($_POST['Te'])){
            $plato = $_POST['Te'];
            $_SESSION['nameP'] = "Te";
            }
            
            
            $tipo_pago = $_POST['pago'];
            $serializar = json_encode($tipo);
            $ser = json_encode($plato);
            //$conta = count($_SESSION['cantidad']);
            $_SESSION['cedula']=$cedula;
            $_SESSION['telefono']=$telefono;
            $_SESSION['direccion']=$direccion;
            $_SESSION['cantidad'] = $cantidad;
            $_SESSION['plato']= $plato;
            $_SESSION['tipo']=$tipo;
            $_SESSION['tipo_pago'] = $tipo_pago;
            
            $_SESSION['envuelto'] = $_POST['envuelto'];
            $_SESSION['carta'] = $_POST['carta'];
            $_SESSION['desayuno'] = $_POST['desayuno'];
            $_SESSION['bebida'] = $_POST['bebida'];
        }
         if(isset($_POST['envuelto'])){
            session_unset($_SESSION['carta']);
             session_unset($_SESSION['desayuno']);
              session_unset($_SESSION['bebida']);               
        }
        if(isset($_POST['carta'])){
            session_unset($_SESSION['envuelto']);
             session_unset($_SESSION['desayuno']);
              session_unset($_SESSION['bebida']);               
        }
         if(isset($_POST['desayuno'])){
            session_unset($_SESSION['envuelto']);
             session_unset($_SESSION['carta']);
              session_unset($_SESSION['bebida']);               
        }
         if(isset($_POST['bebida'])){
            session_unset($_SESSION['envuelto']);
             session_unset($_SESSION['desayuno']);
              session_unset($_SESSION['carta']);               
        }
        

      //$_SESSION['cantidad'] = $_POST['cPedido'];
      //echo $_SESSION['cantidad'];
      
        
       header('Location:index.php?c=usuario&a=formularioeditar');
    }
    
    public function consultarpedido(){
        session_start();
        require_once  HEADER;
        if(isset($_POST['cedula'])){
            $resultado = $this->consultarDao->consultarpedido($_POST['cedula']);
            $_SESSION['resultado'] = $_POST['cedula'];
        }
        $pe = $this->consultarDao->consultarmenu();
        $po = $this->consultarDao->consultar_plato();
         require_once 'View/Pedidos/EliminarPedido.php';
          require_once FOOTER;
    }
      public function consultarpedidoA(){
        session_start();
        require_once  HEADER;
        if(isset($_POST['cedula'])){
            $resultado = $this->consultarDao->consultarpedido($_POST['cedula']);
            $_SESSION['resultado'] = $_POST['cedula'];
        }
        $pe = $this->consultarDao->consultarmenu();
        $po = $this->consultarDao->consultar_plato();
         require_once 'View/Pedidos/PedidosAdministrador.php';
          require_once FOOTER;
    }
      public function consultarpedidoA2(){
        session_start();
        require_once  HEADER;
        if(isset($_POST['cedula'])){
            $resultado = $this->consultarDao->consultarpedido($_POST['cedula']);
            $_SESSION['resultado'] = $_POST['cedula'];
            $_SESSION['respuesta'] = $resultado;
        }
        $pe = $this->consultarDao->consultarmenu();
        $_SESSION['pe'] = $pe;
        $po = $this->consultarDao->consultar_plato();
        $_SESSION['po'] = $po;
         require_once 'View/Editar/EditarPedido.php';
         require_once FOOTER;
    }
    

        public function eliminar(){
        session_start();
        
       $res = $this->registroDAO->eliminarpedido($_SESSION['resultado']);
       var_dump($res);
       if($res > 0){
           echo 'Registro eliminado';
       }else{
           echo 'No se elimino';
       }
       unset($_SESSION['resultado']);
       header('Location:index.php?c=cliente&a=formularioEliminar'); 
    }
}
