<?php session_start();
    if($_SESSION["usuario"] != "Admin@gmail.com"){
        header("Location: error.php");
    }
    
    require "../Vista/Admin.php";
?>