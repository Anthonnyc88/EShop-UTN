<?php
require "../Backend/Conexion.php";
//Estas funciones nos van a servir para el area de Estadisticas del administrador
// Consulta de la Cantidad de Clientes Registrados
function Cantidad_Clientes(){
    $conexion = conexion();
    $sql = "SELECT count(*) AS user FROM user_info WHERE user='cliente';";
    $info2 = $conexion->prepare($sql); 
    $info2->execute();
    $info = $info2->fetch();
    echo $usuarios = $info["user"];
}

    //Cantidad de productos vendidos    
    function cantidad_Productos(){
        $conexion = conexion();
        $sql =  "SELECT count(*) AS id FROM cart";
        $info2 = $conexion->prepare($sql); 
        $info2->execute();
        $info = $info2->fetch();
        echo $productos = $info["id"];
    }
    //Monto total de ventas.
    function monto_Ventas(){
        $conexion = conexion();
        $sql = "SELECT SUM('p.precio') AS total FROM ventas AS v INNER JOIN productos AS p ON p.id_producto = v.id_producto;";
        $info2 = $conexion->prepare($sql); 
        //$info2->execute();
        //$info = $info2->fetch();
       // echo $productos = $info;
        }
        function Cronjob(){
           
    }
       

?>