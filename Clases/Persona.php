<?php
//Se importa la clase conexion hacia la clase cliente para asi trabajar en manera simultania
include "../Backend/Conexion.php";
//Se crea Clase Cliente con sus respectivos atributos publicos
class Personas{
    public  $username;
    public  $nombre;
    public  $id;
    public  $apellido_1;
    public  $apellido_2;
    public  $telefono;
    public  $correo;
    public  $direccion;
    public  $usu;
    //Metodo Constructor de la clase cliente
    function __construct($username,$nombre ,$id, $apellido_1, $apellido_2, $telefono,$correo , $direccion,$usu){
        $this->username=$username;
        $this->nombre=$nombre;
        $this->id=$id;
        $this->apellido_1= $apellido_1;
        $this->apellido_2= $apellido_2;
        $this->telefono= $telefono;
        $this->correo= $correo;
        $this->direccion= $direccion;
        $this->usu=$usu;
    }
     //Función que registra una Persona al sistema y se guardara en una base de datos
     function registrar_Persona(){
            $conexion = Conexion();
            $sql = "INSERT INTO personas(username,nombre,id,apellido_1,apellido_2,telefono,correo,direccion,usu) VALUES('$this->username','$this->nombre','$this->id','$this->apellido_1','$this->apellido_2','$this->telefono','$this->correo','$this->direccion' ,'$this->usu')";
            $conexion->query($sql);
            //echo"<script  language='javascript'>window.location='index.php'</script>";  
            echo"<script type=\"text/javascript\">alert('Registro exitoso'); window.location=' ../Vista/Login.php';</script>";

    
        }    
            
    }
   

        
         

?>
