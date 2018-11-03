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
    //Metodo Constructor de la clase cliente
    function __construct($username,$nombre ,$id, $apellido_1, $apellido_2, $telefono,$correo , $direccion){
        $this->username=$username;
        $this->nombre=$nombre;
        $this->id=$id;
        $this->apellido_1= $apellido_1;
        $this->apellido_2= $apellido_2;
        $this->telefono= $telefono;
        $this->correo= $correo;
        $this->direccion= $direccion;
    }
     //Función que registra una Persona al sistema y se guardara en una base de datos
     function registrar_Persona(){
            $conexion = Conexion();
            $sql = "INSERT INTO personas(username,nombre,id,apellido_1,apellido_2,telefono,correo,direccion) VALUES('$this->username','$this->nombre','$this->id','$this->apellido_1','$this->apellido_2','$this->telefono','$this->correo','$this->direccion')";
            $conexion->query($sql);
            //echo"<script  language='javascript'>window.location='index.php'</script>";  
            echo"<script type=\"text/javascript\">alert('El nombre ingresado no existe continuar'); window.location=' ../Vista/Login.html';</script>";

            }    
            
        
    //Función que verifica si los datos que inserto son los mismos que estan dentro de la base de datos
     /*function Verificar_Persona(){
            try{
                $Conexion = Conexion();
                $sql =("SELECT * FROM personas WHERE username = '$username'");
                $Conexion->query($sql);
                if( Conexion($sql) == 0){
                    // mysql_num_rows <- esta funcion me imprime el numero de registro que encontro 
                    // si el numero es igual a 0 es porque el registro no exite, en otras palabras ese user no esta en la tabla miembro por lo tanto se puede registrar
                     
                    echo "El user es valido";
                    }
                echo "Datos correctos";
            
            }catch(Exception $error){
                echo $error;
            }
         }*/

}    


        
         

?>
