<?php
//Llamamos a la capa de datos
require_once 'datos/datos.php';
//Llamamos a la capa de negocio
require_once 'negocio/modelo.php';
//Instanciamos las clases de la capa de negocio
$Obj_Modelo = new Modelo();
//Cargamos el registro solicitado
$DatosModelo = $Obj_Modelo->BuscarPorId( $_GET['id'] );
//Recuperamos el registro obtenido en una variable fila
foreach ( $DatosModelo as $Fila ) {
$DatosModelo = $Fila;
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
					<h2>Detalles de Modelo de Vehículo</h2>
				</div>
				<div class="col-md-4">
					<button type="button" class="btn btn-info" onclick="window.open('reportes/detalleModelo.php?id=<?php echo $_GET['id'] ?>', 'ReporteDetModelo', 'width=1000,height=600');"><i class="material-icons">&#xe8ad;</i><span>Imprimir</span></button>
					<button type="button" class="btn btn-success" onClick="location.replace('index.php?mod=model&form=li');"><i class="material-icons">&#xe5c4;</i><span>Regresar</span></button>
				</div>
			</div>
		</div>
<!-- -------------------------- Fila 1 -------------------------- -->
		<div class="form-row">
			<div class="form-group col-md-8">
				<label>Modelo: </label>
				<input type="text" class="form-control" id="txtModelo" name="txtModelo" readonly value="<?php echo $Fila['nombre_modelo']; ?>">
			</div>
			<div class="form-group col-md-4">
				<label>Marca: </label>
				<input type="text" class="form-control" id="txtMarca" name="txtMarca" readonly value="<?php echo $Fila['id_marca']; ?>">
			</div>
		</div>
<!-- -------------------------- Fila 2 -------------------------- -->
		<div class="form-row">
			<div class="form-group col-md-8">
				<label>Fecha de Ingreso: </label>
				<input type="text" class="form-control" id="txtFechIngreso" name="txtFechIngreso" readonly value="<?php echo $Fila['fecIngreso_modelo_aut']; ?>">
			</div>
			<div class="form-group col-md-4">
				<label>Fecha de Modificación: </label>
				<input type="text" class="form-control" id="txtFechModificacon" name="txtFechModificacon" readonly value="<?php echo $Fila['fechModificacion_modelo_aut']; ?>">
			</div>
			<div class="form-group col-md-4">
				<label>Estado: </label>
				<input type="text" class="form-control" id="txtEstado" name="txtEstado" readonly value="<?php echo $Fila['estado']; ?>">
			</div>
		</div>
<!-- Cierre de los primeros 2 div --->
	</div> <!-- Cierre del Div table-wrapper -->
</div> <!-- Cierre del Div container -->