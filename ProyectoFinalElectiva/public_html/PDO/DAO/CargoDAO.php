<?php

class CargoDAO {

    private $repository;

    function CargoDAO() {
        require_once '../Infraestructure/Repository.php';
        $this->repository = new Repository();
    }

    function crear(Cargo $obj) {
        $query = "INSERT INTO cargos (nombre,intensidad_horaria,salario,descripcion) VALUES ('" . $obj->getNombre() . "',"
                . "" . $obj->getIntensidad() . "," . $obj->getSalario() . ",'" . $obj->getDescripcion()."');";
        $this->repository->ExecuteTransaction($query);
    }

    function buscar(Cargo $obj) {
        $query = "select id,nombre,intensidad_horaria,salario,descripcion from cargos where nombre='".$obj->getNombre()."';";
        $this->repository->Execute($query);
    }
function editar(Cargo $obj) {
        $query = "update cargos set nombre='".$obj->getNombre()."',intensidad_horaria=".$obj->getIntensidad().",salario=".$obj->getSalario().""
                . ",descripcion='".$obj->getDescripcion()."' where nombre='".$obj->getNombre()."';";
        $this->repository->ExecuteTransaction($query);
    }
    
       function eliminar(Cargo $obj) {
        $query = "delete from cargos where nombre='".$obj->getNombre()."';";
        $this->repository->ExecuteTransaction($query);
    }
}

?>
