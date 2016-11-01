<?php

class Cargo {

    private $id;
    private $nombre;
    private $intensidad;
    private $salario;
    private $descripcion;

    public function __construct($id, $nombre, $intensidad, $salario, $descripcion) {
        $this->nombre = $nombre;
        $this->id = $id;
        $this->intensidad = $intensidad;
        $this->salario = $salario;
        $this->descripcion = $descripcion;
    }
   
    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getIntensidad() {
        return $this->intensidad;
    }

    function getSalario() {
        return $this->salario;
    }

    function getDescripcion() {
        return $this->descripcion;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setIntensidad($intensidad) {
        $this->intensidad = $intensidad;
    }

    function setSalario($salario) {
        $this->salario = $salario;
    }

    function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }


}

?>