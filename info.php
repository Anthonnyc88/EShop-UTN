<?php

    if(isset($_POST)){
        $name = $_POST["nombre"];
        $lastname = $_POST["apellido"];
        $id = $_POST["edad"];
        $correo = $_POST["id"];

        try{
            $conexion = new PDO("mysql:host=localhost;dbname=mbd","root","");
        }catch(PDOException $e){
            echo "Error: " . $e->getMessage();
            die();  
        }

        $sql = "INSERT INTO mysql VALUES('$name', '$lastname', '$id', '$correo')";
        $conexion->query($sql);
        echo "Nuevo Estudiante Agregado!";

    }

?>