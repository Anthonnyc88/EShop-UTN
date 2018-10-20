<?php

    if(isset($_POST)){
        $username = $_POST["username"];
        $contraseña = $_POST["contraseña"];
        $nombre = $_POST["nombre"];
        $id = $_POST["id"];
        $apellido_1 = $_POST["apellido_1"];
        $apellido_2 = $_POST["apellido_2"];
        $telefono = $_POST["telefono"];
        $correo = $_POST["correo"];
        $direccion = $_POST["direccion"];
        $tipo_persona = $_POST["tipo_persona"];



        try{
            $conexion = new PDO("mysql:host=localhost;dbname=proyecto","root","");
        }catch(PDOException $e){
            echo "Error: " . $e->getMessage();
            die();  
        }

        $sql = "INSERT INTO persona VALUES('$username', '$contraseña', '$nombre', '$id', '$apellido_1', '$apellido_2', '$telefono', '$correo', '$direccion', '$tipo_persona')";
        $conexion->query($sql);

        
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Registro</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
	 crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
	 crossorigin="anonymous">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
    
<body>
	<div class="container">
		<div class="content w3-animate-zoom">
					</div>
					<form action="php/Registrar.php" method="post">
						<div class="form-group">
						</div>
						<div class="row align-items-center remember">
						</div>
						<div class="content w3-animate-zoom" style="background: rgba(1, 2, 3, 0.4)">
							<div class="d-flex justify-content-center links">
                                 <h1>Registro exitoso</h1>
							</div>
					</form>
					<div class="d-flex justify-content-center">
                    <a href="javascript:history.back(-2);">Iniciar Sesion</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</body>
</html>