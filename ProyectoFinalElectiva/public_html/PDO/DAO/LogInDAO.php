<?php

class LoginDAO {

    private $repository;

    function LoginDAO() {
        require_once '../Infraestructure/Repository.php';
        $this->repository = new Repository();
    }

    function ingresar(LogIn $obj) {
        $query = "SELECT usuario,password,rol "
                . "from usuarios "
                . "where usuario='" . $obj->getUsuario() . "' AND password='" . $obj->getPassword() . "'";        
        $this->repository->Execute($query);        
    }
    
    function registrar(Cliente $obj){
        $query = "INSERT INTO usuarios (usuario,password,rol) VALUES ('".$obj->getUsuario()."',"
                . "'".$obj->getPassword()."','CLIENTE'); ";
//                . "INSERT INTO clientes (nombre,apellido,cedula,fecha_nacimiento,usuario) "
//                . "VALUES ('".$obj->getNombre()."','".$obj->getApellido()."',".$obj->getCedula().","
//                . "'".$obj->getFechaNacimiento()."','".$obj->getUsuario()."');";        
        $this->repository->Execute($query);
    }

}

?>
