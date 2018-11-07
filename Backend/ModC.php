<?php
/*En esta clase se resiven por los datos ingresados y escogidos por 
el Administrador y se mandan a la clase Categorias a la funcion Modificar*/        
require "../Clases/Categorias.php";
        
        $errores = "";
        //Validamos si el nombre que ingresa ya existe
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $nombre = filter_var($_POST["nombre"],FILTER_SANITIZE_STRING);
            $id_categoria = filter_var($_POST["id_categoria"],FILTER_SANITIZE_STRING);
            $conexion = Conexion();
            $sql = "SELECT * FROM tbl_categoria WHERE nombre = :nombre or id_categoria = :id_categoria;";
            $info2 = $conexion->prepare($sql); 
            $info2->execute(array(':nombre' => $nombre,':id_categoria' => $id_categoria));
            $info = $info2->fetch();
            if($info === false){
            //Una vez validado verificamos si los campos estan llenos
            $id = $_POST["id"];
            $nombre=$_POST["nombre"];
            $id_categoria = $_POST["id_categoria"];
            if($nombre=="" or $id_categoria==""){
            echo"<script type=\"text/javascript\">alert('Llenar todos los campos'); window.location='../Vista/Categoria.php';</script>";
                }else{
            //Finalmente le mandamos los datos a la funcion
            $clase = new Categoria($nombre,$id_categoria,$id);
            $clase->modificar_Categoria();
            }
        }else{
            echo"<script type=\"text/javascript\">alert('Ya existe este nombre o di, vuelva a ingresar otro.'); window.location='../Vista/Categoria.php';</script>";
        }
        }
        ?>

    

