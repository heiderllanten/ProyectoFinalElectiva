/* global app */

"use strict";
/****/
app.controller('CtlMunicipio', function ($scope, $window, municipioService) {

    /*Se inicializa el modelo*/
    $scope.departamentos = [];
    $scope.municipios = [];
    $scope.municipio = "";
    $scope.paises = [];

    $scope.crear = function (form) {
        if (form) {
            municipioService.crearMunicipio($scope.municipio).then(function (response) {
                if (response.status === "true") {
                    $scope.municipio = "";
                    $scope.listarDepartamentos();
                    alert("Se creo con exito");
                } else {
                    $scope.municipio = "";
                    alert("Ya existe un municipio con el mismo nombre");
                }
            });
        } else {
            alert("Gestione todos los campos");
        }
    };

    $scope.eliminar = function (municipio) {
        municipioService.eliminarDepartamento(municipio).then(function (response) {
            if (response.status === "true") {
                $scope.municipio = "";
                $scope.listarDepartamentos();
                alert("Se elimino con exito");
            } else {
                $scope.municipio = "";
                alert("No existe");
            }
        });
    };
    
    $scope.listarMunicipios = function () {
        municipioService.listarMunicipios($scope.municipio).then(function (response) {
            $scope.municipios = [];
            if (response[0].res !== 0) {
                $scope.municipios.length = 0;
                for (var i = 0; i < response.length; i++) {
                    $scope.municipios.push({nombre: response[i].nombre, codigo:
                                response[i].id, descripcion: response[i].descripcioin,
                        nombrepais: response[i].nombrepais
                    });
                }
            }
        });
    };

    $scope.listarDepartamentos = function () {
        municipioService.listarDepartamentos($scope.municipio).then(function (response) {
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
    $scope.listarMunicipios();
});