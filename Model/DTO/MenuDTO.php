<?php
class MenuDTO {
   private $nombre_plato; 
   private $tipo_menu; 
   private $precio_plato;
   private $imagen_plato; 
   private $id_menuimagen;
   
   function __construct() {
       
   }

   function getNombre_plato() {
       return $this->nombre_plato;
   }

   function getTipo_menu() {
       return $this->tipo_menu;
   }

   function getImagen_plato() {
       return $this->imagen_plato;
   }

   function setNombre_plato($nombre_plato) {
       $this->nombre_plato = $nombre_plato;
   }

   function setTipo_menu($tipo_menu) {
       $this->tipo_menu = $tipo_menu;
   }

   function setImagen_plato($imagen_plato) {
       $this->imagen_plato = $imagen_plato;
   }
   function getPrecio_plato() {
       return $this->precio_plato;
   }

   function setPrecio_plato($precio_plato) {
       $this->precio_plato = $precio_plato;
   }
      
   function getId_menuimagen() {
       return $this->id_menuimagen;
   }

   function setId_menuimagen($id_menuimagen) {
       $this->id_menuimagen = $id_menuimagen;
   }

}
