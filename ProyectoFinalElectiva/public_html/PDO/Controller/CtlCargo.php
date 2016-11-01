<?php

/* IMPORTS */
require '../Modelo/Cargo.php';
require '../DAO/CargoDAO.php';
//require '../DAO/ClienteDAO.php';

/* Capturamos el tipo de la peticion: podría ser get, post, put o delete. */
$method = $_SERVER['REQUEST_METHOD'];

$dao = new CargoDAO();
//$daoCliente = new ClienteDAO();
// Dependiendo del método de la petición ejecutaremos la acción correspondiente.
switch (strtolower($method)) {
    /* Buscar o Listar */
   case 'get':

         /* CONTROL DE ACCIONES */
       $nombre = (isset($_REQUEST['nombre']) ? $_REQUEST['nombre'] : "");

        if ($nombre !== "") {
            //Buscar
            $obj = new Cargo(null,$nombre,null,null,null);
            $dao->buscar($obj);
        }
        break;

    case 'post':
        /* Guardar */
        /* CONTROL DE ACCIONES */
        $data = json_decode(json_encode($_POST));
        $obj = new Cargo(null,$data->nombre, $data->intensidad, $data->salario, $data->descripcion);
        $dao->crear($obj);
        break;
    case 'put':
        /* Guardar */
        /* CONTROL DE ACCIONES */
               $id = (isset($_REQUEST['id']) ? $_REQUEST['id'] : "");
       $nombre = (isset($_REQUEST['nombre']) ? $_REQUEST['nombre'] : "");
       $intensidad = (isset($_REQUEST['intensidad']) ? $_REQUEST['intensidad'] : "");
       $salario = (isset($_REQUEST['salario']) ? $_REQUEST['salario'] : "");
       $descripcion = (isset($_REQUEST['descripcion']) ? $_REQUEST['descripcion'] : "");

        $data = json_decode(json_encode($_POST));
        $obj = new Cargo(null,$nombre, $intensidad, $salario, $descripcion);
        $dao->editar($obj);
        break;
    case 'delete':
        /* Guardar */
        /* CONTROL DE ACCIONES */
       $nombre = (isset($_REQUEST['nombre']) ? $_REQUEST['nombre'] : "");

        if ($nombre !== "") {
            //Buscar
            $obj = new Cargo(null,$nombre,null,null,null);
            $dao->eliminar($obj);
        }
        break;
}
?>