/* global app */

"use strict";
/****/
app.controller('CtlBanco', function ($scope, $window, bancoService) {

    /*Se inicializa el modelo*/
    $scope.bancos = [{}];
    $scope.banco = "";


    $scope.crear = function (form) {
        if (form) {
            bancoService.crear($scope.banco, "save").then(function (response) {
                if (response.status==="true") {
                    $scope.banco = "";
                    alert("Se creo con exito");
                } else {
                    $scope.banco = "";
                    alert("Ya existe un banco con el mismo NIT");
                }
            });
        } else {
            alert("Gestione todos los campos");
        }
    };

    $scope.buscar = function () {
        var campo = $("#nit").val();
        if (campo!=="") {
            bancoService.buscar($scope.banco).then(function (response) {
                if (response.length > 0) {
                    alert(response.length);
                    $scope.banco.nit = response[0].nit;
                    $scope.banco.nombre = response[0].nombre;
                    $scope.banco.mision = response[0].mision;
                    $scope.banco.vision = response[0].vision;
                    $scope.banco.direccion = response[0].direccion;
                } else {
                    $scope.banco = "";
                    alert("No existe");
                }
            });
        } else {
            alert("Gestione el campo codigo");
        }
    };

    $scope.editar = function (form) {
        if (form) {
            bancoService.editar($scope.banco, "update").then(function (response) {
                if (response.status==="true") {
                    $scope.banco = "";
                    $scope.llenarArregloBancos();
                    alert("Se edito con exito");
                } else {
                    $scope.banco = "";
                    alert(response);
                }
            });
        } else {
            alert("Gestione todos los campos");
        }
    };

    $scope.eliminar = function () {
        var campo = $("#nit").val();
        if (campo!=="") {
            bancoService.eliminar($scope.banco).then(function (response) {
                if (response.status==="true") {
                    $scope.banco = "";
                    alert("Se elimino con exito");
                } else {
                    $scope.banco = "";
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