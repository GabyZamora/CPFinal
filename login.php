<?php
if( isset($_POST['btnEnviar']) ){
	require_once 'datos/conexion.php';

	$Obj_Conexion = new Conexion();

	//recepción de datos enviados medinate POST desde ajax
	$usuario = (isset($_POST['txtUsuario'])) ? $_POST['txtUsuario'] : '';
	$password = (isset($_POST['txtPassword'])) ? $_POST['txtPassword'] : '';

	$pass = md5($password);

	$CadenaUsuario = "SELECT * FROM usuarios WHERE Usuario='$usuario' AND PASSWORD='$password'";

	$Datos_Usuario = $Obj_Conexion->EjecutarSelectiva( $CadenaUsuario );

	if ( count( $Datos_Usuario ) == 0 ){
		echo "<script>alert('Usuario y/o password incorrectos');</script>";
	}
	else if( count( $Datos_Usuario ) == 1 ){
		$_SESSION['usuario_id'] = $Datos_Usuario[0]['usuario_id'];
		$_SESSION['nombre_usuario'] = $Datos_Usuario[0]['nombre_usuario'];

		echo "<script>window.location.replace('index.php?mod=menu');</script>";
	}
}

?>
<!-- CSS -->
<link href="https://fonts.googleapis.com/css2?family=Bitter&family=Montserrat&family=Quattrocento+Sans:wght@700&display=swap" rel="stylesheet"> 
<link rel="stylesheet" href="css/iconfont/material-icons.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Zilla+Slab:wght@600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/iconfont/material-icons.css">
<link rel="stylesheet" href="css/bootstrap-4.3.1.min.css">
<link rel="stylesheet" href="css/formularios.css">

<main role="main" class="container my-auto">
	<div class="row" style="margin-top: 2rem; font-family: 'Quattrocento';">
		<div id="login" class="col-lg-4 offset-lg-4 col-md-6 offset-md-3 col-12">
			<h2 class="text-center">Bienvenido/a</h2>
			<img class="img-fluid mx-auto d-block rounded" width="400px" height="500px" 
			src="images/logo2.png" />
			<h4 style="font-family: 'Quattrocento';">Ingresa los datos para ingresar</h4>
			<form name="frmNuevo" action="" method="post">
				<div class="form-group">
					<label>Usuario: </label>
					<input type="text" class="form-control" id="txtUsuario" name="txtUsuario">
				</div>
				<div class="form-group">
					<label>Password: </label>
					<input type="password" class="form-control" id="txtPassword" name="txtPassword">
				</div>
				<button type="submit" style="background-color:#153d8e; border-color:#153d8e;"class="btn btn-success mb-2" name="btnEnviar" onClick="location.replace('index.php?mod=menu');">
					Entrar
				</button>
			</form>
		</div>
	</div>
</main>