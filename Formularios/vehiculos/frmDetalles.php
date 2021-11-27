<?php
//Llamamos a la capa de datos
require_once 'datos/datos.php';
//Llamamos a la capa de negocio
require_once 'negocio/vehiculos.php';
//Instanciamos las clases de la capa de negocio
$Obj_Vehiculos = new Vehiculos();
//Cargamos el registro solicitado
$DatosVehiculos = $Obj_Vehiculos->BuscarPorId( $_GET['id'] );
//Recuperamos el registro obtenido en una variable fila
foreach ( $DatosVehiculos as $Fila ) {
$DatosVehiculos = $Fila;
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
					<h2>Detalles de Vehiculo</h2>
				</div>
				<div class="col-md-4">
					<button type="button" class="btn btn-info" onclick="window.open('reportes/detalleVehiculo.php?id=<?php echo $_GET['id'] ?>', 'ReporteDetVehiculo', 'width=1000,height=600');"><i class="material-icons">&#xe8ad;</i><span>Imprimir</span></button>
					<button type="button" class="btn btn-success" onClick="location.replace('index.php?mod=veh&form=li');"><i class="material-icons">&#xe5c4;</i><span>Regresar</span></button>
				</div>
			</div>
		</div>
<!-- -------------------------- Fila 1 -------------------------- -->
		<div class="form-row">
			<div class="form-group col-md-8">
				<label>Nombre: </label>
				<input type="text" class="form-control" id="txtNombre" name="txtNombreC" readonly value="<?php echo $Fila['nombre_cliente']; ?>">
			</div>
			<div class="form-group col-md-6">
				<label>Marca: </label>
				<input class="form-control" id="cbxMarca" name="cbxMarca" readonly value="<?php echo $Fila['nombre_marca']; ?>">
			</div>
			<div class="form-group col-md-4">
				<label>Modelo: </label>
				<input  class="form-control" id="cbxModelo" name="cbxModelo" readonly value="<?php echo $Fila['nombre_modelo']; ?>">
			</div>
		</div>
<!-- -------------------------- Fila 2 -------------------------- -->
		<div class="form-row">
			<div class="form-group col-md-8">
				<label>Placa: </label>
				<input type="text" class="form-control" id="txtPlaca" name="txtPlaca" readonly value="<?php echo $Fila['placa']; ?>">
			</div>
			<div class="form-group col-md-4">
				<label>Tipo Vehiculo: </label>
				<input type="text" class="form-control" id="txtTipoVeh" name="txtTipoVeh" readonly value="<?php echo $Fila['tipo_vehiculo']; ?>">
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-4">
				<label>Color: </label>
				<input type="text" class="form-control" id="txtColorVeh" name="txtColorVeh" readonly value="<?php echo $Fila['color_vehiculo']; ?>">
			</div>
			<div class="form-group col-md-4">
				<label>Año Vehiculo: </label>
				<input type="text" class="form-control" id="txtAnio" name="txtAnio" readonly value="<?php echo $Fila['anio_vehiculo']; ?>">
			</div>
		</div>
<!-- -------------------------- Fila 4 -------------------------- -->

		<div class="form-row">
			<div class="form-group col-md-4">
				<label>Vin : </label>
				<input type="text" class="form-control" id="txVin" name="txtVin" readonly value="<?php echo $Fila['vin_vehiculo']; ?>">
			</div>
			<div class="form-group col-md-4">
				<label>Número de Motor : </label>
				<input type="text" class="form-control" id="txtMotor" name="txtMotor" readonly value="<?php echo $Fila['numero_motor_vehiculo']; ?>">
			</div>
			<div class="form-group col-md-4">
				<label>Observaciones : </label>
				<input type="text" class="form-control" id="txObservacion" name="txtObservacion" readonly value="<?php echo $Fila['observaciones_vehiculo']; ?>">
			</div>
		</div>
		
<!-- -------------------------- Fila 5 -------------------------- -->
		<div class="form-row">
			<div class="form-group col-md-4">
				<label>Fecha de Ingreso: </label>
				<input type="text" class="form-control" id="txtFechIngreso" name="txtFechIngreso" readonly value="<?php echo $Fila['fecIngreso_cliente']; ?>">
			</div>
			
			<div class="form-group col-md-4">
				<label>Fecha de Modificación: </label>
				<input type="text" class="form-control" id="txtFechModificacon" name="txtFechModificacion" readonly value="<?php echo $Fila['fechModificacion_cliente']; ?>">
			</div>
				<div class="form-group col-md-4">
					<label>Estado: </label>
					<input type="text" class="form-control" id="txtEstado" name="txtEstado" readonly value="<?php echo $Fila['estado']; ?>">
				</div>
			</div>
<!-- Cierre de los primeros 2 div --->
	</div> <!-- Cierre del Div table-wrapper -->
</div> <!-- Cierre del Div container -->