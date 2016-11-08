/* global app */

"use strict";
/****/
app.controller('CtlCostos', function ($scope, $window, costosService) {

    /*Se inicializa el modelo*/
    $scope.costos = [];
    $scope.costo = "";


    $scope.crear = function (form) {
        if (form) {
            costosService.crear($scope.costo).then(function (response) {
                if (response.status === "true") {
                    $scope.costo = "";
                    $scope.listar();
                    alert("Se creo con exito");
                } else {
                    $scope.costo = "";
                    alert("Ya existe un costo con el mismo nombre");
                }
            });
        } else {
            alert("Gestione todos los campos");
        }
    };

    $scope.eliminar = function (costo) {
        costosService.eliminar(costo).then(function (response) {
            if (response.status === "true") {
                $scope.costo = "";
                $scope.listar();
                alert("Se elimino con exito");                
            } else {
                $scope.costo = "";
                alert("No se puede eliminar el costo");
            }
        });
    };

    $scope.listar = function () {
        costosService.listar().then(function (response) {
            $scope.costos = [];
            if (response[0].res !== 0) {
                $scope.costos.length = 0;
                for (var i = 0; i < response.length; i++) {
                    $scope.costos.push({nombre: response[i].nombre, codigo:
                                response[i].id, monto: response[i].monto
                    });
                }
            }
        });
    };
    
    $scope.llenarCampos = function (obj){ 
        obj.monto = parseInt(obj.monto);
        $scope.costo = obj;
    };

    $scope.ordenarPor = function (tipo) {
        $scope.ordenarSeleccionado = tipo;
    };

    $scope.listar();
});