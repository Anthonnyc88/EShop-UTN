<?php
require "../Backend/Conexion.php";

//Estas funciones nos van a servir para el area de Estadisticas del administrador


// Consulta de la Cantidad de Clientes Registrados
function cantidad_Clientes(){
    $conexion = Conexion();
    $sql = ("Select count(*) from personas where usu='cliente'");
    $conexion->query($sql);
}

//Cantidad de productos vendidos
function cantidad_Productos(){
    $conexion = Conexion();
    $slq=("Select count(*) from orden where id ");
    $conexion->query($sql);
    

}

//Monto total de ventas.
function monto_Ventas(){

}

?>