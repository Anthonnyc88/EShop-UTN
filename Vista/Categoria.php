<?php require "../Clases/Categorias.php";//esto es un objeto
$sql;
$cat = new Categoria("nombre","id_categoria","id");
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
    <title>Categorias</title>
</head>

<body>
    <!-- Este form contiene los botones que haran que aparescan los otros forms desplegables, tiene un id asignado ya que con ese 
    id se desplegaran el form que se seleccione-->
    <form action="">
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <ul class="nav navbar-nav">
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Categorias<span
                                class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="Admin.php">Volver</a></li>
                        </ul>
                    </li>
                    <li><a id="Listar" href="#">Mostrar Categorias</a></li>
                    <li><a id="Agregar" href="#">Agregar Categorias</a></li>
                    <li><a id="Modificar" href="#">Modificar Categorias</a></li>
                    <li><a id="Eliminar" href="#">Eliminar Categorias</a></li>
                </ul>
            </div>
        </nav>
    </form>
    <!-- Agregar --->
    <div id="formulario">
        <div class="ventana-sistema" id="VAgregar">
            <div class="content w3-animate-zoom">
                <form action="../Backend/addC.php" id="1f" method="post">
                    <h2>Agregar Categoria</h2>
                    <center><input type="text" id="nombre" name="nombre" placeholder="Nombre Categoria"><br>
                        <center><input type="text" id="id_categoria" name="id_categoria" placeholder="ID Categoria"><br>
                            <center><button id="boton" type="submit">Agregar</button>
                </form>
            </div>
        </div>
        <!-- Modicar --->
        <div class="ventana-sistema" id="VModificar">
            <div class="content w3-animate-zoom">
                <form action="../Backend/ModC.php" id="2f" method="post">
                    <h2>Modificar Categoria</h2>
                    <center><select name="id"> <?php 
                       echo $cat->mostrar_categorias();
                    ?></select>
                    <center><input type="text" id="nombre" name="nombre" placeholder="Nombre Categoria"><br>
                    <center><input type="text" id="id_categoria" name="id_categoria" placeholder="ID Categoria"><br>
                    <center><button id="boton" type="submit">Modificar</button></center>
                </form>
            </div>
        </div>
        <!-- Eliminar --->
        <div class="ventana-sistema" id="VEliminar">
            <div class="content w3-animate-zoom">
                <form action="../Backend/deleteC.php" id="3f" method="post">
                    <h2>Eliminar Categoria</h2>
                    <center><select name="id"> <?php 
                       echo $cat->mostrar_categorias();
                    ?></select>
                    <center><button id="boton" type="submit">Eliminar</button></center>
                </form>
            </div>
        </div>
        <!-- Mostrar --->
        <div class="ventana-sistema" id="VListar">
        <div class="content w3-animate-zoom">
        <form action="container" id="table">
        <table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Id Categoria</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"></th>
      <td> <?php echo $cat->mostrar_categorias();?></td>
      <td> <?php echo $cat->mostrarID();?></td>
      <td></td>
    </tr>
    <tr>

    
  </tbody>
</table>
        </div>
        </form>
        

    <script src="../js/scriptCrud.js"></script>
</body>

</html>