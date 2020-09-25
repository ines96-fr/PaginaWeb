<?php
require_once 'configuraciones/configurar.php';
require_once 'Model/Conexion.php';
require_once 'Model/DAO/RegistroUsuarioDAO.php';
require_once 'Model/DTO/registroUsuario.php';
require_once 'Model/DAO/ConsultarDao.php';
class UsuarioController {
    private $registroDAO; 
    private $consultarDao;
    public function __construct(){
        $this->registroDAO=new RegistroUsuarioDAO;
        $this->consultarDao = new ConsultarDao();
    }
        public function inicio(){
            session_start();
        if(isset($_SESSION['resultado'])){
            unset($_SESSION['resultado']);
        }
        require_once HEADER; 
        require_once SLIDER;
        require_once FOOTER;
    }
     public function mostrarFormularioA(){
        require_once HEADER;
        $resultados = $this->consultarDao->consultar();
        $resul = $this->consultarDao->consultar_plato();
        $resultado = $this->consultarDao->consultarmenu();
        require_once 'View/Pedidos/PedidosAdministrador.php';
        require_once FOOTER;
}
     public function formularioeditar(){
         session_start();
        require_once HEADER;
        $resultados = $this->consultarDao->consultar();
        $resul = $this->consultarDao->consultar_plato();
        $resultado = $this->consultarDao->consultarmenu();
        require_once 'View/editar/editarpedido.php';
        require_once FOOTER;
}
   public function mostrarFormulario(){
        require_once HEADER;
        $resultados = $this->consultarDao->consultar();
        $resul = $this->consultarDao->consultar_plato();
        require_once 'View/Pedidos/Pedidos.php';
        require_once FOOTER;
}
    
}
