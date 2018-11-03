<?php
    require "../Backend/Conexion.php";
    $errores = "";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = filter_var($_POST["username"],FILTER_SANITIZE_STRING);
        $correo=$_POST["correo"];
        $conexion = Conexion();
        $sql = "SELECT * FROM personas WHERE username = :username AND correo = :correo;";
        $info2 = $conexion->prepare($sql); 
        $info2->execute(array(':username' => $username,':correo' => $correo));
        $info = $info2->fetch();
        if($info === false){
            $errores .= "<li>El Usuario no existe o la información es Incorrecta!</li>";
            echo "No Existe";
        }else{
            echo"Existe";
            //header();
        }
    }

?>