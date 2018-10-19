<?php
//Se importa la clase conexion hacia la clase cliente para asi trabajar en manera simultania
include "Conexion.php";

//Se crea Clase Cliente con sus respectivos atributos publicos

class Personas{
    public  $username;
    public  $contraseña;
    public  $nombre;
    public  $apellido_1;
    public  $apellido_2;
    public  $numero_Telefono;
    public  $correo_Electronico;
    public  $direccion;
    public $tipo_persona;
    
    


    //Metodo Constructor de la clase cliente
    function __construct($username,$contraseña,$nombre , $apellido_1, $apellido_2, $numero_Telefono,$correo_Electronico , $direccion,$tipo_persona ){
        $this->username=$username;
        $this->contraseña=$contraseña;
        $this->nombre=$nombre;
        $this->apellido_1= $apellido_1;
        $this->apellido_2= $apellido_2;
        $this->numero_Telefono= $numero_Telefono;
        $this->correo_Electronico= $correo_Electronico;
        $this->direccion= $direccion;
        $this->tipo_Persona=$tipo_persona;
        
    
     }

//Función que registra un cliente al sistema y se guardara en una base de datos
    function registrar_Persona(){
        try{
            $Conexion = Conexion();
            $sql = "INSERT INTO clientes VALUES('$this->username','$this->contraseña,$this->nombre', '$this->apellido_1', '$this->apellido_2',$this->numero_Telefono, '$this->correo_Electronico','$this->direccion' ,'$this->tipo_Persona')";
            $Conexion->query($sql);
            echo "Nuevo Cliente Agregado!";
        
        }catch(Exception $error){
            echo $error;

        }

     }



}

?>