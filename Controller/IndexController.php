<?php
require_once 'configuraciones/configurar.php';
class IndexController {
    public function __construct() {
        
    }
    public function inicio(){
        require_once HEADER; 
        require_once SLIDER;
        require_once FOOTER;
    }

    public function estatica(){
        $pagina = $_REQUEST['p']; 
        require_once HEADER; 
        require_once 'View/Estaticas/'.$pagina.".php";
        require_once FOOTER; 
    }
}
