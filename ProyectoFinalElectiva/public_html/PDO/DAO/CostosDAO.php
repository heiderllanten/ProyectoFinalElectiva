<?php

class CostosDAO {

    private $repository;

    function CostosDAO() {
        require_once '../Infraestructure/Repository.php';
        $this->repository = new Repository();
    }
    
    public function listar(){        
        $this->repository->Execute("select id,nombre,monto from costos");
    }    
    
    public function crear(Costo $obj){
        $sql = "insert into costos (nombre, monto) values ('".
                $obj->getNombre()."',".$obj->getMonto().")";        
        $this->repository->ExecuteTransaction($sql);
    }
    
    public function eliminar(Costo $obj){
        $sql = "delete from costos where id = ".$obj->getId();        
        $this->repository->ExecuteTransaction($sql);
    }
}

?>
