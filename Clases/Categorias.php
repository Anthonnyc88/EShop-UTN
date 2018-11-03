<?php
//Se importa la clase conexion hacia la clase Categorias para asi trabajar en manera simultania
include "Conexion.php";
//Se crea Clase Categorias con sus respectivos atributos publicos

class Categoria{
    public $identificador_Categoria;
    public $nombre_Categoria;

    //Metodo Constructor de la clase Categoria
    function __construct($identificador_Categoria, $nombre_Categoria){
        $this->identificador_Categoria= $identificador_Categoria;
        $this->nombre_Categoria= $nombre_Categoria;
    }

    //Función que registra una categoria al sistema y se guardara en una base de datos
    function registrar_Categoria(){
        $conexion = Conexion();
        $sql = "INSERT INTO categorias(identificador_Categoria,nombre_Categoria) VALUES('$this->identicador_Categoria','$this->nombre_Categoria')";
        $conexion->query($sql);
        }  
        
    //Funcion que elimina categorias hacia la base de datos de productos     
    function eliminar_Categoria(){
        $conexion = Conexion(); 
        $sql = "DELETE FROM categorias WHERE identificador_Categoria = '$this->identificador_Categoria';";      
        $conexion->query($sql);

    }
    //Funcion que modifica las Categorias hacia la base de datos de productos         
    function modificar_Categoria($identificador){
        $conexion = Conexion();
        $sql = "UPDATE categorias SET identificador_Categoria = '$this->identificador_Categoria', nombre_Categoria = '$this->nombre_Categoria' WHERE identificador = '$identificador';";
        $conexion->query($sql);

    }

}

?>