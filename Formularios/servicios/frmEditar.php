<?php
	//Llamamos a la capa de datos
	require_once 'datos/datos.php';
	//Llamamos a la capa de negocio
	require_once 'negocio/servicios.php';
	include('presentacion/menu.php');
	//Instanciamos las clases de la capa de negocio
	$Obj_Servicios = new Servicios();
	//Cargamos el registro solicitado
	$DatosServicios = $Obj_Servicios->BuscarPorId( $_GET['id'] );
	//Recuperamos el registro obtenido en una variable fila
	foreach ( $DatosServicios as $Fila ) {
	$DatosServicios = $Fila;
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
						onClick="location.replace('index.php?mod=ser&form=li');"><i class="materialicons">&#xe5c9;</i><span>Cancelar</span></button>
						 <button type="button" class="btn btn-success"
						onClick="ValidarEditar();"><i class="materialicons">&#xe161;</i><span>Guardar</span></button>
					 </div>
 				</div>
			</div>
			<!-- -------------------------- Fila 1 -------------------------- -->
			<div class="form-row">
 				<div class="form-group col-md-8">
					<label>Nombre del Servicio: </label>
 					<input type="text" class="form-control" id="txtNombreServ"
					name="txtNombreServ" value="<?php echo $Fila['nombre_servicio']; ?>">
					<input type="hidden" class="form-control" id="hidId" name="hidId"
					value="<?php echo $Fila['id_servicio']; ?>">
 				</div>
 			</div>
 			<!---------------------------- Fila 2 -------------------------- -->
 			<div class="form-row">
 				<div class="form-group col-md-8">
 					<label>Detalles: </label>
 					<input type="text" class="form-control" id="txtDetalles"
					name="txtDetalles" value="<?php echo $Fila['Detalles']; ?>" readonly>
 				</div>
 			</div>
 			<div class="form-row">
	 			<div class="form-group col-md-6">
		 			<label>Categoria: </label>
					 <select id="cbxCategoria" name="cbxCategoria" class="form-control">
						 <option value="<?php echo $Fila['id_categoria']; ?>"><?php
					echo $FilaProducto['NombreCategoria']; ?></option>
						 <?php
						 foreach ( $DatosCategorias as $FilaCategoria ) {
						 ?>
			 			<option value="<?php echo $FilaCategoria['id_categoria']; ?>"><?php echo
						$FilaCategoria['nombre_categoria']; ?></option>
						 <?php
						 }
						 ?>
		 			</select>
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