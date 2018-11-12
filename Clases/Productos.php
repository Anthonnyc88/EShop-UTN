<?php
//Se importa la clase conexion hacia la clase productos para asi trabajar en manera simultania
include "../Backend/Conexion.php";
//Se crea Clase productos con sus respectivos atributos publicos

class Productos{
    public $sku;
    public $nombre;
    public $descripcion;
    public $imagen;
    public $stock;
    public $precio;
    public $id;
    public $nom_categoria;



    //Metodo Constructor de la clase productos
    function __construct($sku,$nombre,$descripcion,$imagen,$stock,$precio,$id,$nom_categoria){
        $this->sku= $sku;
        $this->nombre=$nombre;
        $this->descripcion=$descripcion;
        $this->imagen= $imagen;
        $this->stock= $stock;
        $this->precio= $precio;
        $this->id= $id;
        $this->nom_categoria= $nom_categoria;
    }

    //Función que registra una productos al sistema y se guardara en una base de datos
    function registrar_Productos(){
        $conexion = Conexion();
        $sql = "INSERT INTO tbl_productos(sku,nombre,descripcion,imagen,stock,precio,id,nom_categoria)VALUES('$this->sku','$this->nombre','$this->descripcion','$this->imagen','$this->stock','$this->precio','$this->id','$this->nom_categoria')";
        $conexion->query($sql);
       echo"<script type=\"text/javascript\">alert('Registro Exitoso'); window.location='../Vista/Productos.php';</script>";
    }  
        
    //Funcion que elimina productos hacia la base de datos de productos     
   //Se crea una tercera varible que se utiliza tanto para  verficar, modificar, y eliminar la infomacion que se encuentre en la base de datos         
    function eliminar_Productos(){
        $conexion = Conexion(); 
        $sql = "DELETE FROM tbl_productos WHERE sku = '$this->sku';";      
        $conexion->query($sql);
        echo"<script type=\"text/javascript\">alert('producto Eliminado'); window.location='../Vista/Productos.php'; </script>";
    }
    //Funcion que modifica las Categorias hacia la base de datos de productos 
    //Se crea una tercera varible que se utiliza tanto para  verficar, modificar, y eliminar la infomacion que se encuentre en la base de datos         
    function modificar_Productos(){
        $conexion = Conexion();
        $sql = "UPDATE tbl_productos SET sku = '$this->id', nombre = '$this->nombre', descripcion = '$this->descripcion', imagen = '$this->imagen', stock = '$this->stock', precio = '$this->precio',nom_categoria = '$this->nom_categoria' WHERE sku = '$this->sku';";
        $conexion->query($sql);
        echo"<script type=\"text/javascript\">alert('producto modificado'); window.location='../Vista/Productos.php'; </script>";
        //header("Location=../Vista/Productos.php?signup=char");
        exit();
    }
    //Modificar solo el nombre del producto
    function modificar_nombre(){
        $conexion = Conexion();
        $sql = "UPDATE tbl_productos SET nombre = '$this->nombre' WHERE sku = '$this->sku';";
        $conexion->query($sql);
        echo"<script type=\"text/javascript\">alert('Nombre modificado'); window.location='../Vista/Productos.php'; </script>";
        exit();
    }
    //Modificar solo el sku del producto
    function modificar_sku(){
        $conexion = Conexion();
        $sql = "UPDATE tbl_productos SET sku = '$this->id' WHERE sku = '$this->sku';";
        $conexion->query($sql);
        echo"<script type=\"text/javascript\">alert('Sku'); window.location='../Vista/Productos.php'; </script>";
        exit();
    }
    //Modificar solo el descripcion del producto
    function modificar_descripcion(){
        $conexion = Conexion();
        $sql = "UPDATE tbl_productos SET descripcion = '$this->descripcion' WHERE sku = '$this->sku';";
        $conexion->query($sql);
        echo"<script type=\"text/javascript\">alert('Descripcion '); window.location='../Vista/Productos.php'; </script>";
        exit();
    }
    //Modificar solo el imagen del producto
    function modificar_imagen(){
        $conexion = Conexion();
        $sql = "UPDATE tbl_productos SET imagen = '$this->imagen' WHERE sku = '$this->sku';";
        $conexion->query($sql);
        echo"<script type=\"text/javascript\">alert('Imagen'); window.location='../Vista/Productos.php'; </script>";
        exit();
    }
    //Modificar solo el sstock del producto
    function modificar_stock(){
        $conexion = Conexion();
        $sql = "UPDATE tbl_productos SET stock = '$this->stock' WHERE sku = '$this->sku';";
        $conexion->query($sql);
        echo"<script type=\"text/javascript\">alert('Stock'); window.location='../Vista/Productos.php'; </script>";
        exit();
    }
    //Modificar solo el precio del producto
    function modificar_precio(){
        $conexion = Conexion();
        $sql = "UPDATE tbl_productos SET   precio = '$this->precio' WHERE sku = '$this->sku';";
        $conexion->query($sql);
        echo"<script type=\"text/javascript\">alert('Precio'); window.location='../Vista/Productos.php'; </script>";
        exit();
    }
    //Modificar solo la categoria del producto
    function modificar_nom_categoria(){
        $conexion = Conexion();
        $sql = "UPDATE tbl_productos SET nom_categoria = '$this->nom_categoria' WHERE sku = '$this->sku';";
        $conexion->query($sql);
        echo"<script type=\"text/javascript\">alert('Categoria modificada'); window.location='../Vista/Productos.php'; </script>";
        exit();
    }             
    //<-------------MOSTRAR---------->
    //Funcion que muestra los datos en donde se seleccione en el combobox
    public function mostrar_Productos(){
        $conexion = Conexion();
        $sql="SELECT * from tbl_productos";       
            foreach ($conexion->query($sql) as $row){
               echo "<option value='{$row ['sku']}'>{$row ['nombre']}</option>";      
            }
        }
    //Mostrar el nombre del producto
    public function mostrar_Nombre(){
        $conexion = Conexion();
        $sql="SELECT * from tbl_productos";       
            foreach ($conexion->query($sql) as $row){
                echo "<option value='{$row ['sku']}'>{$row ['nombre']}</option>";      
            }
        }
    //Mostrar sku del producto
    public function mostrar_Sku(){
        $conexion = Conexion();
        $sql="SELECT * from tbl_productos";       
            foreach ($conexion->query($sql) as $row){
                echo "<option value='{$row ['sku']}'>{$row ['sku']}</option>";      
            }
        }
    //Mostrar la descripcion del producto
    public function mostrar_Descripcion(){
        $conexion = Conexion();
        $sql="SELECT * from tbl_productos";       
            foreach ($conexion->query($sql) as $row){
                echo "<option value='{$row ['sku']}'>{$row ['descripcion']}</option>";      
            }
        }
    //Mostrar solamente el stock del producto    
    public function mostrar_Stock(){
        $conexion = Conexion();
        $sql="SELECT * from tbl_productos";       
            foreach ($conexion->query($sql) as $row){
                echo "<option value='{$row ['sku']}'>{$row ['stock']}</option>";      
            }
        }
    //Mostrar solamente el precio del producto    
    public function mostrar_precio(){
        $conexion = Conexion();
        $sql="SELECT * from tbl_productos";       
            foreach ($conexion->query($sql) as $row){
                echo "<option value='{$row ['sku']}'>{$row ['precio']}</option>";      
            }
        }
    //Mostrar solamente el nombre de la categoria a la que esta asociada
    public function mostrar_nom_cat(){
    $conexion = Conexion();
    $sql="SELECT * from tbl_productos";       
        foreach ($conexion->query($sql) as $row){
            echo "<option value='{$row ['sku']}'>{$row ['nom_categoria']}</option>";      
        }
    }     
    //Mostrar las categorias en el combobox
    public function mostrar_categorias(){
        $conexion = Conexion();
        $sql="SELECT * from tbl_categoria";       
            foreach ($conexion->query($sql) as $row){
                echo "<option value='{$row ['nombre']}'>{$row ['nombre']}</option>";      
            }
        }

    }

?>