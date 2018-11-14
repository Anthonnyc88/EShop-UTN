<?php 
session_start();
    //require "../Backend/Conexion.php";


    if(!$_SESSION){
        header("Location: index.php");
    }


    require "../Cliente/index.php";

    ?>