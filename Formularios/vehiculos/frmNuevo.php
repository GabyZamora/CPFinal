<?php
require_once 'datos/datos.php';
require_once 'negocio/clientes.php';
require_once 'negocio/marcasautos.php';
require_once 'negocio/modelo.php';
include('presentacion/menu.php');

$Obj_Clientes = new Clientes();
$DatosClientes = $Obj_Clientes->ListarTodoCombos();
$Obj_Modelo = new Modelo();
$Datos_Modelo = $Obj_Modelo->ListarTodoCombos();
$Obj_Marcas_Autos = new Marcas_Autos();
$Datos_Marcas_Autos = $Obj_Marcas_Autos->ListarTodoCombos();
?>

<!-- CSS -->
<head>
<link rel="stylesheet" href="css/iconfont/material-icons.css">
<link rel="stylesheet" href="css/bootstrap-4.3.1.min.css">
<link rel="stylesheet" href="css/formularios.css">
<link href="https://fonts.googleapis.com/css?family=Raleway|Open+Sans" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
	crossorigin="anonymous"></script>
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
<h2>Nuevo Vehiculo</h2>
</div>
<div class="col-md-4">
<button type="button" class="btn btn-danger"
onClick="location.replace('index.php?mod=veh&form=li');"><i class="material-icons">&#xe5c9;</i><span>Cancelar</span></button>
<button type="button" class="btn btn-success" onClick="ValidarNuevo();"><i
class="material-icons">&#xe161;</i><span>Guardar</span></button>
</div>
</div>
</div>
<!-- -------------------------- Fila 1 -------------------------- -->
<div class="form-row">
<div class="form-group col-md-8">
<label>Nombre Cliente: </label>
<select id="cbxCliente" name="cbxCliente" class="form-control">
           <option value="">Seleccione...</option>
           <?php
           foreach ( $DatosClientes as $FilaCliente ) {
           ?>
           <option value="<?php echo $FilaCliente['id_cliente']; ?>"><?php echo
          $FilaCliente['nombre_cliente']; ?></option>
           <?php
           }
           ?>
          </select>
</div>
<div class="form-group col-md-6">
          <label>Marca: </label>
          <select id="cbxMarca" name="cbxMarca" class="form-control">
           <option value="">Seleccione...</option>
           <?php
           foreach ( $Datos_Marcas_Autos as $FilaMarca ) {
           ?>
           <option value="<?php echo $FilaMarca['id_marca']; ?>"><?php echo
          $FilaMarca['nombre_marca']; ?></option>
           <?php
           }
           ?>
          </select>
</div>
</div>
<!-- -------------------------- Fila 2 -------------------------- -->
<div class="form-row">
<div class="form-group col-md-6">
          <label>Modelo: </label>
          <select id="cbxModelo" name="cbxModelo" class="form-control">
           <option value="">Seleccione...</option>
           <?php
           foreach ( $Datos_Modelo as $FilaModelo ) {
           ?>
           <option value="<?php echo $FilaModelo['id_modelo']; ?>"><?php echo
          $FilaModelo['nombre_modelo']; ?></option>
           <?php
           }
           ?>
          </select>
        </div>
<div class="form-group col-md-8">
<label>Placa: </label>
<input type="text" class="form-control" id="txtPlaca" name="txtPlaca">
</div>
</div>
<!-- -------------------------- Fila 3 -------------------------- -->
<div class="form-row">
<div class="form-group col-md-4">
<label>Tipo Vehículo: </label>
<select id="cbxTipo" name="cbxTipo" class="form-control">
<option value="">Seleccione...</option>
<option value="Sedan">Sedan</option>
<option value="Camioneta">Camioneta</option>
<option value="Pickup">Pick Up</option>
</select>
</div>
<div class="form-group col-md-4">
<label>Color Vehículo: </label>
<input type="text" class="form-control" id="txtColorVeh" name="txtColorVeh">
</div>
<div class="form-group col-md-4">
<label>Año de Vehiculo: </label>
<input type="text" class="form-control" id="txtAnio" name="txtAnio">
</div>
</div>

<!-- --------------------------Fila 4 ----------------------------- -->
<div class="form-row">
<div class="form-group col-md-4">
<label>Vin Vehiculo </label>
<input type="text" class="form-control" id="txtVin" name="txtVin">
</div>
<div class="form-group col-md-4">
<label>Número de Motor: </label>
<input type="text" class="form-control" id="txtMotor" name="txtMotor">
</div>
<div class="form-group col-md-4">
<label>Estado de Vehículo: </label>
<select id="cbxEstadoVeh" name="cbxEstadoVeh" class="form-control">
<option value="">Seleccione...</option>
<option value="Ingresando">Ingresando</option>
<option value="Aceptado">Aceptado por el cliente</option>
<option value="Espera">Espera de repuesto</option>
<option value="EstadoReparacion">Estado de reparación</option>
<option value="FinalizadoTaller">Finalizado en el taller</option>
<option value="FueraTaller">Fuera del taller</option>
</select>
</div>
</div>
<!-- --------------------------Fila 5----------------------------- -->
<div class="form-row">
<div class="form-group col-md-4">
<label>Observaciones Vehiculo: </label>
<input type="text" class="form-control" id="txtObservacion" name="txtObservacion">
</div>
<div class="form-group col-md-4">
<label>Estado: </label>
<select id="cbxEstado" name="cbxEstado" class="form-control">
<option value="">Seleccione...</option>
<option value="1">Activo</option>
<option value="2">Inactivo</option>
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
if ( !document.getElementById('cbxCliente').value ) {
alert('Seleccione el nombre del cliente');
}
else if ( !document.getElementById('cbxMarca').value ) {
alert('Seleccione la marca del vehículo');
}
else if ( !document.getElementById('cbxModelo').value ) {
alert('Seleccione el modelo del vehículo');
}
else if ( !document.getElementById('cbxTipo').value ) {
alert('Seleccione tipo de vehículo');
}
else if ( !document.getElementById('cbxEstadoVeh').value ) {
alert('Seleccione el estado del vehículo');
}
else if ( !document.getElementById('txtColorVeh').value ) {
alert('Ingrese el color del vehículo');
}
else if ( !document.getElementById('txtAnio').value ) {
alert('Ingrese el año del vehículo');
}
else if ( !document.getElementById('txtVin').value ) {
alert('Ingrese el VIN del vehículo');
}
else if ( !document.getElementById('txtMotor').value ) {
alert('Ingrese el número de motor');
}
else if ( !document.getElementById('txtObservacion').value ) {
alert('Ingrese las observaciones del vehículo');
}
else if ( !document.getElementById('cbxEstado').value ) {
alert('Seleccione estado');
}
else {
document.forms.frmNuevo.action = 'index.php?mod=veh&form=ag';
document.forms.frmNuevo.submit();
}
}
</script>