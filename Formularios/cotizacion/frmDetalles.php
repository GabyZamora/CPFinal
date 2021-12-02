<?php
//Llamamos a la capa de datos
require_once 'datos/datos.php';
//Llamamos a la capa de negocio
require_once 'negocio/cotizacion.php';
//Instanciamos las clases de la capa de negocio
$Obj_Cotizacion = new Cotizacion();
//Cargamos el registro solicitado
$DatosCotizacion = $Obj_Cotizacion ->BuscarPorId( $_GET['id'] );
//Recuperamos el registro obtenido en una variable fila
foreach ( $DatosCotizacion as $Fila ) {
$DatosCotizacion = $Fila;
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
					<h2>Detalles de Cotización</h2>
				</div>
				<div class="col-md-4">
					<button type="button" class="btn btn-info" onclick="window.open('reportes/detalleCotizacion.php?id=<?php echo $_GET['id'] ?>', 'ReporteDetCotizacion', 'width=1000,height=600');"><i class="material-icons">&#xe8ad;</i><span>Imprimir</span></button>
					<button type="button" class="btn btn-success" onClick="location.replace('index.php?mod=cot&form=li');"><i class="material-icons">&#xe5c4;</i><span>Regresar</span></button>
				</div>
			</div>
		</div>
<!-- -------------------------- Fila 1 -------------------------- -->
		<div class="form-row">
			<div class="form-group col-md-8">
				<label>Servicio: </label>
				<input type="text" class="form-control" id="txtServicio" name="txtServicio" readonly value="<?php echo $Fila['Servicio']; ?>">
			</div>

			<div class="form-group col-md-8">
				<label>Cantidad de Servicio: </label>
				<input type="text" class="form-control" id="txtCantServicio" name="txtCantServicio" readonly value="<?php echo $Fila['CantServicio']; ?>">
			</div>

			<div class="form-group col-md-8">
				<label>Precio del Servicio: </label>
				<input type="text" class="form-control" id="txtPrecioServicio" name="txtPrecioServicio" readonly value="<?php echo $Fila['PrecioServicio']; ?>">
			</div>

			<div class="form-group col-md-8">
				<label>Artículo: </label>
				<input type="text" class="form-control" id="txtArticulo" name="txtArticulo" readonly value="<?php echo $Fila['Articulo']; ?>">
			</div>

			<div class="form-group col-md-8">
				<label>Cantidad de Articulo: </label>
				<input type="text" class="form-control" id="txtCantidadArt" name="txtCantidadArt" readonly value="<?php echo $Fila['CantidadArt']; ?>">
			</div>

			<div class="form-group col-md-8">
				<label>Precio del Articulo: </label>
				<input type="text" class="form-control" id="txtPrecioArt" name="txtPrecioArt" readonly value="<?php echo $Fila['PrecioArt']; ?>">
			</div>

			<div class="form-group col-md-8">
			<label>Estado: </label>
			<input type="text" class="form-control" id="txtEstado" name="txtEstado" readonly value="<?php echo $Fila['Estado']; ?>">
			</div>

			<div class="form-group col-md-8">
				<label>Fecha de Ingreso: </label>
				<input type="text" class="form-control" id="txtFechaIngreso" name="txtFechaIngreso" readonly value="<?php echo $Fila['FechaIngreso']; ?>">
			</div>

			<div class="form-group col-md-8">
				<label>Fecha de Modificación: </label>
				<input type="text" class="form-control" id="txtFechaModificacion" name="txtFechaModificacion" readonly value="<?php echo $Fila['FechaModificacion']; ?>">
			</div>




			

<!-- Cierre de los primeros 2 div --->
	</div> <!-- Cierre del Div table-wrapper -->
</div> <!-- Cierre del Div container -->