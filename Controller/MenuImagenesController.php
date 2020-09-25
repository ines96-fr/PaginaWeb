<?php
require_once 'configuraciones/configurar.php';
require_once 'Model/DAO/TipoMenuDAO.php';
require_once 'Model/DTO/MenuDTO.php';
require_once 'Model/Conexion.php';
require_once 'Model/DAO/MenuDAO.php';

class MenuImagenesController {
    private $menuDAO;
    public function __construct(){
        $this->menuDAO=new MenuDAO; 
    }
    
    public function mostrar(){
        $TipoMenuDAO= new TipoMenuDAO(); 
        require_once HEADER; 
        $tipos=$TipoMenuDAO->llenarMenu(); 
        if (isset($_REQUEST['id']) && !empty($_REQUEST['id'])){
            $datos=$this->menuDAO->consultar($_REQUEST['id']);
        }
        require_once 'View/MenuImagenes/MenuImagenes.php';
        require_once FOOTER; 
    }
    
    public function insertar(){
        $menu= new MenuDTO();
        $res=0;
        
        if(empty($_POST['plato'])|| empty($_POST['menu'])|| empty($_POST['precio_plato'])
                ||file_get_contents($_FILES['imagen']['tmp_name'])){
                $_SESSION['mensaje']= 'Debe llenar todos los campos'; 
                header('Location:index.php?c=menuImagenes&a=mostrar');
        }
        
        $menu->setNombre_plato($_POST['plato']);
        $menu->setTipo_menu($_POST['menu']); 
        $menu->setPrecio_plato($_POST['precio_plato']); 
        $menu->setImagen_plato(file_get_contents($_FILES['imagen']['tmp_name']));

        if($_FILES['imagen']['size'] <= 3000000){
            if($_FILES['imagen']['type'] == 'image/jpg' || $_FILES['imagen']['type'] == 'image/jpeg'
               || $_FILES['imagen']['type'] == 'image/png'){
                    $res=$this->menuDAO->insertarPlato($menu);
            }             
            else{
               $_SESSION['mensaje']= 'Solo puede subir imagenes jpg, jpeg, png'; 
            }
        }
        else{
            $_SESSION['mensaje']='Solo puede subir imagenes que pesen 3mb';
        }

        if($res>0){
            $_SESSION['mensaje']="Los Campos se han Guardado Correctamente"; 
        }else{
            $_SESSION['mensaje']="Los Campos no se han Guardado Correctamente"; 
        }
    }
    public function mostrarEnvueltos(){
       require_once HEADER;
       $platos = $this->menuDAO->presentar(1); 
       require_once 'View/MenuImagenes/menuEnvueltos.php';
       require_once FOOTER;
    }
    
    public function mostrarDesayuno(){
       require_once HEADER;
       $platos = $this->menuDAO->presentar(2); 
       require_once 'View/MenuImagenes/menuDesayuno.php';
       require_once FOOTER;
    }

    public function mostrarPlatosalaCarta(){
       require_once HEADER;
       $platos = $this->menuDAO->presentar(3); 
       require_once 'View/MenuImagenes/menuPlatosalaCarta.php';
       require_once FOOTER;
    }
    
    public function mostrarBebidas(){
       require_once HEADER;
       $platos = $this->menuDAO->presentar(4); 
       require_once 'View/MenuImagenes/menuBebidas.php';
       require_once FOOTER;
    }
    
    public function editar(){
        $TipoMenuDAO= new TipoMenuDAO();
        $tipos=$TipoMenuDAO->llenarMenu(); 
        $menu= new MenuDTO();
        $res=0;
        $menu->setNombre_plato($_POST['plato']);
        $menu->setTipo_menu($_POST['menu']); 
        $menu->setPrecio_plato($_POST['precio_plato']); 
        $menu->setId_menuimagen($_REQUEST['id']);
        $res=$this->menuDAO->editarPlato($menu); 
        
        foreach ($tipos as $t){
            if($_POST['menu']==$t['id_tipomenu']){
                $men=  str_replace(' ','',$t['descripcion']);
                echo $men;
            }            
        }
        header('Location:index.php?c=menuImagenes&a=mostrar'.$men);
    }
    
    public function eliminar(){

        if(!isset($_REQUEST['id'])){
//            header('Location:index.php?c=index.php&a=inicio'); 
        }
        $res=$this->menuDAO->eliminar($_REQUEST['id']);
        echo $_REQUEST['menu'];
//        $TipoMenuDAO= new TipoMenuDAO();
//        $tipos=$TipoMenuDAO->llenarMenu();
//        foreach ($tipos as $t){
//            if($_REQUEST['menu']==$t['id_tipomenu']){
//                $men=  str_replace(' ','',$t['descripcion']);
//                echo $men;
//            }            
//        }
//        header('Location:index.php?c=menuImagenes&a=mostrar'.$men);
    }
    
}
