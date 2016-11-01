/* global app */

"use strict";
/****/
app.controller('CtlDepartamento', function ($scope, $window, municipioService) {

    /*Se inicializa el modelo*/
    $scope.departamentos = [];
    $scope.departamento = "";
    $scope.paises = [];

    $scope.crear = function (form) {
        if (form) {
            municipioService.crearDepartamento($scope.departamento).then(function (response) {
                if (response.status === "true") {
                    $scope.departamento = "";
                    $scope.listarDepartamentos();
                    alert("Se creo con exito");
                } else {
                    $scope.departamento = "";
                    alert("Ya existe un departamento con el mismo nombre");
                }
            });
        } else {
            alert("Gestione todos los campos");
        }
    };

    $scope.eliminar = function (departamento) {
        municipioService.eliminarDepartamento(departamento).then(function (response) {
            if (response.status === "true") {
                $scope.departamento = "";
                $scope.listarDepartamentos();
                alert("Se elimino con exito");
            } else {
                $scope.departamento = "";
                alert("No se puede eliminar el departamento");
            }
        });
    };

    $scope.listarDepartamentos = function () {
        municipioService.listarDepartamentos($scope.departamento).then(function (response) {
            $scope.departamentos = [];
            if (response[0].res !== 0) {
                $scope.departamentos.length = 0;
                for (var i = 0; i < response.length; i++) {
                    $scope.departamentos.push({nombre: response[i].nombre, codigo:
                                response[i].id, descripcion: response[i].descripcioin,
                        nombrepais: response[i].nombrepais
                    });
                }
            }
        });
    };
    
    $scope.listarPaises = function () {
        municipioService.listarPaises().then(function (response) {
            $scope.paises = [];
            if (response[0].res !== 0) {
                $scope.paises.length = 0;
                for (var i = 0; i < response.length; i++) {
                    $scope.paises.push({nombre: response[i].nombre, codigo:
                                response[i].id, descripcion: response[i].descripcion
                    });
                }
            }
        });
    };

    $scope.ordenarPor = function (tipo) {
        $scope.ordenarSeleccionado = tipo;
    };
    
    $scope.listarPaises();
    $scope.listarDepartamentos();
});