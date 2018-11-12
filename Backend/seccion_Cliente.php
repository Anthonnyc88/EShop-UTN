<?php session_start();
    
    require "conexion.php";
    if(!$_SESSION){
        header("Location: Inicio_sesion.php");
    }
    $conexion = conexion();
    $sql = "SELECT nombre FROM personas WHERE correo = :correo;";
    $info2 = $conexion->prepare($sql); 
    $info2->execute(array(':correo' => $_SESSION["usu"]));
    $nombre = $info2->fetch();
    
    require "../Cliente/index.php";