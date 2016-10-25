<?php

/* IMPORTS */
require '../Modelo/LogIn.php';
require '../DAO/LogInDAO.php';

/* Capturamos el tipo de la peticion: podría ser get, post, put o delete. */
$method = $_SERVER['REQUEST_METHOD'];

$dao = new LoginDAO();

// Dependiendo del método de la petición ejecutaremos la acción correspondiente.
switch (strtolower($method)) {
    /* Buscar o Listar */
    case 'get':

        $usuario = (isset($_REQUEST['usuario']) ? $_REQUEST['usuario'] : "");
        $password = (isset($_REQUEST['password']) ? $_REQUEST['password'] : "");

        if ($usuario != "") {
            //Buscar
            $obj = new LogIn($usuario, $password);
            $dao->Search($obj);
        } 
        break;

    case 'post':
        /* Guardar */
        /* CONTROL DE ACCIONES */
        $data = $_POST;
        $data = json_decode(json_encode($_POST));
        $obj = new Rol(null, $data->nombre, $data->descripcion);
        $dao->Save($obj);
        break;
    
}
?>