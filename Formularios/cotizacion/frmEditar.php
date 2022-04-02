<?php
	//Llamamos a la capa de datos
	require_once 'datos/datos.php';
	//Llamamos a la capa de negocio
require_once 'negocio/cotizacion.php';
require_once 'negocio/articulos.php';
require_once 'negocio/servicios.php';
include('presentacion/menu.php');

//Instanciamos las clases de la capa de negocio
$Obj_Cotizacion = new Cotizacion();
$Obj_Articulos = new Articulos();
$Obj_Servicios = new Servicios();
//Recuperamos los registros de las categorías y las marcas
$DatosArticulos = $Obj_Articulos->ListarTodoCombos();
$DatosServicios = $Obj_Servicios->ListarTodoCombos();
//Recuperamos el registro obtenido en una variable fila
foreach ( $DatosCotizacion as $Fila ) {
$DatosCotizacion = $Fila;
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
						<h2>Editar Cotización</h2>
					</div>
					<div class="col-md-4">
						<button type="button" class="btn btn-danger"
						onClick="location.replace('index.php?mod=cot&form=li');"><i class="material-icons">&#xe5c9;</i><span>Cancelar</span></button>
						<button type="button" class="btn btn-success" onClick="ValidarEditar();"><i
						class="material-icons">&#xe161;</i><span>Guardar</span></button>
					</div>
				</div>
			</div>
<!-- -------------------------- Fila 1 -------------------------- -->
<div class="form-row">
			<div class="form-group col-md-8">
				<label>Seleccione un servicio: </label>
				<select id="cbxServicio" name="cbxServicio" class="form-control">
				<option value="<?php echo $Fila['id_servicio']; ?>"><?php echo
            $Fila['Servicio']; ?></option>
			<?php
			foreach ( $DatosServicios as $FilaServicio ) {
			?>
			<option value="<?php echo $FilaServicio['id_servicio']; ?>"><?php echo
			$FilaServicio['nombre_servicio']; ?></option>
			<?php
			}
			?>
			</select>
			</div>

			<div class="form-group col-md-8">
				<label>Cantidad de Servicio: </label>
				<input type="text" class="form-control" id="txtCantServicio" name="txtCantServicio" value="<?php echo $Fila['CantServicio']; ?>">
					<input type="hidden" class="form-control" id="hidId" name="hidId" value="<?php echo $Fila['id_cotizacion']; ?>">
			</div>

			<div class="form-group col-md-8">
				<label>Precio del Servicio: </label>
				<input type="text" class="form-control" id="txtPrecioServicio" name="txtPrecioServicio" value="<?php echo $Fila['PrecioServicio']; ?>">
					<input type="hidden" class="form-control" id="hidId" name="hidId" value="<?php echo $Fila['id_cotizacion']; ?>">
			</div>

			<div class="form-group col-md-8">
				<label>Seleccione un artículo: </label>
				<select id="cbxArticulo" name="cbxArticulo" class="form-control">
				<option value="<?php echo $Fila['id_articulo']; ?>"><?php echo
            $Fila['Articulo']; ?></option>
				<?php
				foreach ( $DatosArticulos as $FilaArticulo ) {
				?>
				<option value="<?php echo $FilaArticulo['id_articulo']; ?>"><?php echo
				$FilaArticulo['nombre_articulo']; ?></option>
				<?php
				}
				?>
			</select>
			</div>

			<div class="form-group col-md-8">
				<label>Cantidad de Articulo: </label>
				<input type="text" class="form-control" id="txtCantidadArt" name="txtCantidadArt" value="<?php echo $Fila['CantidadArt']; ?>">
					<input type="hidden" class="form-control" id="hidId" name="hidId" value="<?php echo $Fila['id_cotizacion']; ?>">
			</div>

			<div class="form-group col-md-8">
				<label>Precio del Articulo: </label>
				<input type="text" class="form-control" id="txtPrecioArt" name="txtPrecioArt" value="<?php echo $Fila['PrecioArt']; ?>">
					<input type="hidden" class="form-control" id="hidId" name="hidId" value="<?php echo $Fila['id_cotizacion']; ?>">
			</div>

			<div class="form-group col-md-8">
				<label>Estado: </label>
				<select id="cbxEstado" name="cbxEstado" class="form-control">
				<option value="">Seleccione...</option>
				<option value="Activo">ACTIVO</option>
				<option value="Inactivo">INACTIVO</option>
				</select>
			</div>
		</div>
    </div> <!-- Cierre del Div table-wrapper ---->
  </div> <!-- Cierre del Div container -->
</form>
<!-- -------------------- Validaciones de ingreso de datos -------------------- -->
<script type="text/javascript">
	function ValidarEditar(){
	if ( !document.getElementById('cbxServicio').value ) {
alert('Seleccione Servicio');
}
else if ( !document.getElementById('txtCantServicio').value ) {
alert('Ingrese cantidad de servicio');
}
else if ( !document.getElementById('txtRecioServicio').value ) {
alert('Ingrese precio de servicio');
}
else if ( !document.getElementById('cbxArticulo').value ) {
alert('Seleccione Articulo');
}
else if ( !document.getElementById('txtCantidadArt').value ) {
alert('Ingrese cantidad de articulos');
}
else if ( !document.getElementById('txtPrecioArt').value ) {
alert('Ingrese precio de articulo');
}
else if ( !document.getElementById('cbxEstado').value ) {
alert('Seleccione estado');
}
else {
document.forms.frmEditar.action = 'index.php?mod=cot&form=ac';
document.forms.frmEditar.submit();
}
}
</script>