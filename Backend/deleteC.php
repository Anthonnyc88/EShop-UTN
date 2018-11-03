<?php 
require "../Vista/Categoria.php";
/*En esta clase elimina la categoria escogida por 
el Administrador y se mandan a la clase Categorias.php a la funcion eliminar*/
//Esta variable obtiene el valor seleccionado del combobox y lo lleva a dicha funcion
$id = $_POST["id"];
$nombre=$_POST["id"];
$id_categoria = $_POST["id"];
$clase = new Categoria($nombre,$id_categoria,$id);
$clase->eliminar_Categoria();

?>