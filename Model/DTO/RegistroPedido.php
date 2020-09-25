<?php
class RegistroPedido {
    private $direccion;
    private $telefono;
    private $tipo_plato;
    private $tipo_platoP;
    private $tipo_platoD;
    private $tipo_platoB;
    private $descripcion;
    private $tipo_pago;
    private $numero_tarjeta;
    private $cantidad;
    private $unitario;
    private $pedido;
    private $cedula;
    private $cedulaB;
    public function __construct(){  
}
function getDireccion() {
    return $this->direccion;
}

function getTelefono() {
    return $this->telefono;
}

function getTipo_plato() {
    return $this->tipo_plato;
}

function getDescripcion() {
    return $this->descripcion;
}

function getTipo_pago() {
    return $this->tipo_pago;
}

function getNumero_tarjeta() {
    return $this->numero_tarjeta;
}

function getCantidad() {
    return $this->cantidad;
}

function getUnitario() {
    return $this->unitario;
}

function getPedido() {
    return $this->pedido;
}

function setDireccion($direccion) {
    $this->direccion = $direccion;
}

function setTelefono($telefono) {
    $this->telefono = $telefono;
}

function setTipo_plato($tipo_plato) {
    $this->tipo_plato = $tipo_plato;
}

function setDescripcion($descripcion) {
    $this->descripcion = $descripcion;
}

function setTipo_pago($tipo_pago) {
    $this->tipo_pago = $tipo_pago;
}

function setNumero_tarjeta($numero_tarjeta) {
    $this->numero_tarjeta = $numero_tarjeta;
}

function setCantidad($cantidad) {
    $this->cantidad = $cantidad;
}

function setUnitario($unitario) {
    $this->unitario = $unitario;
}

function setPedido($pedido) {
    $this->pedido = $pedido;
}
function getCedula() {
    return $this->cedula;
}

function setCedula($cedula) {
    $this->cedula = $cedula;
}

function getTipo_platoP() {
    return $this->tipo_platoP;
}

function getTipo_platoD() {
    return $this->tipo_platoD;
}

function getTipo_platoB() {
    return $this->tipo_platoB;
}

function setTipo_platoP($tipo_platoP) {
    $this->tipo_platoP = $tipo_platoP;
}

function setTipo_platoD($tipo_platoD) {
    $this->tipo_platoD = $tipo_platoD;
}

function setTipo_platoB($tipo_platoB) {
    $this->tipo_platoB = $tipo_platoB;
}
function getCedulaB() {
    return $this->cedulaB;
}

function setCedulaB($cedulaB) {
    $this->cedulaB = $cedulaB;
}




}
