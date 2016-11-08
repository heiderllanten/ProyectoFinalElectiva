<?php

class MunicipioDAO {

    private $repository;

    function MunicipioDAO() {
        require_once '../Infraestructure/Repository.php';
        $this->repository = new Repository();
    }

    public function listarDepartamentos() {
        $sql = "select d.id,d.nombre,d.descripcioin,d.pais,p.nombre as nombrepais "
                . "from departamentos d join paises p on d.pais=p.id";   
        $this->repository->Execute($sql);
    }
    
    public function listarDeptoPorPais(Pais $obj) {
        $sql = "select id,nombre from departamentos where pais=".$obj->getId();   
        $this->repository->Execute($sql);
    }

    public function listarMunicipios() {
        $slq = "select m.id,m.nombre,m.descripcion,d.id as departamento,d.nombre "
                . "as nombredepto,p.id as pais,p.nombre as nombrepais from municipios "
                . "m join departamentos d on m.departamento=d.id join paises p on p.id=d.pais";          
        $this->repository->Execute($slq);
    }
    
    public function listarPaises(){        
        $this->repository->Execute("select id,nombre,descripcion from paises");
    }

    public function crearMunicipio(Municipio $obj){
        $sql = "insert into municipios (nombre, descripcion, departamento) values ('".
                $obj->getNombre()."','".$obj->getDescripcion()."',".$obj->getForanea().")";        
        $this->repository->ExecuteTransaction($sql);
    }
    
    public function eliminarMunicipio(Pais $obj){
        $sql = "delete from municipios where id = ".$obj->getId();
        $this->repository->ExecuteTransaction($sql);
    }
    
    public function crearDepartamento(Municipio $obj){
        $sql = "insert into departamentos (nombre, descripcioin, pais) values ('".
                $obj->getNombre()."','".$obj->getDescripcion()."',".$obj->getForanea().")";        
        $this->repository->ExecuteTransaction($sql);
    }
    
    public function eliminarDepartamento(Pais $obj){
        $sql = "delete from departamentos where id = ".$obj->getId();
        $this->repository->ExecuteTransaction($sql);
    }
    
    public function crearPais(Pais $obj){
        $sql = "insert into paises (nombre, descripcion) values ('".
                $obj->getNombre()."','".$obj->getDescripcion()."')";
        $this->repository->ExecuteTransaction($sql);
    }
    
    public function eliminarPais(Pais $obj){
        $sql = "delete from paises where id = ".$obj->getId();        
        $this->repository->ExecuteTransaction($sql);
    }
}

?>
