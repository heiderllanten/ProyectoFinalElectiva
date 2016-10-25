"use strict";
/****/
app.controller('CtlEstudiante', function ($scope, $window, estudianteService) {

    /*Se inicializa el modelo*/
    $scope.estudiantes = [{}];
    $scope.estudiante = "";


    $scope.crear = function (form) {
        if (form) {
            estudianteService.guardar($scope.estudiante, "save").then(function (response) {
                if (response.status) {
                    $scope.estudiante = "";
                    $scope.llenarArregloEstudiantes();
                    alert("Se creo con exito");
                } else {
                    $scope.estudiante = "";
                    alert(response);
                }
            });
        } else {
            alert("Gestione todos los campos");
        }
    };

    $scope.buscar = function () {
        var campo = $("#txtCodigo").val();
        if (campo != "") {
            estudianteService.buscar($scope.estudiante).then(function (response) {
                if (response != 0) {
                    $scope.estudiante.codigo = parseInt(response[0].codigo);
                    $scope.estudiante.nombre = response[0].nombre;
                    $scope.estudiante.apellido = response[0].apellido;
                    $scope.estudiante.cedula = parseInt(response[0].cedula);
                    $scope.estudiante.edad = parseInt(response[0].edad);
                    $scope.estudiante.semestre = parseInt(response[0].semestre);
                } else {
                    $scope.estudiante = "";
                    alert("No existe");
                }
            });
        } else {
            alert("Gestione el campo codigo");
        }
    };

    $scope.editar = function (form) {
        if (form) {
            estudianteService.guardar($scope.estudiante, "update").then(function (response) {
                if (response.status) {
                    $scope.estudiante = "";
                    $scope.llenarArregloEstudiantes();
                    alert("Se edito con exito");
                } else {
                    $scope.estudiante = "";
                    alert(response);
                }
            });
        } else {
            alert("Gestione todos los campos");
        }
    };

    $scope.eliminar = function () {
        var campo = $("#txtCodigo").val();
        if (campo != "") {
            estudianteService.eliminar($scope.estudiante).then(function (response) {
                if (response.status) {
                    $scope.estudiante = "";
                    $scope.llenarArregloEstudiantes();
                    alert("Se elimino con exito");
                } else {
                    $scope.estudiante = "";
                    alert(response);
                }
            });
        } else {
            alert("Gestione el campo codigo");
        }
    };

    $scope.listar = function () {
        $window.location.href = "paginaPrincipal.html#/listar";
    };

    $scope.ordenarPor = function (tipo) {
        $scope.ordenarSeleccionado = tipo;
    };

    $scope.llenarArregloEstudiantes = function () {
        estudianteService.listar().then(function (response) {
            $scope.estudiantes = [{}];
            if (response[0].res !== 0) {
                $scope.estudiantes.length = 0;
                for (var i = 0; i < response.length; i++) {
                    $scope.estudiantes.push({nombre: response[i].nombre, codigo:
                                response[i].codigo, apellido: response[i].apellido,
                        cedula: response[i].cedula, edad: response[i].edad,
                        semestre: response[i].semestre
                    });
                }
            }
        });
    };

    $scope.llenarArregloEstudiantes();
});