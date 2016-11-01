<?php

/* IMPORTS */
require '../Modelo/Banco.php';
require '../DAO/BancoDAO.php';
//require '../DAO/ClienteDAO.php';

/* Capturamos el tipo de la peticion: podría ser get, post, put o delete. */
$method = $_SERVER['REQUEST_METHOD'];

$dao = new BancoDAO();
//$daoCliente = new ClienteDAO();
// Dependiendo del método de la petición ejecutaremos la acción correspondiente.
switch (strtolower($method)) {
    /* Buscar o Listar */
   case 'get':

        $nit = (isset($_REQUEST['nit']) ? $_REQUEST['nit'] : "");

        if ($nit !==0) {
            //Buscar
            $obj = new Banco(null,$nit,null,null,null);
            $dao->buscar($obj);
        }
        break;

    case 'post':
        /* Guardar */
        /* CONTROL DE ACCIONES */
        $data = json_decode(json_encode($_POST));
        $obj = new Banco($data->nombre, $data->nit, $data->mision, $data->vision, $data->direccion);
        $dao->crear($obj);
        break;
    case 'put':
        /* Guardar */
        /* CONTROL DE ACCIONES */
               $nit = (isset($_REQUEST['nit']) ? $_REQUEST['nit'] : "");
       $nombre = (isset($_REQUEST['nombre']) ? $_REQUEST['nombre'] : "");
       $mision = (isset($_REQUEST['mision']) ? $_REQUEST['mision'] : "");
       $vision = (isset($_REQUEST['vision']) ? $_REQUEST['vision'] : "");
       $direccion = (isset($_REQUEST['direccion']) ? $_REQUEST['direccion'] : "");

        $data = json_decode(json_encode($_POST));
        $obj = new Banco($nombre, $nit, $mision, $vision, $direccion);
        $dao->editar($obj);
        break;
    case 'delete':
        /* Guardar */
        /* CONTROL DE ACCIONES */
       $nit = (isset($_REQUEST['nit']) ? $_REQUEST['nit'] : "");

        if ($nit != "") {
            //Buscar
            $obj = new Banco(null,$nit,null,null,null);
            $dao->eliminar($obj);
        }
        break;
}
?>