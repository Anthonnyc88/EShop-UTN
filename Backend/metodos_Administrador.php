<?php
require "../Backend/Conexion.php";
$cantidad = new Orden("created","id","id_persona","modified","precio_total","satus");

class Orden{
    public $created;
    public $id;
    public $id_persona;
    public $modified;
    public $precio_total;
    public $status;
    //Metodo Constructor de la clase Orden
    function __construct($created,$id,$id_persona,$modified,$precio_total,$status){
        $this->created= $created;
        $this->id=$id;
        $this->id_persona=$id_persona;
        $this->modified= $modified;
        $this->precio_total= $precio_total;
        $this->status= $status;
    }



//Estas funciones nos van a servir para el area de Estadisticas del administrador
// Consulta de la Cantidad de Clientes Registrados
    public function cantidad_Clientes(){
        $conexion = Conexion();
        $sql = ("Select count(*) from personas WHERE usu='cliente'");
        $conexion->query($sql);
        echo $sql;
    }

    //Cantidad de productos vendidos
    public function cantidad_Productos(){
        $conexion = Conexion();
        $slq="SELECT count('*') from orden WHERE status ";
        $conexion->query($sql);
    }

    //Monto total de ventas.
    function monto_Ventas(){

    }
}
?>