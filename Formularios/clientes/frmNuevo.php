<?php
//Llamamos a la capa de datos
require_once 'datos/datos.php';
//Llamamos a la capa de negocio
require_once 'negocio/departamentos.php';
require_once 'negocio/municipios.php';
include('presentacion/menu.php');
//Instanciamos las clases de la capa de negocio
$Obj_Departamentos = new Departamentos();
$Obj_Municipios = new Municipios();
//Recuperamos los registros de las categorías y las marcas
$DatosDepartamentos = $Obj_Departamentos->ListarTodoCombos();
$DatosMunicipios = $Obj_Municipios->ListarTodoCombos();
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
	<script language="javascript">
	$(document).ready(function () {
		$("#cbxDepartamento").change(function () {
			$("#cbxDepartamento option:selected").each(function () {
				id_departamento = $(this).val();
				$.post("negocio/municipios.php", { id_departamento: id_departamento}, function(data){
					$("#cbxMunicipios").html(data);
				});
			});
		})
	});
</script>
</head>
<body>
<form name="frmNuevo" action="" method="post">
<div class="container">
<div class="table-wrapper">
<div class="table-title">
<div class="form-row">
<div class="col-md-8">
<h2>Nuevo Cliente</h2>
</div>
<div class="col-md-4">
<button type="button" class="btn btn-danger"
onClick="location.replace('index.php?mod=clie&form=li');"><i class="material-icons">&#xe5c9;</i><span>Cancelar</span></button>
<button type="button" class="btn btn-success" onClick="ValidarNuevo();"><i
class="material-icons">&#xe161;</i><span>Guardar</span></button>
</div>
</div>
</div>
<!-- -------------------------- Fila 1 -------------------------- -->
<div class="form-row">
<div class="form-group col-md-8">
<label>Nombre Completo: </label>
<input type="text" class="form-control" id="txtNombre" name="txtNombre">
</div>
</div>
<!-- -------------------------- Fila 2 -------------------------- -->
<div class="form-row">
<div class="form-group col-md-8">
<label>Dirección: </label>
<input type="text" class="form-control" id="txtDireccion" name="txtDireccion">
</div>
</div>

<div class="form-row">
<div class="form-group col-md-8">
<label>Giro NRC: </label>
<input type="text" class="form-control" id="txtGiroNrc" name="txtGiroNrc">
</div>
</div>

<!-- -------------------------- Fila 3 -------------------------- -->
<div class="form-row">
	<div class="form-group col-md-4">
<label>Departamento: </label>
<select id="cbxDepa" name="cbxDepa" class="form-control">
<option value="">Seleccione...</option>
              <?php
              foreach ( $DatosDepartamentos as $FilaDepartamento ) {
                ?>
                <option value="<?php echo $FilaDepartamento['id_departamento']; ?>"><?php echo
                $FilaDepartamento['nombre_departamento']; ?></option>
                <?php
              }
              ?>
</select>
</div>
<div class="form-group col-md-4">
<label>Municipio:</label>
<select id="cbxMunicipio" name="cbxMunicipio" class="form-control">
	<option value="">Seleccione...</option>
              <?php
              foreach ( $DatosMunicipios as $FilaMunicipio ) {
                ?>
                <option value="<?php echo $FilaMunicipio['id_municipio']; ?>"><?php echo
                $FilaMunicipio['nombre_municipio']; ?></option>
                <?php
              }
              ?>
</select>
</div>
</div>

<!-- --------------------------Fila 4 ----------------------------- -->
<div class="form-row">
<div class="form-group col-md-4">
<label>Teléfono: </label>
<input type="tel" class="form-control" id="txtTel" name="txtTel">
</div>
<div class="form-group col-md-4">
<label>Correo: </label>
<input type="text" class="form-control" id="txtCorreo" name="txtCorreo">
</div>
</div>

<!-- --------------------------Fila 5 ----------------------------- -->
<div class="form-row">
<div class="form-group col-md-4">
<label>Factura: </label>
<input type="text" class="form-control" id="txtFactura" name="txtFactura">
</div>
<div class="form-group col-md-4">
<label>NIT: </label>
<input type="tel" class="form-control" id="txtNIT" name="txtNIT">
</div>

</div>

<!-- --------------------------Fila 5----------------------------- -->
<div class="form-row">
<div class="form-group col-md-4">
<label>NRC: </label>
<input type="tel" class="form-control" id="txtNRC" name="txtNRC">
</div>
<div class="form-group col-md-4">
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
alert('Ingrese el nombre del cliente');
}
else if ( !document.getElementById('txtDireccion').value ) {
alert('Ingrese la dirección del cliente');
}
else if ( !document.getElementById('cbxDepa').value ) {
alert('Seleccione un departamento');
}
else if ( !document.getElementById('cbxMunicipio').value ) {
alert('Selecione un municipio');
}
else if ( !document.getElementById('txtTel').value ) {
alert('Ingrese número de teléfono');
}
else if ( !document.getElementById('txtCorreo').value ) {
alert('Ingrese correo electrónico del cliente');
}
else if ( !document.getElementById('txtNIT').value ) {
alert('Ingrese número de nit del cliente');
}
else if ( !document.getElementById('txtNRC').value ) {
alert('Agregue NRC');
}
else if ( !document.getElementById('txtGiroNrc').value ) {
alert('Agregue Giro NRC');
}
else {
document.forms.frmNuevo.action = 'index.php?mod=clie&form=ag ';
document.forms.frmNuevo.submit();
}
}
</script>

