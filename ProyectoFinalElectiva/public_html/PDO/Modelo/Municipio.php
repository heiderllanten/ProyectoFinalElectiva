<?php

class Municipio {

    private $id;
    private $nombre;
    private $descripcion;
    private $foranea;

    public function __construct($nombre, $descripcion, $foranea) {
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->foranea = $foranea;
    }

    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function getForanea() {
        return $this->foranea;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    function setForanea($foranea) {
        $this->foranea = $foranea;
    }
}

?>