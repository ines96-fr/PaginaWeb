<?php

class frontController {
    public function __construct() {
    }
    
    public function control(){
        $controller = (isset($_REQUEST['c'])? $_REQUEST['c']: 'index');
        $action = (isset($_REQUEST['a'])? $_REQUEST['a']: 'inicio');
        $controller = strtolower($controller);
        $controller = ucwords($controller)."Controller"; 
        require_once 'controller/'.$controller .".php";
        $controller = new $controller(); 
        $controller->$action(); 
    }   
}
