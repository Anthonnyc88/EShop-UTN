<?php
//Esta clase verifica si el usuario ingresa todos los datos requeridos
//Oh si los datos que el ingresa como el nombre de usuario que no se puede repetir
//verifica que no se repitan
    include "../Clases/Persona.php";
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
        if(isset($_POST)){
        $username = $_POST["username"];
        $nombre = $_POST["nombre"];
        $id = $_POST["id"];
        $apellido_1 = $_POST["apellido_1"];
        $apellido_2 = $_POST["apellido_2"];
        $telefono = $_POST["telefono"];
        $correo = $_POST["correo"];
        $direccion = $_POST["direccion"];
        if($username=="" or $nombre=="" or $apellido_1=="" or $apellido_2=="" or $telefono=="" or $correo=="" or $direccion==""){
            echo"<script type=\"text/javascript\">alert('Llenar todos los campos'); window.location='../Vista/Registrarse.php';</script>";
        }else{
            $clase = new Personas($username,$nombre,$id,$apellido_1,$apellido_2,$telefono,$correo,$direccion);
            $clase->registrar_Persona();
        }
        }
        }else{
            echo"<script type=\"text/javascript\">alert('Este nombre de usuario ya a sido utilizado'); window.location='../Vista/Registrarse.php';</script>";
            //"Existe por lo tanto se devuelve a registrar nuevamente";
            //echo"<script>alert('No Registrado')</script>";
            //header("Location: ../Vista/Registrarse.html");
        }
    }

?>
