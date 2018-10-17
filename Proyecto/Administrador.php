<?php
//Se importa la clase conexion hacia la clase Administrador para asi trabajar en manera simultania
include "Conexion.php";

//Se crea Clase Administrador con sus respectivos atributos publicos
class Administrador{
    public $username;
    public $passwoord;

 //Metodo Constructor de la clase Administrador
    function __construc($username, $passwoord){
        $this->username=$username;
        $this->passwoord=$passwoord;

    }

}

?>