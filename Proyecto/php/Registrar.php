<?php 
include "Persona.php";
 if(isset($_POST)){
    $username = $_POST["username"];
    $contrasena = $_POST["contrasena"];
    $nombre = $_POST["nombre"];
    $id = $_POST["id"];
    $apellido_1 = $_POST["apellido_1"];
    $apellido_2 = $_POST["apellido_2"];
    $telefono = $_POST["telefono"];
    $correo = $_POST["correo"];
    $direccion = $_POST["direccion"];
    $clase = new Personas($username,$contrasena,$nombre,$id,$apellido_1,$apellido_2,$telefono,$correo,$direccion);
    $clase->registrar_Persona();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Registro exitoso</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="../css/sty"></script>
</head>
<body>
    <h1>Registro exitoso Sarapiqui</h1>
</body>
</html>