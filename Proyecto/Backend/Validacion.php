<?php
    require "Conexion.php";
    $errores = "";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $bool=true;
        $username = filter_var($_POST["username"],FILTER_SANITIZE_STRING);
        $conexion = Conexion();
        $sql = "SELECT * FROM personas WHERE username = :username;";
        $info2 = $conexion->prepare($sql); 
        $info2->execute(array(':username' => $username));
        $info = $info2->fetch();
        if($info === false){
            //"No existe por lo SI SE REGISTRA Y LO DEVUELVE AL AREA DE LOGEO";
            //header("Location: ../Vista/Login.html");
         //echo"<script>alert('Registrado')</script>";
         //echo"<script type=\"text/javascript\">alert('El nombre ingresado no existe continuar'); window.location='';</script>";
                
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
        }else{
            echo"<script type=\"text/javascript\">alert('El nombre ingresado ya existe vuelva a ingrasar otro nombre de usuario'); window.location='../Vista/Registrarse.html';</script>";
            //"Existe por lo tanto se devuelve a registrar nuevamente";
            //echo"<script>alert('No Registrado')</script>";
            //header("Location: ../Vista/Registrarse.html");
        }
    }

?>
