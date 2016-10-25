<?php

class LoginDAO {

    private $repository;

    function LoginDAO() {
        require_once '../Infraestructure/Repository.php';
        $this->repository = new Repository();
    }

    function ingresar(Usuario $obj) {
        $query = "SELECT usuario,password "
                . "from usuarios "
                . "where usuario='" . $obj->getUsuario() . "' AND password='" . $obj->getPassword() . "'";        
        $this->repository->Execute($query);        
    }

}

?>
