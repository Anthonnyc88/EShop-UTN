<?php 
//En esta clase se obtiene los datos desde el formulario de registro y se llevan a la funcion ingresar categoria
    $errores = "";
    $conexion = new PDO("mysql:host=localhost;dbname=proyecto","root","");
    //Validamos si el nombre que ingresa ya existe
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $nombre = filter_var($_POST["nombre"],FILTER_SANITIZE_STRING);
        $id_categoria = filter_var($_POST["id_categoria"],FILTER_SANITIZE_STRING);
        $sql = "SELECT * FROM tbl_categoria WHERE nombre = :nombre or id_categoria = :id_categoria;";
        $info2 = $conexion->prepare($sql); 
        $info2->execute(array(':nombre' => $nombre,':id_categoria' => $id_categoria));
        $info = $info2->fetch();
        if($info === false){
            include "../Vista/Categoria.php";
            $nombre = $_POST["nombre"];
            $id_categoria = $_POST["id_categoria"];
            $id = $_POST["id_categoria"];
            //Validamos si algun campo  quedo basido a la hora de ingresar datos
            if($nombre=="" or $id_categoria==""){
                echo"<script type=\"text/javascript\">alert('Llenar todos los campos'); window.location='../Vista/Categoria.php';</script>";
            }else{
                $clase = new Categoria($nombre,$id_categoria,$id);
                $clase->registrar_Categoria();
            }
        }else{
            echo"<script type=\"text/javascript\">alert('Ya existe este nombre o id ingresados'); window.location='../Vista/Categoria.php';</script>";
        }
}
?>















































<?php
    //  if(isset($_POST)){
//     $form = $_POST["1f"];
//     $form = $_POST["2f"];
//     $form = $_POST["3f"];
//     if($form == "1f"){
//         $nombre = $_POST["nombre"];
//         $id_categoria = $_POST["id_categoria"];
//         $id;
//         $clase = new Categoria($nombre,$id_categoria,$id);
//         $clase->registrar_Categoria();
//     }elseif($form ="2f"){
//         $id = $_POST["id"];
//         $nombre=$_POST["nombre"];
//         $id_categoria = $_POST["id_categoria"];
//         $clase = new Categoria($nombre,$id_categoria,$id);
//         $clase->modificar_Categoria();
//     }elseif($form ="3f"){
//         $nombre = $_POST["nombre"];
//         $clase = new Categoria($nombre);
//         $clase->eliminar_Categoria();
//     }
    
// }?>