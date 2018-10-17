<?php
//Se importa la clase conexion hacia la clase cliente para asi trabajar en manera simultania
include "Conexion.php";

//Se crea Clase Cliente con sus respectivos atributos publicos

class Cliente{
    public  $nombre;
    public  $apellido_1;
    public  $apellido_2;
    public  $numero_Telefono;
    public  $correo_Electronico;
    public  $direccion;
    public  $username;
    public  $passwoord;


    //Metodo Constructor de la clase cliente
    function __construct($nombre , $apellido_1, $apellido_2, $numero_Telefono,$correo_Electronico , $direccion , $username,$passwoord){
        $this->nombre=$nombre;
        $this->apellido_1= $apellido_1;
        $this->apellido_2= $apellido_2;
        $this->numero_Telefono= $numero_Telefono;
        $this->correo_Electronico= $correo_Electronico;
        $this->direccion= $direccion;
        $this->username=$username;
        $this->passwoord=$passwoord;



     }

//Función que registra un cliente al sistema y se guardara en una base de datos
    function registrar_Cliente(){
        try{
            $Conexion = Conexion();
            $sql = "INSERT INTO clientes VALUES('$this->nombre', '$this->apellido_1', '$this->apellido_2', '$this->correo_Electronico','$this->direccion' ,'$this->username','$this->passwoord')";
            $Conexion->query($sql);
            echo "Nuevo Cliente Agregado!";
        
        }catch(Exception $error){
            echo $error;

        }

     }



}

?>