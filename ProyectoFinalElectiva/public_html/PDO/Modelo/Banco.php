<?php

class Banco {

    private $nombre;
    private $nit;
    private $mision;
    private $vision;
    private $direccion;

    public function __construct($nombre, $nit, $mision, $vision, $direccion) {
        $this->nombre = $nombre;
        $this->nit = $nit;
        $this->mision = $mision;
        $this->vision = $vision;
        $this->direccion = $direccion;
    }
    function getNombre() {
        return $this->nombre;
    }

    function getNit() {
        return $this->nit;
    }

    function getMision() {
        return $this->mision;
    }

    function getVision() {
        return $this->vision;
    }

    function getDireccion() {
        return $this->direccion;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setNit($nit) {
        $this->nit = $nit;
    }

    function setMision($mision) {
        $this->mision = $mision;
    }

    function setVision($vision) {
        $this->vision = $vision;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }


 
}

?>