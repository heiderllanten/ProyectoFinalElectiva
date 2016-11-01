<?php

class Pais {

    private $id;
    private $nombre;
    private $descripcion;

    public function __construct($nombre, $descripcion) {
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getId() {
        return $this->id;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }
}

?>