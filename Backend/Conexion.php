<?php
//Función que crea la conexion con la base datos MySQL
    function Conexion(){
        try{
            $conexion = new PDO("mysql:host=localhost;dbname=proyecto","root","");
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conexion;
        }catch(PDOException $e){
            echo "Error: " . $e->getMessage();
            die();  
        
        }
    } 
?>