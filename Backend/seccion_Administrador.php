<?php session_start();
    if($_SESSION["usu"] != "Admin@gmail.com"){
        header("Location: error.php");
    }
    
    require "../Vista/Admin.php";
?>