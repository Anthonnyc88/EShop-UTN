<?php
require "Clases/Persona.php";

//Función que obtiene los datos desde el formulario de registro
function obtener_DatosPost(){
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
        $clase = new Personas($username,$contrasena,$nombre,$id,$ap4,$apellido_2,$telefono,$correo,$direccion);
        $clase->registrar_Persona();

}

}

?>