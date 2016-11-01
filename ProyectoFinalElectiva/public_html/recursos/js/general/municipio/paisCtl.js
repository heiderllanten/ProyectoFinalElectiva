/* global app */

"use strict";
/****/
app.controller('CtlPais', function ($scope, $window, municipioService) {

    /*Se inicializa el modelo*/
    $scope.paises = [];
    $scope.pais = "";


    $scope.crear = function (form) {
        if (form) {
            municipioService.crearPais($scope.pais).then(function (response) {
                if (response.status === "true") {
                    $scope.pais = "";
                    $scope.listarPaises();
                    alert("Se creo con exito");
                } else {
                    $scope.pais = "";
                    alert("Ya existe un pais con el mismo nombre");
                }
            });
        } else {
            alert("Gestione todos los campos");
        }
    };

    $scope.eliminar = function (pais) {
        municipioService.eliminarPais(pais).then(function (response) {
            if (response.status === "true") {
                $scope.pais = "";
                $scope.listarPaises();
                alert("Se elimino con exito");                
            } else {
                $scope.pais = "";
                alert("No se puede eliminar el pais");
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
});