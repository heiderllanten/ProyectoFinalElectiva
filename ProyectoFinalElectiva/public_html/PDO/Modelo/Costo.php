<?php

class Costo {

    private $id;
    private $nombre;
    private $monto;

    public function __construct($nombre, $monto) {
        $this->nombre = $nombre;
        $this->monto = $monto;
    }

    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getMonto() {
        return $this->monto;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setMonto($monto) {
        $this->monto = $monto;
    }
}

?>