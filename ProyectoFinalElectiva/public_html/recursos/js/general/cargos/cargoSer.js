
/* global app */


/*************servicio vs factory vs provider***************/
/*Todas son SINGLETON (Unicamente puede ser instanciada una vez en el contexto
 * en el cual se encuentre)*/


/*Se define el servicio (app.service(nombre servicio, funcionalidad))*/
/*El $http es un servicio por defecto para consumir GET,POST,ETC. El 
 * $httpParamSerializerJQLike es necesario, debido a que angular empaqueta los
 * datos diferente a como se hacia en jquery  y muchos webservices no encuentran
 * los datos que les llega, por lo que se hace necesario serializarlos como 
 * jquery para que lleguen al servidor*/
app.service('cargoService', function ($http, $httpParamSerializerJQLike) {

    /*Se define una funcion interna llamada logIn, que recibe 2 parametros*/
    this.crear = function (cargo, type) {
        /*El resultado del $http es almacenado en la promesa*/
        /*Ademas se debe definir el tipo de cabecera para enviar los datos*/
        var promise = $http({
            method: (type === 'save') ? "post" : "put",
            url: "PDO/Controller/CtlCargo.php",
            data: $httpParamSerializerJQLike({
                nombre: cargo.nombre,
                intensidad: cargo.intensidad,
                salario: cargo.salario,
                descripcion: cargo.descripcion}),
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function mySucces(response) {
            return response.data;
        }, function myError(response) {
            alert("Error");
            alert(response.statusText);
        });

        /*Luego se retorna la promesa*/
        return promise;
    };
    
    this.editar = function (cargo, type) {
        /*El resultado del $http es almacenado en la promesa*/
        /*Ademas se debe definir el tipo de cabecera para enviar los datos*/
        var promise = $http({
            method: (type === 'update') ? "put" : "put",
            url: "PDO/Controller/CtlCargo.php",
            params:{
                nombre: cargo.nombre,
                intensidad: cargo.intensidad,
                salario: cargo.salario,
                descripcion: cargo.descripcion},
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function mySucces(response) {
            return response.data;
        }, function myError(response) {
            alert("Error");
            alert(response.statusText);
        });

        /*Luego se retorna la promesa*/
        return promise;
    };


    /*Se define una funcion interna llamada logIn, que recibe 2 parametros*/
    this.listar = function () {
        /*El resultado del $http es almacenado en la promesa*/
        /*Ademas se debe definir el tipo de cabecera para enviar los datos*/
        var promise = $http({
            method: "get",
            url: "PDO/Controller/CtlCargo.php"
        }).then(function mySucces(response) {
            return response.data;
        }, function myError(response) {
            alert("Error");
            alert(response.statusText);
        });

        /*Luego se retorna la promesa*/
        return promise;
    };


    /*Se define una funcion interna llamada logIn, que recibe 2 parametros*/
    this.buscar = function (cargo) {
        /*El resultado del $http es almacenado en la promesa*/
        /*Ademas se debe definir el tipo de cabecera para enviar los datos*/

        /*El envio de datos por GET cambia, siendo este con el atributo params 
         * y son encaps;ular los datos con el metodo JQUERY*/
        alert("si llega el hp nombre"+cargo.nombre);
        var promise = $http({
            method: "get",
            url: "PDO/Controller/CtlCargo.php",
            params: {nombre: cargo.nombre
            },
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function mySucces(response) {
            return response.data;
        }, function myError(response) {
            alert("Error");
            alert(response.statusText);
        });

        /*Luego se retorna la promesa*/
        return promise;
    };



    /*Se define una funcion interna llamada logIn, que recibe 2 parametros*/
    this.eliminar = function (cargo) {
        /*El resultado del $http es almacenado en la promesa*/
        /*Ademas se debe definir el tipo de cabecera para enviar los datos*/
        var promise = $http({
            method: "delete",
            url: "PDO/Controller/CtlCargo.php",
            params: {nombre: cargo.nombre
            },
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).then(function mySucces(response) {
            return response.data;
        }, function myError(response) {
            alert("Error");
            alert(response.statusText);
        });

        /*Luego se retorna la promesa*/
        return promise;
    };
});