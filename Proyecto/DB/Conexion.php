<?php
//Función que crea la conexion con la base datos MySQL
    function Conexion(){
        try{
            $conexion = new PDO("mysql:host=localhost;dbname=proyecto","root","");
            return $conexion;
        }catch(PDOException $e){
            echo "Error: " . $e->getMessage();
            die();  
        }
    }
?>