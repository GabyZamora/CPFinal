 <?php
//Llamamos a la capa de datos
require_once 'datos/datos.php';
//Llamamos a la capa de negocio
require_once 'negocio/articulos.php';
require_once 'negocio/servicios.php';
include('presentacion/menu.php');

//Instanciamos las clases de la capa de negocio
$Obj_Articulos = new Articulos();
$Obj_Servicios = new Servicios();
//Recuperamos los registros de las categorías y las marcas
$DatosArticulos = $Obj_Articulos->ListarTodoCombos();
$DatosServicios = $Obj_Servicios->ListarTodoCombos();
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

<form name="frmNuevo" action="" method="post">
<div class="container">
<div class="table-wrapper">
<div class="table-title">
<div class="form-row">
<div class="col-md-8">
<h2>Nueva Cotización </h2>
</div>
<div class="col-md-4">
<button type="button" class="btn btn-danger"
onClick="location.replace('index.php?mod=cot&form=li');"><i class="material-icons">&#xe5c9;</i><span>Cancelar</span></button>
<button type="button" class="btn btn-success" onClick="ValidarNuevo();"><i
class="material-icons">&#xe161;</i><span>Guardar</span></button>
</div>
</div>
</div>
<!-- -------------------------- Fila 1 -------------------------- -->
<div class="form-row">
			<div class="form-group col-md-8">
				<label>Seleccione un servicio: </label>
				<select id="cbxServicio" name="cbxServicio" class="form-control">
				<option value="">Seleccione...</option>
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
				<input type="text" class="form-control" id="txtCantServicio" name="txtCantServicio" >
			</div>

			<div class="form-group col-md-8">
				<label>Precio del Servicio: </label>
				<input type="text" class="form-control" id="txtPrecioServicio" name="txtPrecioServicio" >
			</div>

			<div class="form-group col-md-8">
				<label>Seleccione un artículo: </label>
				<select id="cbxArticulo" name="cbxArticulo" class="form-control">
				<option value="">Seleccione...</option>
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
				<input type="text" class="form-control" id="txtCantidadArt" name="txtCantidadArt" >
			</div>

			<div class="form-group col-md-8">
				<label>Precio del Articulo: </label>
				<input type="text" class="form-control" id="txtPrecioArt" name="txtPrecioArt" >
			</div>

			<div class="form-group col-md-8">
<label>Estado: </label>
<select id="cbxEstado" name="cbxEstado" class="form-control">
<option value="">Seleccione...</option>
<option value="">ACTIVO</option>
<option value="">INACTIVO</option>
</select>
</div>
		</div>

<!-- Cierres de div iniciales -->
</div> <!-- Cierre del Div table-wrapper -->
</div> <!-- Cierre del Div container -->
</form>
<!-- -------------------- Validaciones de ingreso de datos -------------------- -->
<script type="text/javascript">
function ValidarNuevo(){
if ( !document.getElementById('cbxServicio').value ) {
alert('Seleccione Servicio');
}
else if ( !document.getElementById('txtCantServicio').value ) {
alert('Ingrese cantidad de servicio');
}
else if ( !document.getElementById('txtPrecioServicio').value ) {
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
else {
document.forms.frmNuevo.action = 'index.php?mod=cot&form=ag';
document.forms.frmNuevo.submit();
}
}
</script>