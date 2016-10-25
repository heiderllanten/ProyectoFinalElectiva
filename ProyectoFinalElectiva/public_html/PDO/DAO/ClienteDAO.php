<?php

class ClienteDAO {

    private $repository;

    function ClienteDAO() {
        require_once '../Infraestructure/Repository.php';
        $this->repository = new Repository();
    }

    function crear(Cliente $obj) {
        $query = "INSERT INTO usuarios (usuario,password,rol) VALUES ('".$obj->getUsuario()."',"
                . "'".$obj->getPassword()."','".$obj->getRol()."');"
                . "INSERT INTO clientes (nombre,apellido,cedula,fecha_nacimiento,usuario) "
                . "VALUES ('".$obj->getNombre()."','".$obj->getApellido()."',".$obj->getCedula().","
                . "'".$obj->getFechaNacimiento()."','".$obj->getUsuario()."');";        
        $this->repository->Execute($query);        
    }

}

?>
