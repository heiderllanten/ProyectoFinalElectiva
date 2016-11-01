/* global app */

"use strict";
/****/
app.controller('CtlCargos', function ($scope, $window, cargoService) {

    /*Se inicializa el modelo*/
    $scope.cargos = [{}];
    $scope.cargo = "";


    $scope.crear = function (form) {
        if (form) {
            cargoService.crear($scope.cargo, "save").then(function (response) {
                if (response.status==="true") {
                    $scope.cargo = "";
                    alert("Se creo con exito");
                } else {
                    $scope.cargo = "";
                    alert("Ya existe un cargo con el mismo nombre");
                }
            });
        } else {
            alert("Gestione todos los campos");
        }
    };

    $scope.buscar = function () {
        var campo = $("#nombre").val();
        if (campo!=="") {
            cargoService.buscar($scope.cargo).then(function (response) {
                if (response.length > 0) {
                    alert(response.length);
                    $scope.cargo.nombre = response[0].nombre;
                    $scope.cargo.intensidad = parseInt(response[0].intensidad_horaria);
                    $scope.cargo.salario = parseInt(response[0].salario);
                    $scope.cargo.descripcion = response[0].descripcion;
                } else {
                    $scope.cargo = "";
                    alert("No existe");
                }
            });
        } else {
            alert("Gestione el campo codigo");
        }
    };

    $scope.editar = function (form) {
        if (form) {
            cargoService.editar($scope.cargo, "update").then(function (response) {
                if (response.status==="true") {
                    $scope.cargo = "";
                    alert("Se edito con exito");
                } else {
                    $scope.cargo = "";
                    alert(response);
                }
            });
        } else {
            alert("Gestione todos los campos");
        }
    };

    $scope.eliminar = function () {
        var campo = $("#nombre").val();
        if (campo!=="") {
            cargoService.eliminar($scope.cargo).then(function (response) {
                if (response.status==="true") {
                    $scope.cargo = "";
                    alert("Se elimino con exito");
                } else {
                    $scope.cargo = "";
                    alert("No existe");
                }
            });
        } else {
            alert("Gestione el campo codigo");
        }
    };

  

    $scope.ordenarPor = function (tipo) {
        $scope.ordenarSeleccionado = tipo;
    };

    

});