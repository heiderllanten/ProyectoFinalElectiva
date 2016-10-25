<?php

class Cliente {

    private $nombre;
    private $apellido;
    private $cedula;
    private $fechaNacimiento;
    private $usuario;
    private $password;

    public function __construct($nombre, $apellido, $cedula, $fechaNacimiento, $usuario, $password) {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->cedula = $cedula;
        $this->fechaNacimiento = $fechaNacimiento;
        $this->usuario = $usuario;
        $this->password = $password;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellido() {
        return $this->apellido;
    }

    function getCedula() {
        return $this->cedula;
    }

    function getFechaNacimiento() {
        return $this->fechaNacimiento;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    function setCedula($cedula) {
        $this->cedula = $cedula;
    }

    function setFechaNacimiento($fechaNacimiento) {
        $this->fechaNacimiento = $fechaNacimiento;
    }

    function getUsuario() {
        return $this->usuario;
    }

    function getPassword() {
        return $this->password;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    function setPassword($password) {
        $this->password = $password;
    }
}

?>