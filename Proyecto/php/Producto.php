<?php

//Se importa la clase conexion hacia la clase Producto para asi trabajar en manera simultania
include "php/Conexion.php";


//Se crea Clase Cliente con sus respectivos atributos publicos
class Producto{
    public $sku;
    public $nombre;
    public $descripcion;
    public $imagen;
    public $stock;
    public $precio;

 //Metodo Constructor de la Clase Producto
    function __construct($sku,$nombre,$descripcion,$imagen,$stock,$precio){
        $this->sku=$sku;
        $this->nombre=$nombre;
        $this->descripcion=$descripcion;
        $this->imagen=$imagen;
        $this->stock=$stock;
        $this->precio=$precio;

    }
}

?>