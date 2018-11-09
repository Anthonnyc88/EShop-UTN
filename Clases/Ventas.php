<?php
//Se importa la clase conexion hacia la clase productos para asi trabajar en manera simultania
include "../Backend/Conexion.php";
//Se crea Clase Ventas con sus respectivos atributos publicos

class Ventas{
    public $id_Venta;
    public $fecha_Compra;
    public $cantidad_Items;
    public $descripcion;
    public $precio;
    public $total_compra;



    //Metodo Constructor de la clase Ventas
    function __construct($id_Venta,$fecha_Compra,$cantidad_Items,$descripcion,$precio,$total_compra){
        $this->id_Venta= $id_Venta;
        $this->fecha_Compra=$fecha_Compra;
        $this->cantidad_Items= $cantidad_Items;
        $this->descripcion=$descripcion;
        $this->precio= $precio;
        $this->total_Compra= $total_compra;


    }

    //Funcion que registra una venta
    function registrar_Venta(){
        $conexion = Conexion();
        $sql = "INSERT INTO tbl_Ventas(id_Venta,fecha_Compra,cantidad_Items,descripcion,precio,total_compra)VALUES('$this->id_Venta','$this->fecha_Compra','$this->cantidad_Items','$this->descripcion','$this->precio','$this->total_Compra')";
        $conexion->query($sql);
       echo"<script type=\"text/javascript\">alert('Registro Exitoso'); window.location='../php/process';</script>";
    }  



}