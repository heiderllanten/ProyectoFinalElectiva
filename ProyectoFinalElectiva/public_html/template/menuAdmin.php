<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Menu</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="dropdown"><a href="#" class="dropdown-toggle"
                                        data-toggle="dropdown" role="button" aria-haspopup="true"
                                        aria-expanded="false"> Banco <span class="caret"></span>
                </a>
                    <ul class="dropdown-menu">
                        <li><a class="crossroads" href="#/banco/">Gestion Banco</a></li>
                        <li><a class="crossroads" href="#/junta/">Gestion Junta Directiva</a></li>
                        <li><a class="crossroads" href="#/sucursal/">Gestion Sucursales</a></li>                          
                    </ul>
                </li>
                <li class="dropdown"><a href="#" class="dropdown-toggle"
                                        data-toggle="dropdown" role="button" aria-haspopup="true"
                                        aria-expanded="false"> Empleados <span class="caret"></span>
                </a>
                    <ul class="dropdown-menu">
                        <li><a class="crossroads" href="#/empleados/">Gestion Empleados</a></li>
                        <li><a class="crossroads" href="#/cargos/">Gestion Cargos</a></li>                    
                    </ul>
                </li>
                <li><a href="#/tiposCuenta/">Gestion Tipos de Cuenta</a></li>
                <li><a href="#/costos/">Gestion Costos Asociados</a></li>
                <li class="dropdown"><a href="#" class="dropdown-toggle"
                                        data-toggle="dropdown" role="button" aria-haspopup="true"
                                        aria-expanded="false"> Pais <span class="caret"></span>
                </a>
                    <ul class="dropdown-menu">
                        <li><a class="crossroads" href="#/pais/">Gestion Pais</a></li>
                        <li><a class="crossroads" href="#/departamento/">Gestion Departamento</a></li>
                        <li><a class="crossroads" href="#/municipios/">Gestion Municipios</a></li>  
                    </ul>
                </li>
            </ul>

            <div ng-controller="CtlLogIn">
                <input type="button" value="Log Out" id="btnLogOut" class="btn btn-default"
                       ng-click="logOut()" style="float: right; margin-top: 10px;">       
            </div>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>