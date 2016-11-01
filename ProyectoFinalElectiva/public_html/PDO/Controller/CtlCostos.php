<?php

/* IMPORTS */
require '../Modelo/Costo.php';
require '../DAO/CostosDAO.php';
//require '../DAO/ClienteDAO.php';

/* Capturamos el tipo de la peticion: podría ser get, post, put o delete. */
$method = $_SERVER['REQUEST_METHOD'];

$dao = new CostosDAO();
//$daoCliente = new ClienteDAO();
// Dependiendo del método de la petición ejecutaremos la acción correspondiente.
switch (strtolower($method)) {
    /* Buscar o Listar */
    case 'get':
        $dao->listar();
        break;

    case 'post':
        /* Guardar */
        /* CONTROL DE ACCIONES */
        $data = json_decode(json_encode($_POST));        
        $obj = new Costo($data->nombre, $data->monto);
        $dao->crear($obj);
        break;
    case 'put':
        /* Guardar */
        /* CONTROL DE ACCIONES */
        break;
    case 'delete':
        /* Guardar */
        /* CONTROL DE ACCIONES */
        $id = (isset($_REQUEST['id']) ? $_REQUEST['id'] : "");

        if ($id != "") {
            //Buscar
            $obj = new Costo(null, null);
            $obj->setId($id);
            $dao->eliminar($obj);
        }
        break;
}
?>