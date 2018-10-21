<?php
//Se importa la clase conexion hacia la clase cliente para asi trabajar en manera simultania
include "Conexion.php";

//Se crea Clase Cliente con sus respectivos atributos publicos

class Personas{
    public  $username;
    public  $contraseña;
    public  $nombre;
    public  $id;
    public  $apellido_1;
    public  $apellido_2;
    public  $numero_Telefono;
    public  $correo_Electronico;
    public  $direccion;
    
    


    //Metodo Constructor de la clase cliente
    function __construct($username,$contraseña,$nombre ,$id, $apellido_1, $apellido_2, $numero_Telefono,$correo_Electronico , $direccion ){
        $this->username=$username;
        $this->contraseña=$contraseña;
        $this->nombre=$nombre;
        $this->id=$id;
        $this->apellido_1= $apellido_1;
        $this->apellido_2= $apellido_2;
        $this->numero_Telefono= $numero_Telefono;
        $this->correo_Electronico= $correo_Electronico;
        $this->direccion= $direccion;
       
        
    
     }
    }
     
     function metodo_Post(){
        if(isset($_POST)){
            $this->username = $_POST["username"];
            $this->contraseña = $_POST["contraseña"];
            $this->nombre = $_POST["nombre"];
            $this->id = $_POST["id"];
            $this->apellido_1 = $_POST["apellido_1"];
            $this->apellido_2 = $_POST["apellido_2"];
            $this->telefono = $_POST["telefono"];
            $this->correo = $_POST["correo"];
            $this->direccion = $_POST["direccion"];

     }
        
        }

//Función que registra una Persona al sistema y se guardara en una base de datos

        function registrar_Persona(){
            try{
                metodo_Post();
                $Conexion = Conexion();
                $sql = "INSERT INTO persona VALUES('$this->username','$this->contraseña','$this->nombre','$this->id', '$this->apellido_1', '$this->apellido_2','$this->numero_Telefono', '$this->correo_Electronico','$this->direccion' )";
                $Conexion->query($sql);
                echo "Nuevo Cliente Agregado!";
            
            }catch(Exception $error){
                echo $error;
            }
         }





?>