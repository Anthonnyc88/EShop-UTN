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
        
        if($username=="" or $correo==""){
            echo"<script type=\"text/javascript\">alert('Llenar todos los espacios'); window.location='../Vista/login.php';</script>";

        }else{
           
                if($info === false){
                    $errores .= "<li>El Usuario no existe o la información es Incorrecta!</li>";
                    echo"<script type=\"text/javascript\">alert('El Usuario no existe o la información es Incorrecta'); window.location='../Vista/login.php';</script>";
            }else{
                if($username=="Admin"){
                    echo"<script type=\"text/javascript\">alert('Inicio sesion exitoso'); window.location='../Vista/Admin.php';</script>";
                    //header("../Vista/Admin.html");
                }
               // header("../php/index.php");
                echo"<script type=\"text/javascript\">alert('Inicio sesion exitoso'); window.location='../php/index.php';</script>";

            }

        }
    }
    
?>