<?php 
//En esta clase se obtiene los datos desde el formulario de registro y se llevan a la funcion registrar_persona

include "../Clases/Persona.php";
 if(isset($_POST)){
    $username = $_POST["username"];
    $nombre = $_POST["nombre"];
    $id = $_POST["id"];
    $apellido_1 = $_POST["apellido_1"];
    $apellido_2 = $_POST["apellido_2"];
    $telefono = $_POST["telefono"];
    $correo = $_POST["correo"];
    $direccion = $_POST["direccion"];
    $clase = new Personas($username,$nombre,$id,$apellido_1,$apellido_2,$telefono,$correo,$direccion);
    $clase->registrar_Persona();
}
