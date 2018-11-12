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
            //Si da false es que no esta ni el nombre ni el sku repetidos
            if($info === false){
           /*aqui se verifica la imagen, aqui se trae la imagen de donde la 
           seleccione el administrador, hasta la carpeta img que contiene el proyecto*/
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
            $id=$_POST["sku"]; 
            $nom_categoria=$_POST["nom_categoria"];
             //Una vez validado si existe el mismo nombre o Sku, verificamos los campos para modificar
             //Modificamos solo la Categoria

            if(Empty($nombre) and Empty($descripcion) and Empty($stock) and Empty($precio) and Empty($id)){
                $clase = new Productos($sku,$nombre,$descripcion,$imagen,$stock,$precio,$id,$nom_categoria);
                $clase->modificar_nom_categoria();
            }
            if(Empty($nombre) and Empty($descripcion) and Empty($stock) and Empty($precio)){
                $clase = new Productos($sku,$nombre,$descripcion,$imagen,$stock,$precio,$id,$nom_categoria);
                $clase->modificar_sku();
            }
            if(Empty($id) and Empty($descripcion) and Empty($stock) and Empty($precio)){
                $clase = new Productos($sku,$nombre,$descripcion,$imagen,$stock,$precio,$id,$nom_categoria);
                $clase->modificar_nombre();
            }
            if(Empty($id) and Empty($nombre) and Empty($stock) and Empty($precio)){
                $clase = new Productos($sku,$nombre,$descripcion,$imagen,$stock,$precio,$id,$nom_categoria);
                $clase->modificar_descripcion();
            }
            if(Empty($id) and Empty($nombre) and Empty($descripcion) and Empty($precio)){
                $clase = new Productos($sku,$nombre,$descripcion,$imagen,$stock,$precio,$id,$nom_categoria);
                $clase->modificar_stock();
            }
            if(Empty($id) and Empty($nombre) and Empty($descripcion) and Empty($stock)){
                $clase = new Productos($sku,$nombre,$descripcion,$imagen,$stock,$precio,$id,$nom_categoria);
                $clase->modificar_precio();
            }
            /*else{
                //Finalmente le mandamos los datos a la funcion
                $clase = new Productos($sku,$nombre,$descripcion,$imagen,$stock,$precio,$id,$nom_categoria);
                $clase->modificar_Productos();
            }*/
        }else{
            echo"<script type=\"text/javascript\">alert('Ya existe este nombre o sku, vuelva a ingresar otro.'); window.location='../Vista/Productos.php';</script>";
        }
    }
        
        ?>

    

