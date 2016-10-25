<?php

class ClienteDAO {

    private $repository;

    function LoginDAO() {
        require_once '../Infraestructure/Repository.php';
        $this->repository = new Repository();
    }

    function crear(Cliente $obj) {
        $query = "INSERT INTO clientes (nombre,apellido,cedula,fecha_nacimiento,usuario)";        
        $this->repository->Execute($query);        
    }

}

?>
