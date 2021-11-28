<?php
//Llamamos a la capa de datos
require_once 'datos/datos.php';
//Llamamos a la capa de negocio
require_once 'negocio/proveedor.php';
//Instanciamos las clases de la capa de negocio
$Obj_Proveedor = new Proveedor();
//Cargamos el registro solicitado
$DatosProveedor = $Obj_Proveedor->BuscarPorId( $_GET['id'] );
//Recuperamos el registro obtenido en una variable fila
foreach ( $DatosProveedor as $Fila ) {
$DatosProveedor = $Fila;
}
?>

<!-- CSS -->
<link rel="stylesheet" href="css/iconfont/material-icons.css">
<link rel="stylesheet" href="css/bootstrap-4.3.1.min.css">
<link rel="stylesheet" href="css/formularios.css">

<div class="container">

	<div class="table-wrapper">
		<div class="table-title">
			<div class="form-row">
				<div class="col-md-8">
					<h2>Detalles de Proveedor</h2>
				</div>
				<div class="col-md-4">
					<button type="button" class="btn btn-info" onclick="window.open('reportes/detalleProveedor.php?id=<?php echo $_GET['id'] ?>', 'ReporteDetProveedor', 'width=1000,height=600');"><i class="material-icons">&#xe8ad;</i><span>Imprimir</span></button>
					<button type="button" class="btn btn-success" onClick="location.replace('index.php?mod=prove&form=li');"><i class="material-icons">&#xe5c4;</i><span>Regresar</span></button>
				</div>
			</div>
		</div>
<!-- -------------------------- Fila 1 -------------------------- -->
			<div class="form-row">
 				<div class="form-group col-md-8">
					<label>Nombre Comercial: </label>					
 					<input type="text" class="form-control" id="txtNombreComercial" readonly value="<?php echo $Fila['nombre_comercial_proveedor']; ?>">
 				</div>
 				<div class="form-group col-md-8">
					<label>Nombre del Proveedor: </label>
 					<input type="text" class="form-control" id="txtNombreProveedor" readonly value="<?php echo $Fila['nombre_propietario_proveedor']; ?>">
 				</div>
 				<div class="form-group col-md-8">
					<label>Giro: </label>
 					<input type="text" class="form-control" id="txtGiro" readonly value="<?php echo $Fila['giro_proveedor']; ?>">
 				</div>
 			</div>
<!-- -------------------------- Fila 2 -------------------------- -->
			<div class="form-row">
 				<div class="form-group col-md-8">
					<label>DUI: </label>
 					<input type="text" class="form-control" id="txtDUI" readonly value="<?php echo $Fila['DUI_proveedor']; ?>">
 				</div>
 				<div class="form-group col-md-8">
					<label>NIT: </label>
 					<input type="text" class="form-control" id="txtNIT" readonly value="<?php echo $Fila['NIT_proveedor']; ?>">
 				</div>
 				<div class="form-group col-md-8">
					<label>Dirección: </label>
 					<input type="text" class="form-control" id="txtDireccion"readonly value="<?php echo $Fila['direccion_proveedor']; ?>">
 				</div>
 			</div>
<!-- -------------------------- Fila 3 -------------------------- -->
			<div class="form-row">
 				<div class="form-group col-md-8">
					<label>Telefono 1: </label>
 					<input type="text" class="form-control" id="txtTelefono1" readonly value="<?php echo $Fila['telefono1_proveedor']; ?>">
 				</div>
 				<div class="form-group col-md-8">
					<label>Telefono 2: </label>
 					<input type="text" class="form-control" id="txtTelefono2" readonly value="<?php echo $Fila['telefono2_proveedor']; ?>">
 				</div>
 				<div class="form-group col-md-8">
					<label>Telefono 3: </label>
 					<input type="text" class="form-control" id="txtTelefono3" readonly value="<?php echo $Fila['telefono3_proveedor']; ?>">
 				</div>
 			</div>

<!-- -------------------------- Fila 4 -------------------------- -->
		<div class="form-row">
			<div class="form-group col-md-4">
				<label>Fecha de Ingreso: </label>
				<input type="text" class="form-control" id="txtFechIngreso" name="txtFechIngreso" readonly value="<?php echo $Fila['fechaIngreso_proveedor']; ?>">
			</div>
			<div class="form-group col-md-4">
				<label>Fecha de Modificación: </label>
				<input type="text" class="form-control" id="txtFechModificacon" name="txtFechModificacion" readonly value="<?php echo $Fila['fechaModificacion_proveedor']; ?>">
			</div>
		</div>
<!-- --------------------------Fila5----------------------------- -->

		<div class="form-row">
			<div class="form-group col-md-4">
				<label>Estado: </label>
				<input type="text" class="form-control" id="txtEstado" name="txtEstado" readonly value="<?php echo $Fila['estado']; ?>">
			</div>
		</div>
<!-- Cierre de los primeros 2 div --->
	</div> <!-- Cierre del Div table-wrapper -->
</div> <!-- Cierre del Div container -->