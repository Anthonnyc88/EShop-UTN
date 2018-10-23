<?php

//Se importa la clase conexion hacia la clase Producto para asi trabajar en manera simultania
include "Conexion.php";


//Se crea Clase Producto con sus respectivos atributos publicos
class Producto{
    public $sku;
    public $nombre;
    public $descripcion;
    public $imagen;
    public $categoria;
    public $stock;
    public $precio;

   //Metodo Constructor de la Clase Producto
    function __construct($sku,$nombre,$descripcion,$imagen,$categoria,$stock,$precio){
        $this->sku=$sku;
        $this->nombre=$nombre;
        $this->descripcion=$descripcion;
        $this->imagen=$imagen;
        $this->categoria=$categoria;
        $this->stock=$stock;
        $this->precio=$precio;

    }
    //Funcion que agrega productos hacia la base de datos de productos
    function agregar_Producto(){
        $conexion = Conexion();
        $sql = "INSERT INTO productos(sku,nombre,descripcion,imagen,categoria,stock,precio) VALUES('$this->sku','$this->nombre','$this->descripcion','$this->imagen','$this->categoria','$this->stock','$this->precio')";
        $conexion->query($sql);

    }
    //Funcion que elimina productos hacia la base de datos de productos     
    function eliminar_Producto(){
        $conexion=Conexion();
        $sql = "DELETE FROM productos WHERE sku = '$this->sku';";
        $conexion->query($sql);

    }
    //Funcion que modifica productos hacia la base de datos de productos         
    function modificar_Producto($identificador){
        $conexion=Conexion();
        $sql = "UPDATE productos SET sku = '$this->sku', nombre = '$this->nombre', descripcion = '$this->descripcion', imagen = '$this->imagen', id_categoria = '$this->categoria', stock = '$this->stock', precio = '$this->precio' WHERE id = '$identificador';";
        $conexion->query($sql);

    }
}

?>