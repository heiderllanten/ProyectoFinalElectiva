<?php

/* IMPORTS */
require '../Modelo/Municipio.php';
require '../Modelo/Pais.php';
require '../DAO/MunicipioDAO.php';
//require '../DAO/ClienteDAO.php';

/* Capturamos el tipo de la peticion: podría ser get, post, put o delete. */
$method = $_SERVER['REQUEST_METHOD'];

$dao = new MunicipioDAO();
//$daoCliente = new ClienteDAO();
// Dependiendo del método de la petición ejecutaremos la acción correspondiente.
switch (strtolower($method)) {
    /* Buscar o Listar */
    case 'get':

        $id = (isset($_REQUEST['id']) ? $_REQUEST['id'] : "");
        $tipo = (isset($_REQUEST['tipo']) ? $_REQUEST['tipo'] : "");

        if ($tipo == "PAIS") {
            //Listar Paises
            $dao->listarPaises();
        } else if ($tipo == "DEPT") {
            if ($id != "") {
                
            } else {
                $dao->listarDepartamentos();
            }
        } else {
            if ($id != "") {
                
            } else {
                $dao->listarMunicipios();
            }
        }
        break;

    case 'post':
        /* Guardar */
        /* CONTROL DE ACCIONES */
        $data = json_decode(json_encode($_POST));
        if ($data->tipo == "PAIS") {
            $obj = new Pais($data->nombre, $data->descripcion);
            $dao->crearPais($obj);
        } else if ($data->tipo == "DEPT") {
            $obj = new Municipio($data->nombre, $data->descripcion, $data->pais);
            $dao->crearDepartamento($obj);
        } else {
            $obj = new Municipio($data->nombre, $data->descripcion, $data->departamento);
            $dao->crearMunicipio($obj);
        }
        break;
    case 'put':
        /* Guardar */
        /* CONTROL DE ACCIONES */
        break;
    case 'delete':
        /* Guardar */
        /* CONTROL DE ACCIONES */
        $id = (isset($_REQUEST['id']) ? $_REQUEST['id'] : "");
        $tipo = (isset($_REQUEST['tipo']) ? $_REQUEST['tipo'] : "");

        if ($id != "") {
            //Buscar
            $obj = new Pais(null, null);
            $obj->setId($id);
            if ($tipo == "PAIS") {
                $dao->eliminarPais($obj);
            } else if ($tipo == "DEPT") {
                $dao->eliminarDepartamento($obj);
            } else {
                $dao->eliminarMunicipio($obj);
            }
        }
        break;
}
?>