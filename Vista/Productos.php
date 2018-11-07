<?php require "../Clases/Productos.php";//esto es un objeto
$sql;
$cat = new Productos("sku","nombre","descripcion","imagen","categoria","stock","precio","id");
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/estiloCP.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Productos </title>
</head>
<body>
    <!-- Este form contiene los botones que haran que aparescan los otros forms desplegables, tiene un id asignado ya que con ese 
    id se desplegaran el form que se seleccione-->
    <form action="">
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <ul class="nav navbar-nav">
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Productos<span
                                class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="Admin.html">Volver</a></li>
                        </ul>
                    </li>
                    <li><a id="Agregar" href="#">Agregar Productos</a></li>
                    <li><a id="Modificar" href="#">Modificar Productos</a></li>
                    <li><a id="Eliminar" href="#">Eliminar Productos</a></li>
                </ul>
            </div>
        </nav>
    </form>
    <!-- Agregar --->
    <div id="formulario">
        <div class="ventana-sistema" id="VAgregar">
            <div class="content w3-animate-zoom">
            <form action="../Backend/addP.php" method="post" enctype="multipart/form-data">
                    <h2>Agregar Productos</h2>
                        <center><input type="text" id="sku" name="sku" placeholder="Sku producto"><br>
                        <center><input type="text" id="nombre" name="nombre" placeholder="Nombre producto"><br>
                        <center><input type="text" id="descripcion" name="descripcion" placeholder="Descripcion producto"><br>
                        <center><input type="file" id="imagen" name="imagen" placeholder="Image producto"><br>
                        <center><input type="text" id="categoria" name="categoria" placeholder="Categoria producto"><br>
                        <center><input type="text" id="stock" name="stock" placeholder="Stock producto"><br>
                        <center><input type="text" id="precio" name="precio" placeholder="Precio producto"><br>
                            <center><button id="boton" name="guardar"type="submit">Agregar</button>
                </form>
            </div>
        </div>
        <!-- Modicar --->
        <div class="ventana-sistema" id="VModificar">
            <div class="content w3-animate-zoom">
            <form action="../Backend/modP.php" method="post" id="2f" enctype="multipart/form-data">
                    <h2>Modificar Productos</h2>
                        <center><select name="id" > <?php echo $cat->mostrar_Productos();?></select>
                        <center><input type="text" id="sku" name="sku" placeholder="Sku producto"><br>
                        <center><input type="text" id="nombre" name="nombre" placeholder="Nombre producto"><br>
                        <center><input type="text" id="descripcion" name="descripcion" placeholder="Descripcion producto"><br>
                        <center><input type="file" id="imagen" name="imagen" placeholder="Image producto"><br>
                        <center><input type="text" id="stock" name="stock" placeholder="Stock producto"><br>
                        <center><input type="text" id="precio" name="precio" placeholder="Precio producto"><br>
                        <center><button name="modificar" id="modificar" type="submit">Modificar</button></center>
                </form>
            </div>
        </div>
        <!-- Eliminar --->
        <div class="ventana-sistema" id="VEliminar">
            <div class="content w3-animate-zoom">
                <form action="../Backend/deleteP.php" id="3f" method="post">
                    <h2>Eliminar Productos</h2>
                    <center><select name="sku"> <?php 
                       echo $cat->mostrar_Productos();
                    ?></select>
                    <center><button id="boton" type="submit">Eliminar</button></center>
                        <form action="#"></form>
            </div>
        </div>
       
    </div>
    <script src="../js/scriptCrud.js"></script>
</body>

</html>
