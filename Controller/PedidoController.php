<?php
require_once 'configuraciones/configurar.php';
require_once 'Model/DAO/TipoMenuDAO.php';
require_once 'Model/DAO/PedidoDAO.php';

require_once 'Model/DTO/PedidosDTO.php';
require_once 'Model/Conexion.php';
require_once 'Model/DAO/MenuDAO.php';
class PedidoController {
    private $numFactura; 
    private $pedidoDAO; 
    private $menuDAO;
    public function __construct() {
        $numFactura = new PedidoDAO();
         $this->menuDAO=new MenuDAO;
    }
    public function mostrar(){
        $TipoMenuDAO= new TipoMenuDAO();
        $numFactura = new PedidoDAO(); 
        require_once HEADER;
        $factura=$numFactura->numFactura();
        $tipos=$TipoMenuDAO->llenarMenu();
        require_once 'View/Pedidos/CrearPedidos.php';
        require_once FOOTER; 
    }
        public function mostrarFormulario(){
        require_once HEADER;
        require_once 'View/Pedidos/PedidosAdministrador.php';
        require_once FOOTER;
}
     public function consultarpedidoA(){
        session_start();
        $numFactura = new PedidoDAO(); 
        require_once  HEADER;
        if(isset($_POST['fechaN'])){
            $resultado = $numFactura->consultarpedido($_POST['fechaN']);
            $_SESSION['resultado'] = $_POST['fechaN'];
        }
         require_once 'View/Pedidos/PedidosAdministrador.php';
         require_once FOOTER;
    }
        public function eliminar(){
        $numFactura = new PedidoDAO(); 
        $res = $numFactura->eliminardetalle($_GET['id']);
        $respuetsa = $numFactura->eliminarfactura($_GET['id']);
        var_dump($res);
        if($res>0){
            $_SESSION['mensaje']="Se ha eliminado"; 
        }else{
            $_SESSION['mensaje']="No se pudo eliminar"; 
        }
        header('Location:index.php?c=index&a=inicio');
    }

    
    public function menuPlatos(){
        $tipoMenuDAO= new TipoMenuDAO();
        if(isset($_REQUEST['tipoMenu']) || !empty($_REQUEST['tipoMenu'])){
            $tipoPlatos=$tipoMenuDAO->llenarPlatos($_REQUEST['tipoMenu']); 
            echo json_encode($tipoPlatos);
        }else{
            $precioPlatos=$tipoMenuDAO->precio($_REQUEST['tipoPlato']); 
            echo json_encode($precioPlatos);
        }
    }
    
    public function guardarPedido(){
        $pedidosDTO= new PedidosDTO(); 
        $pedidosDTO->setCedula($_REQUEST['cedula']);
        $pedidosDTO->setNombre($_REQUEST['nombre']);
        $pedidosDTO->setApellido($_REQUEST['apellido']);
        $pedidosDTO->setFecha_entrega($_REQUEST['fechae']);
        $pedidosDTO->setDireccion_entrega($_REQUEST['direccion']);
        $pedidosDTO->setDescripcion($_REQUEST['tipoPlato']);
        $pedidosDTO->setCantidad($_REQUEST['cantidad']);
        $pedidosDTO->setId_factura($_REQUEST['numeroFactura']);
        $pedidosDTO->setEstado_pedido(1); 
               
        $this->pedidoDAO = new PedidoDAO(); 
        $this->pedidoDAO->GuardarCabecera($pedidosDTO);
        $this->pedidoDAO = new PedidoDAO(); 
        $this->pedidoDAO->GuardarPedido($pedidosDTO);
        header('Location:index.php?c=pedido&a=mostrar');
    }
    
    public function editarPedido(){
        echo 'no entre';
        $pedidosDTO= new PedidosDTO(); 
        $pedidosDTO->setFecha_entrega($_REQUEST['fechae']);
        $pedidosDTO->setDireccion_entrega($_REQUEST['direccion']);
        $pedidosDTO->setId_factura($_REQUEST['numeroFactura']);
               
        $this->pedidoDAO = new PedidoDAO(); 
        $this->pedidoDAO->EditarCabecera($pedidosDTO);
        header('Location:index.php?c=index&a=inicio');
    }
    
    public function mostrarModificar(){
        $TipoMenuDAO= new TipoMenuDAO();
        $numFactura = new PedidoDAO(); 
        require_once HEADER;

        $tipos=$TipoMenuDAO->llenarMenu();
        $factura=$numFactura->facturaxId($_REQUEST['id']);
        
        require_once 'View/Pedidos/EditarPedidos.php';
        require_once FOOTER; 
    }
}
