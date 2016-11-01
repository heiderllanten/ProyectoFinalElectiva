<?php

class BancoDAO {

    private $repository;

    function BancoDAO() {
        require_once '../Infraestructure/Repository.php';
        $this->repository = new Repository();
    }

    function crear(Banco $obj) {
        $query = "INSERT INTO banco (nombre,nit,mision,vision,direccion) VALUES ('" . $obj->getNombre() . "',"
                . "" . $obj->getNit() . ",'" . $obj->getMision() . "','" . $obj->getVision() . "','" . $obj->getDireccion() . "');";
        $this->repository->ExecuteTransaction($query);
    }

    function buscar(Banco $obj) {
        $query = "select nombre,nit,mision,vision,direccion from banco where nit=".$obj->getNit();
        $this->repository->Execute($query);
    }
function editar(Banco $obj) {
        $query = "update banco set nombre='".$obj->getNombre()."',mision='".$obj->getMision()."',vision='".$obj->getVision()."'"
                . ",direccion='".$obj->getDireccion()."' where nit=".$obj->getNit()."";
        $this->repository->ExecuteTransaction($query);
    }
    
       function eliminar(Banco $obj) {
        $query = "delete from banco where nit=".$obj->getNit()."";
        $this->repository->ExecuteTransaction($query);
    }
}

?>
