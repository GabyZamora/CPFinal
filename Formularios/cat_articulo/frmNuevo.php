<?php
include('presentacion/menu.php');
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
<h2>Nueva Categoría de Artículo</h2>
</div>
<div class="col-md-4">
<button type="button" class="btn btn-danger"
onClick="location.replace('index.php?mod=catar&form=li');"><i class="material-icons">&#xe5c9;</i><span>Cancelar</span></button>
<button type="button" class="btn btn-success" onClick="ValidarNuevo();"><i
class="material-icons">&#xe161;</i><span>Guardar</span></button>
</div>
</div>
</div>
<!-- -------------------------- Fila 1 -------------------------- -->
<div class="form-row">
			<div class="form-group col-md-8">
				<label>Nombre de la Categoría de Artículo: </label>
				<input type="text" class="form-control" id="txtNombre" name="txtNombre" >
			</div>
			<div class="form-group col-md-8">
				<label>Descripción: </label>
				<input type="text" class="form-control" id="txtDescripcion" name="txtDescripcion" >
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
if ( !document.getElementById('txtNombre').value ) {
alert('Ingrese el nombre de la categoría');
}
else if ( !document.getElementById('txtDescripcion').value ) {
alert('Añada una descripción a la categoría');
}
else {
document.forms.frmNuevo.action = 'index.php?mod=catar&form=ag';
document.forms.frmNuevo.submit();
}
}
</script>