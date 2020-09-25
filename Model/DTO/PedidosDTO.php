<?php

class PedidosDTO {
    private $cedula;
    private $nombre;
    private $apellido;
    private $direccion_entrega;
    private $fecha_entrega;
    private $cantidad;
    private $descripcion;
    private $precio;
    private $estado_pedido; 
    private $id_factura; 
    
    function getId_factura() {
        return $this->id_factura;
    }

    function setId_factura($id_factura) {
        $this->id_factura = $id_factura;
    }

    function getCedula() {
        return $this->cedula;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellido() {
        return $this->apellido;
    }

    function getDireccion_entrega() {
        return $this->direccion_entrega;
    }

    function getFecha_entrega() {
        return $this->fecha_entrega;
    }

    function getCantidad() {
        return $this->cantidad;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getPrecio() {
        return $this->precio;
    }

    function getEstado_pedido() {
        return $this->estado_pedido;
    }

    function setCedula($cedula) {
        $this->cedula = $cedula;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    function setDireccion_entrega($direccion_entrega) {
        $this->direccion_entrega = $direccion_entrega;
    }

    function setFecha_entrega($fecha_entrega) {
        $this->fecha_entrega = $fecha_entrega;
    }

    function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setPrecio($precio) {
        $this->precio = $precio;
    }

    function setEstado_pedido($estado_pedido) {
        $this->estado_pedido = $estado_pedido;
    }


    
    
    
}
