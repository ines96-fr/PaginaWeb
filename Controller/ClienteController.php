<?php
require_once 'configuraciones/configurar.php';
require_once 'Model/Conexion.php';
require_once 'Model/DAO/RegistroUsuarioDAO.php';
require_once 'Model/DTO/registroUsuario.php';
require_once 'Model/DAO/ConsultarDao.php';

class ClienteController {
    private $registroDAO; 
    private $consultarDao;
    public function __construct(){
        $this->registroDAO=new RegistroUsuarioDAO;
        $this->consultarDao = new ConsultarDao();
    }
        public function inicioC(){
        require_once HEADERC; 
        require_once SLIDER;
        require_once FOOTER;
    }
   public function mostrarFormulario(){
        require_once HEADER;
        $resultados = $this->consultarDao->consultar();
        $resul = $this->consultarDao->consultar_plato();
        require_once 'View/Pedidos/Pedidos.php';
        require_once FOOTER;
}

public function formularioEliminar(){
     require_once HEADER;
      require_once 'View/Pedidos/EliminarPedido.php';
      require_once FOOTER;
}

public function mostrar1(){
        require_once HEADERC;
        $resultados = $this->consultarDao->consultar();
        require_once 'View/Editar/PerfilUsuario.php';
        require_once FOOTER; 
    }

}
