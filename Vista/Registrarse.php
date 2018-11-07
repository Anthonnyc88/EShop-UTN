<!DOCTYPE html>
<html>

<head>
	<title>Registro</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
	 crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
	 crossorigin="anonymous">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" type="text/css" href="../css/estiloRegistro.css">
	<link rel="stylesheet" href="https://bootswatch.com/4/flatly/bootstrap.min.css">
	<link rel="stylesheet" href="https://necolas.github.io/normalize.css/3.0.2/normalize.css">
	<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
	<link rel="stylesheet" href="AlertifyJS/css/alertify.min.css" />
	<link rel="stylesheet" href="AlertifyJS/css/themes/semantic.min.css" />
	<script src="AlertifyJS/alertify.min.js"></script>
	<!-- las referencias al css y js que dan el color y movimiento a la parte visual -->
		
</head>
<!--Aqui esta la estructura del registro -->
<body>
	<div class="container">


		<div class="content w3-animate-zoom">
			<div class="container">
			</div>
			<div class="d-flex justify-content-center h-100">
				<div class="card">
					<div class="card-header">
						<h3>Registrarse</h3>
					</div>
					<div class="card-body">
						<form action="../Backend/ValidacionRegistro.php" method="post">
							<div class="input-group form-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-user"></i></span>
								</div>
								<input type="text" name="username" id="username" class="form-control" placeholder="Username">
							</div>
							<div class="input-group form-group">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="fas fa-key"></i></span>
								</div>
								<input type="text" name="correo" id="correo" class="form-control" placeholder="Correo">
							</div>
							<div class="input-group form-group">
								<input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre">
								<input type="text" name="id" id="id" class="form-control" placeholder="ID" readonly="readonly">
							</div>
							<div class="input-group form-group">
								<input type="text" name="apellido_1" id="apellido_1" class="form-control" placeholder="Apellido_1">
								<input type="text" name="apellido_2" id="apellido_2" class="form-control" placeholder="Apellido_2">
							</div>
							<div class="input-group form-group">
								<input type="text" name="telefono" id="telefono" class="form-control" placeholder="Telefono">
								<input type="text" name="direccion" id="direccion" class="form-control" placeholder="Direccion">
							</div>
							<input type="submit" value="Registrar" class="btn float-right login_btn">
							<div class="form-group">
							</div>
							<div class="row align-items-center remember">
							</div>
							<div class="d-flex justify-content-center links">
								Ya estas registrado?<a href="Login.php">Iniciar Sesion</a>
							</div>
						</form>




					</div>

				</div>
			</div>
		</div>
	</div>
</body>

</html>