/*
Esta clase de js lo que hace es que se despleguen los form de cada crud,
cuando toquemos un boton ya sea agregar modificar y eliminar este desplegará el form 
en donde se agrega modifica o se elimina. 
*/

//estas son las variables que adquieren el id de las clases en donde estan los form de los cruds
var ventanaAgregar = document.getElementById("VAgregar");
var ventanaModificar = document.getElementById("VModificar");
var ventanaEliminar = document.getElementById("VEliminar");
var ventanaListar = document.getElementById("VListar");


//esta funcion pone visible al que seleccione y oculta los que no se han seleccionado
function Agregar() {
    ventanaAgregar.style.display = 'block'
    ventanaModificar.style.display = 'none';
    ventanaEliminar.style.display = 'none';
    ventanaListar.style.display = 'none';


}
//esta funcion pone visible al que seleccione y oculta los que no se han seleccionado
function Modificar() {
    ventanaModificar.style.display = 'block'
    ventanaListar.style.display = 'none';
    ventanaEliminar.style.display = 'none';
    ventanaAgregar.style.display = 'none';
}
//esta funcion pone visible al que seleccione y oculta los que no se han seleccionado
function Eliminar() {
    ventanaEliminar.style.display = 'block'
    ventanaListar.style.display = 'none';
    ventanaAgregar.style.display = 'none';
    ventanaModificar.style.display = 'none';
}
function Listar() {
    ventanaListar.style.display = 'block'
    ventanaAgregar.style.display = 'none';
    ventanaModificar.style.display = 'none';
    ventanaEliminar.style.display = 'none';
}
//Ah esto se le podria poner un mouesclick o click en este caso es un click 
//cada boton del crud se le establecera la funcion que le corresponde en este caso
//A la funcion agregar 
$('#Listar').click(function () {
    Listar();
})
$('#Agregar').click(function () {
    Agregar();
})

$('#Modificar').click(function () {
    Modificar();

})
$('#Eliminar').click(function () {
    Eliminar();
})

