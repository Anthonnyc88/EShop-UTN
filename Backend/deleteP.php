<?php 
include "../Vista/Productos.php";
/*En esta clase elimina la categoria escogida por 
el Administrador y se mandan a la clase Categorias.php a la funcion eliminar*/
//Esta variable obtiene el valor seleccionado del combobox y lo lleva a dicha funcion
$sku= $_POST["sku"];
$nombre= $_POST["sku"];
$descripcion= $_POST["sku"];
$imagen= $_POST["sku"];
$stock= $_POST["sku"];
$precio= $_POST["sku"];
$id= $_POST["sku"];
$clase = new Productos($sku,$nombre,$descripcion,$imagen,$stock,$precio,$id,$nom_categoria);
$clase->eliminar_Productos();

?>