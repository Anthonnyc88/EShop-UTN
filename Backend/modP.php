<?php
/*En esta clase se resiven por los datos ingresados y escogidos por 
el Administrador y se mandan a la clase Categorias a la funcion Modificar*/        
include "../Vista/Productos.php";
        
        $errores = "";
        //Validamos si el nombre que ingresa ya existe
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $nombre = filter_var($_POST["nombre"],FILTER_SANITIZE_STRING);
            $sku = filter_var($_POST["sku"],FILTER_SANITIZE_STRING);
            $conexion = Conexion();
            $sql = "SELECT * FROM tbl_productos WHERE nombre = :nombre or sku = :sku;";
            $info2 = $conexion->prepare($sql); 
            $info2->execute(array(':nombre' => $nombre,':sku' => $sku));
            $info = $info2->fetch();
            if($info === false){
            //Una vez validado verificamos si los campos estan llenos
            if(isset($_POST['modificar'])){
                $archivo=$_FILES['imagen']['tmp_name'];
                $destino="../img/".$_FILES['imagen']['name'];
                move_uploaded_file($archivo,$destino);
            }
            $sku= $_POST["id"];
            $nombre= $_POST["nombre"];
            $descripcion= $_POST["descripcion"];
            $imagen= $destino;
            $stock= $_POST["stock"];
            $precio= $_POST["precio"];         
            $id="0";
            //Finalmente le mandamos los datos a la funcion
            $clase = new Productos($sku,$nombre,$descripcion,$imagen,$stock,$precio,$id);
            $clase->modificar_Productos();
            }
        }else{
            echo"<script type=\"text/javascript\">alert('Ya existe este nombre o sku, vuelva a ingresar otro.'); window.location='../Vista/Productos.php';</script>";
        }
        
        ?>

    

