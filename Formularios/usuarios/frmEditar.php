<?php
	//Llamamos a la capa de datos
	require_once 'datos/datos.php';
	//Llamamos a la capa de negocio
	require_once 'negocio/usuarios.php';
	include('presentacion/menu.php');
	//Instanciamos las clases de la capa de negocio
	$Obj_Usuarios = new Usuarios();
	//Cargamos el registro solicitado
	$DatosUsuario = $Obj_Usuarios->BuscarPorId( $_GET['id'] );
	//Recuperamos el registro obtenido en una variable fila
	foreach ( $DatosUsuario as $Fila ) {
	$DatosUsuario = $Fila;
	}
?>
<!-- CSS -->
<head>
<link rel="stylesheet" href="css/iconfont/material-icons.css">
<link rel="stylesheet" href="css/bootstrap-4.3.1.min.css">
<link rel="stylesheet" href="css/formularios.css">
<link href="https://fonts.googleapis.com/css?family=Raleway|Open+Sans" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
	<link rel="stylesheet" href="css/iconfont/material-icons.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap-3.3.7.min.css"> 
	<script src="https://kit.fontawesome.com/b1f3afb15c.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="css/menuside.css">
</head>
<body>
<form name="frmEditar" action="" method="post">
	<div class="container">
		<div class="table-wrapper">
 		   <div class="table-title">
 			   <div class="form-row">
 				   <div class="col-md-8">
 					    <h2>Editar Usuario</h2>
 					</div>
 					<div class="col-md-4">
						 <button type="button" class="btn btn-danger"
						onClick="location.replace('index.php?mod=usu&form=li');"><i class="materialicons">&#xe5c9;</i><span>Cancelar</span></button>
						 <button type="button" class="btn btn-success"
						onClick="ValidarEditar();"><i class="materialicons">&#xe161;</i><span>Guardar</span></button>
					 </div>
 				</div>
			</div>
			<!-- -------------------------- Fila 1 -------------------------- -->
			<div class="form-row">
 				<div class="form-group col-md-8">
					<label>Nombre Completo: </label>
 					<input type="text" class="form-control" id="txtNombreC"
					name="txtNombreC" value="<?php echo $Fila['nombre_usuario']; ?>">
					<input type="hidden" class="form-control" id="hidId" name="hidId"
					value="<?php echo $Fila['id_usuario']; ?>">
 				</div>
 			</div>
 			<!---------------------------- Fila 2 -------------------------- -->
 			<div class="form-row">
 				<div class="form-group col-md-8">
 					<label>Nombre de Usuario: </label>
 					<input type="text" class="form-control" id="txtUsuario"
					name="txtUsuario" value="<?php echo $Fila['Usuario']; ?>" readonly>
 				</div>
 			</div>
 		</div> <!-- Cierre del Div table-wrapper -->
	</div> <!-- Cierre del Div container -->
</form>
<!-- -------------------- Validaciones de ingreso de datos --------------------->
<script type="text/javascript">
	 function ValidarEditar(){
		if ( !document.getElementById('txtNombreC').value ) {
		 alert('Ingrese el nombre completo');
		}
		else {
		 document.forms.frmEditar.action = 'index.php?mod=usu&form=ac';
		 document.forms.frmEditar.submit();
		}
	 }
</script>