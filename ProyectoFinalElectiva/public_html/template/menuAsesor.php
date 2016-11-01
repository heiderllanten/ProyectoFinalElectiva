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
                <li><a href="#/Filtro/">Gestion Clientes</a></li>
                <li><a href="#/tareas/">Solicitudes Prestamos</a></li>
                <li><a href="#/tareas/">Gestion Cuentas Clientes</a></li>
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