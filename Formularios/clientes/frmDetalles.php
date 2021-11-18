<?php
//Llamamos a la capa de datos
require_once 'datos/datos.php';
//Llamamos a la capa de negocio
require_once 'negocio/clientes.php';
//Instanciamos las clases de la capa de negocio
$Obj_Clientes = new Clientes();
//Cargamos el registro solicitado
$DatosCliente = $Obj_Clientes->BuscarPorId( $_GET['id'] );
//Recuperamos el registro obtenido en una variable fila
foreach ( $DatosCliente as $Fila ) {
$DatosCliente = $Fila;
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
					<h2>Detalles de Cliente</h2>
				</div>
				<div class="col-md-4">
					<button type="button" class="btn btn-info" onclick="window.open('reportes/detalleCliente.php?id=<?php echo $_GET['id'] ?>', 'ReporteDetCliente', 'width=1000,height=600');"><i class="material-icons">&#xe8ad;</i><span>Imprimir</span></button>
					<button type="button" class="btn btn-success" onClick="location.replace('index.php?mod=clie&form=li');"><i class="material-icons">&#xe5c4;</i><span>Regresar</span></button>
				</div>
			</div>
		</div>
<!-- -------------------------- Fila 1 -------------------------- -->
		<div class="form-row">
			<div class="form-group col-md-8">
				<label>Nombre: </label>
				<input type="text" class="form-control" id="txtNombre" name="txtNombreC" readonly value="<?php echo $Fila['nombre_cliente']; ?>">
			</div>
			<div class="form-group col-md-4">
				<label>Apellido: </label>
				<input type="text" class="form-control" id="txtApellido" name="txtApellido" readonly value="<?php echo $Fila['apellidos_cliente']; ?>">
			</div>
		</div>
<!-- -------------------------- Fila 2 -------------------------- -->
		<div class="form-row">
			<div class="form-group col-md-8">
				<label>Dirección: </label>
				<input type="text" class="form-control" id="txtDireccion" name="txtDireccion" readonly value="<?php echo $Fila['direccion_cliente']; ?>">
			</div>
			<div class="form-group col-md-4">
				<label>Departamento: </label>
				<input type="text" class="form-control" id="txtDepa" name="txtDepa" readonly value="<?php echo $Fila['id_departamento']; ?>">
			</div>
			<div class="form-group col-md-4">
				<label>Municipio: </label>
				<input type="text" class="form-control" id="txtMunicipio" name="txtMunicipio" readonly value="<?php echo $Fila['id_municipio']; ?>">
			</div>
		</div>
<!-- -------------------------- Fila 3 -------------------------- -->
		<div class="form-row">
			<div class="form-group col-md-4">
				<label>Telefóno: </label>
				<input type="tel" class="form-control" id="txtTelefono" name="txtTelefono" readonly value="<?php echo $Fila['telefono_cliente']; ?>">
			</div>
			<div class="form-group col-md-4">
				<label>Correo: </label>
				<input type="text" class="form-control" id="txtCorreo" name="txtCorreo" readonly value="<?php echo $Fila['correo_cliente']; ?>">
			</div>
			<div class="form-group col-md-4">
				<label>NIT: </label>
				<input type="tel" class="form-control" id="txtNIT" name="txtNIT" readonly value="<?php echo $Fila['nit_cliente']; ?>">
			</div>
		</div>
<!-- -------------------------- Fila 4 -------------------------- -->

		<div class="form-row">
			<div class="form-group col-md-4">
				<label>NRC: </label>
				<input type="tel" class="form-control" id="txtNRC" name="txtNRC" readonly value="<?php echo $Fila['nrc_cliente']; ?>">
			</div>
			<div class="form-group col-md-4">
				<label>Fecha de Ingreso: </label>
				<input type="text" class="form-control" id="txtFechIngreso" name="txtFechIngreso" readonly value="<?php echo $Fila['fecIngreso_cliente']; ?>">
			</div>
			<div class="form-group col-md-4">
				<label>Fecha de Modificación: </label>
				<input type="text" class="form-control" id="txtFechModificacon" name="txtFechModificacion" readonly value="<?php echo $Fila['fechModificacion_cliente']; ?>">
			</div>
		</div>

<!-- -------------------------- Fila 5 -------------------------- -->

		<div class="form-row">
			<div class="form-group col-md-4">
				<label>Estado: </label>
				<input type="text" class="form-control" id="txtEstado" name="txtEstado" readonly value="<?php echo $Fila['estado']; ?>">
			</div>
		</div>


<!-- Cierre de los primeros 2 div --->
	</div> <!-- Cierre del Div table-wrapper -->
</div> <!-- Cierre del Div container -->