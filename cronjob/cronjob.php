<?php
        //Compartiendo desde la clase conexion
        require "../Backend/Conexion.php";
        //Conexion a mi base de datos
        Cronjob();
        //Aqui mostraremos una ves traida la informacion de la base de datos,
        //con la siguiente consulta 
        //Conexion
        $conexion = Conexion();
        //Consulta
        $sql = "SELECT * FROM tbl_productos WHERE stock <= :stock;";
        //datos 
        $info2 = $conexion->prepare($sql); 
        //Ingresar en primer dato
        $info2->execute(array('stock' => $argv[1]));
        $Productos = $info2->fetchAll();
        //Correo al que le vamos a enviar la consulta de los productos
        $correo = "gabrielqqquesada@gmail.com";
         //Primeros datos
        $subject = "Productos Stock:";
        $Archivo = "Productos       Nombre P         Stock P          Precio P          Descripcion P \r\n";
        foreach($Productos as $Datos){
            $Archivo .= $Datos["sku"] . "             " .  $Datos["nombre"] . "                " .  $Datos["stock"] . "              " .  $Datos["precio"] . "                                    " . $Datos["descripcion"] ."\r\n";
        }
        $CorreoA = "From: leguelan@gmail.com";
        mail($correo,$subject,$Archivo,$CorreoA); 
?>