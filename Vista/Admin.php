<?php 
require "../Backend/metodos_Administrador.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/local.css" />

    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

    <!-- you need to include the shieldui css and js assets in order for the charts to work -->
    <link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light-bootstrap/all.min.css" />
    <link id="gridcss" rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/dark-bootstrap/all.min.css" />
    <script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>
    <script type="text/javascript" src="http://prepbootstrap.com/Content/js/gridData.js"></script>
</head>
<body>
    <div id="wrapper">
          <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <a class="navbar-brand" href="">Administrador</a>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul id="active" class="nav navbar-nav side-nav">
                    <li class="selected"><a href="../Backend/Cerrar.php"><i class="fa fa-bullseye"></i>Cerrar Sesion</a></li>
                    <li><a href=""><i class="fa fa-tasks"></i>Clientes</a></li>
                    <ul class="dropdown-menu">
                        
                      </ul>
                    <li><a href="Categoria.php"><i class="fa fa-globe"></i>Categoria</a></li>
                    <li><a href="Productos.php"><i class="fa fa-list-ol"></i>Productos</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right navbar-user">
                    <li class="dropdown messages-dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i>Opciones<span class="badge"></span> <b class="caret"></b></a>
                    </li>
                    <li class="divider-vertical"></li>
                    <li>
                        <form class="navbar-search">
                            <input type="text" placeholder="Buscar" class="form-control">
                        </form>
                    </li>
                </ul>
            </div>
        </nav>

        <div id="page-wrapper">
            <div class="row">
                
            </div>
            <div class="row">
                <div class="col-md-8">
                <center>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i>Bienvenido Administrador</h3>
                        </div>
                        <section class="feed-item">
                                <div class="icon pull-left">
                                    <i class="fa fa-comment"></i>
                                </div>
                                <div class="feed-item-body">
                                    <div class="text">
                                        <a href="#">#Clientes</a> Cantidad de clientes<a href="#"> Total = <td>
                                        <?php Cantidad_Clientes(); ?></td> </a>
                                    </div>
                                </div>
                            </section>
                            <section class="feed-item">
                                <div class="feed-item-body">
                                    <div class="text">
                                        <a href="#">#Productos</a> Cantidad de productos<a href="#"> Total = <td>
                                        <?php Cantidad_Productos(); ?></td> </a>
                                    </div>
                                </div>
                            </section>
                            <section class="feed-item">
                                <div class="icon pull-left">
                                    <i class="fa fa-plus-square-o"></i>
                                </div>
                                <div class="feed-item-body">
                                    <div class="text">
                                    <a href="#">#Ventas</a> Monto total de ventas<a href="#">Total = </a>.
                                    <?php monto_Ventas(); ?></td> </a>
                                    </div>
                            </section>
                        
                </div>
</body>
</html>
