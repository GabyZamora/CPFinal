<?php
require_once 'datos/datos.php';
require_once 'negocio/categoriaservicios.php';
include('presentacion/menu.php');
$Obj_Categoria_Servicio= new Categoria_Servicio();
$DatosCategoria_Servicio = $Obj_Categoria_Servicio->ListarTodoCombos();
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
<form name="frmNuevo" action="" method="post">
	<div class="container">
		<div class="table-wrapper">
 			<div class="table-title">
 				<div class="form-row">
 					<div class="col-md-8">
 						<h2>Nuevo Servicio</h2>
					</div>
 					<div class="col-md-4">
 						<button type="button" class="btn btn-danger"
						onClick="location.replace('index.php?mod=ser&form=li');"><i class="material-icons">&#xe5c9;</i><span>Cancelar</span></button>
 						<button type="button" class="btn btn-success"
						onClick="ValidarNuevo();"><i class="material-icons">&#xe161;</i><span>Guardar</span></button>
 					</div>
				</div>
			</div>
			  <!-- -------------------------- Fila 1 -------------------------- -->
 			<div class="form-row">
 				<div class="form-group col-md-8">
					<label>Nombre de Servicio: </label>
 					<input type="text" class="form-control" id="txtNombreServ"
					name="txtNombreServ">
 				</div>
 			</div>
 			<!-- -------------------------- Fila 2 -------------------------- -->
 			<div class="form-row">
 				<div class="form-group col-md-8">
 					<label>Detalles: </label>
					 <textarea class="form-control" id="txtDetalles" name="txtDetalles"
					rows="3"></textarea>
 				</div>
 			</div>

 			<div class="form-row">
	 			<div class="form-group col-md-6">
		 			<label>Categoria: </label>
					 <select id="cbxCategoria" name="cbxCategoria" class="form-control">
						 <option value="">Seleccione...</option>
						 <?php
						 foreach ( $DatosCategoria_Servicio as $FilaCategoria ) {
						 ?>
			 			<option value="<?php echo $FilaCategoria['id_categoria']; ?>"><?php echo
						$FilaCategoria['nombre_categoria']; ?></option>
						 <?php
						 }
						 ?>
		 			</select>
				</div>
 		</div> <!-- Cierre del Div table-wrapper -->
	</div> <!-- Cierre del Div container -->
</form>
<!-- -------------------- Validaciones de ingreso de datos -------------------- -->
<script type="text/javascript">
	function ValidarNuevo(){
		 if ( !document.getElementById('txtNombreServ').value ) {
		 alert('Ingrese el nombre del servicio');
		 }
		 else if ( !document.getElementById('txtDetalles').value ) {
		 alert('Ingrese detalles del servicio');
		 }
		 else if (!document.getElementById('cbxCategoria').value) {
			 alert('Seleccione categoría de servicio')
		 }
		 else {
		 document.forms.frmNuevo.action = 'index.php?mod=ser&form=ag';
		 document.forms.frmNuevo.submit();
		 }
	}
</script>