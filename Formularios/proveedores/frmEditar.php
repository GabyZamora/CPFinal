<?php
//Llamamos a la capa de datos
require_once 'datos/datos.php';
//Llamamos a la capa de negocio
require_once 'negocio/proveedor.php';
include('presentacion/menu.php');

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
 						<h2>Editar Proveedor</h2>
 					</div>
 					<div class="col-md-4">
						 <button type="button" class="btn btn-danger"
						onClick="location.replace('index.php?mod=prove&form=li');"><i class="materialicons">&#xe5c9;</i><span>Cancelar</span></button>
						 <button type="button" class="btn btn-success"
						onClick="ValidarEditar();"><i class="materialicons">&#xe161;</i><span>Guardar</span></button>
					 </div>
 				</div>
			</div>
<!-- -------------------------- Fila 1 -------------------------- -->
			<div class="form-row">
 				<div class="form-group col-md-8">
					<label>Nombre Comercial: </label>
 					<input type="text" class="form-control" id="txtNombreComercial" name="txtNombreComercial"value="<?php echo $Fila['nombre_comercial_proveedor']; ?>">
					<input type="hidden" class="form-control" id="hidId" name="hidId" value="<?php echo $Fila['id_proveedor']; ?>">
 				</div>
 				<div class="form-group col-md-8">
					<label>Nombre del Proveedor: </label>
 					<input type="text" class="form-control" id="txtNombreProveedor" name= "txtNombreProveedor"value="<?php echo $Fila['nombre_propietario_proveedor']; ?>">
					<input type="hidden" class="form-control" id="hidId" name="hidId" value="<?php echo $Fila['id_proveedor']; ?>">
 				</div>
 				<div class="form-group col-md-8">
					<label>Giro: </label>
 					<input type="text" class="form-control" id="txtGiro" name="txtGiro"value="<?php echo $Fila['giro_proveedor']; ?>">
					<input type="hidden" class="form-control" id="hidId" name="hidId" value="<?php echo $Fila['id_proveedor']; ?>">
 				</div>
 			</div>
<!-- -------------------------- Fila 2 -------------------------- -->
			<div class="form-row">
 				<div class="form-group col-md-8">
					<label>DUI: </label>
 					<input type="text" class="form-control" id="txtDUI" name= "txtDUI"value="<?php echo $Fila['DUI_proveedor']; ?>">
					<input type="hidden" class="form-control" id="hidId" name="hidId" value="<?php echo $Fila['id_proveedor']; ?>">
 				</div>
 				<div class="form-group col-md-8">
					<label>NIT: </label>
 					<input type="text" class="form-control" id="txtNIT" name="txtNIT"value="<?php echo $Fila['NIT_proveedor']; ?>">
					<input type="hidden" class="form-control" id="hidId" name="hidId" value="<?php echo $Fila['id_proveedor']; ?>">
 				</div>
 				<div class="form-group col-md-8">
					<label>Dirección: </label>
 					<input type="text" class="form-control" id="txtDireccion" name="txtDireccion"value="<?php echo $Fila['direccion_proveedor']; ?>">
					<input type="hidden" class="form-control" id="hidId" name="hidId" value="<?php echo $Fila['id_proveedor']; ?>">
 				</div>
 			</div>
<!-- -------------------------- Fila 3 -------------------------- -->
			<div class="form-row">
 				<div class="form-group col-md-8">
					<label>Telefono 1: </label>
 					<input type="text" class="form-control" id="txtTelefono1" name="txtTelefono1"value="<?php echo $Fila['telefono1_proveedor']; ?>">
					<input type="hidden" class="form-control" id="hidId" name="hidId" value="<?php echo $Fila['id_proveedor']; ?>">
 				</div>
 				<div class="form-group col-md-8">
					<label>Telefono 2: </label>
 					<input type="text" class="form-control" id="txtTelefono2" name="txtTelefono2"value="<?php echo $Fila['telefono2_proveedor']; ?>">
					<input type="hidden" class="form-control" id="hidId" name="hidId" value="<?php echo $Fila['id_proveedor']; ?>">
 				</div>
 				<div class="form-group col-md-8">
					<label>Telefono 3: </label>
 					<input type="text" class="form-control" id="txtTelefono3" name="txtTelefono3"value="<?php echo $Fila['telefono3_proveedor']; ?>">
					<input type="hidden" class="form-control" id="hidId" name="hidId" value="<?php echo $Fila['id_proveedor']; ?>">
 				</div>
 			</div>
<!-- --------------------------Fila5----------------------------- -->
		  <div class="form-row">
        <div class="form-group col-md-4">
          <label>Estado: </label>
          <select id="cbxEstado" name="cbxEstado" class="form-control">
         <option value="<?php echo $Fila['estado']; ?>">
          <option value="">Activo</option>
          <option value="">Inactivo</option>
          </select>
        </div>
      </div>
    </div> <!-- Cierre del Div table-wrapper -->
  </div> <!-- Cierre del Div container -->
</form>
<!-- -------------------- Validaciones de ingreso de datos -------------------- -->
<script type="text/javascript">
	function ValidarEditar(){
		if ( !document.getElementById('txtNombreComercial').value ) {
		alert('Ingrese el nombre Comercial del Proveedor');
		}
		else if ( !document.getElementById('txtNombreProveedor').value ){
		alert('Ingrese el nombre completo del proveedor');
		}
		else if ( !document.getElementById('txtGiro').value ) {
		alert('Ingrese el genero del proveedor');
		}
		else if ( !document.getElementById('txtDUI').value ) {
		alert('Ingrese número de DUI');
		}

		else if ( !document.getElementById('txtNIT').value ) {
		alert('Ingrese número de nit del proveedor');
		}
		else if ( !document.getElementById('txtDireccion').value ) {
		alert('Ingrese la direccion del proveedor');
		}
		else if ( !document.getElementById('txtTelefono1').value ) {
		alert('Ingrese el numero de telefono  del proveedor');
		}
		else if ( !document.getElementById('txtTelefono2').value ) {
		alert('Ingrese el numero de telefono  del proveedor');
		}
		else if ( !document.getElementById('txtTelefono3').value ) {
		alert('Ingrese el numero de telefono  del proveedor');
		}
		else if ( !document.getElementById('cbxEstado').value ) {
		alert('Seleccione estado');
		}
		else {
document.forms.frmEditar.action = 'index.php?mod=prove&form=ac';
document.forms.frmEditar.submit();
}
}
</script>