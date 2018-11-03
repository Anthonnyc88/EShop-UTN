<?php
//Se importa la clase conexion hacia la clase Categorias para asi trabajar en manera simultania
include "../Backend/Conexion.php";
//Se crea Clase Categorias con sus respectivos atributos publicos

class Categoria{
    public $nombre;
    public $id_categoria;
    public $id;

    //Metodo Constructor de la clase Categoria
    function __construct($nombre,$id_categoria,$id){
        $this->nombre= $nombre;
        $this->id_categoria=$id_categoria;
        $this->id=$id;
    }

    //Función que registra una categoria al sistema y se guardara en una base de datos
    function registrar_Categoria(){
        $conexion = Conexion();
        $sql = "INSERT INTO tbl_categoria(nombre,id_categoria)VALUES('$this->nombre','$this->id_categoria')";
        $conexion->query($sql);
        echo"<script type=\"text/javascript\">alert('Registro Exitoso'); window.location='../Vista/Categoria.php';</script>";
    }  
        
    //Funcion que elimina categorias hacia la base de datos de productos     
   //Se crea una tercera varible que se utiliza tanto para  verficar, modificar, y eliminar la infomacion que se encuentre en la base de datos         
    function eliminar_Categoria(){
        $conexion = Conexion(); 
        $sql = "DELETE FROM tbl_categoria WHERE id_categoria = '$this->id';";      
        $conexion->query($sql);
        echo"<script type=\"text/javascript\">alert('Catalogo Eliminado'); window.location='../Vista/Categoria.php'; </script>";
    }
    //Funcion que modifica las Categorias hacia la base de datos de productos 
    //Se crea una tercera varible que se utiliza tanto para  verficar, modificar, y eliminar la infomacion que se encuentre en la base de datos         
    function modificar_Categoria(){
        $conexion = Conexion();
        $sql = "UPDATE tbl_categoria SET id_categoria = '$this->id_categoria', nombre = '$this->nombre' WHERE id_categoria = '$this->id';";
        $conexion->query($sql);
        echo"<script type=\"text/javascript\">alert('Modificacion Exitosa'); window.location='../Vista/Categoria.php';</script>";
    }
    //Funcion que muestra los datos en donde se seleccione 
    public function mostrar_categorias(){
        $conexion = Conexion();
        $sql="SELECT * from tbl_categoria";       
            foreach ($conexion->query($sql) as $row){
               echo "<option value='{$row ['id_categoria']}'>{$row ['nombre']}</option>";      
            }
        }
    }



?>