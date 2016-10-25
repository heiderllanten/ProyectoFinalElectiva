<?php

/* IMPORTS */
require '../Modelo/LogIn.php';
require '../Modelo/Cliente.php';
require '../DAO/LogInDAO.php';
//require '../DAO/ClienteDAO.php';

/* Capturamos el tipo de la peticion: podría ser get, post, put o delete. */
$method = $_SERVER['REQUEST_METHOD'];

$daoLogIn = new LoginDAO();
//$daoCliente = new ClienteDAO();

// Dependiendo del método de la petición ejecutaremos la acción correspondiente.
switch (strtolower($method)) {
    /* Buscar o Listar */
    case 'get':
        
        $usuario = (isset($_REQUEST['usuario']) ? $_REQUEST['usuario'] : "");
        $password = (isset($_REQUEST['password']) ? $_REQUEST['password'] : "");
        
        if ($usuario != "") {
            //Buscar
            $obj = new LogIn($usuario, $password);            
            $daoLogIn->ingresar($obj);
        }
        break;

    case 'post':
        /* Guardar */
        /* CONTROL DE ACCIONES */
        $data = json_decode(json_encode($_POST));
//        echo implode(",", $data);
        $obj = new Cliente($data->nombre, $data->apellido, $data->cedula, $data->fechaNacimiento, $data->usuario, $data->password);
        $daoLogIn->registrar($obj);
        break;
}
?>