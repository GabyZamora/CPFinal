<?php
//Llamamos a la capa de datos
require_once 'datos/datos.php';
//Llamamos a la capa de negocio
require_once 'negocio/clientes.php';
require_once 'negocio/departamentos.php';
require_once 'negocio/municipios.php';
include('presentacion/menu.php');

//Instanciamos las clases de la capa de negocio
$Obj_Clientes = new Clientes();
$Obj_Departamentos = new Departamentos();
$Obj_Municipios = new Municipios();
//Cargamos el registro del producto solicitado
$DatosClientes = $Obj_Clientes->BuscarPorId( $_GET['id'] );
//Recuperamos los registros de las categorías y las marcas, para los combos
$DatosDepartamentos = $Obj_Departamentos->ListarTodoCombos();
$DatosMunicipios = $Obj_Municipios->ListarTodoCombos();
//Recuperamos el registro obtenido en una variable fila
foreach ( $DatosClientes as $Fila ) {
	$DatosClientes = $Fila;
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
<h2>Editar Cliente</h2>
</div>
<div class="col-md-4">
<button type="button" class="btn btn-danger"
onClick="location.replace('index.php?mod=clie&form=li');"><i class="material-icons">&#xe5c9;</i><span>Cancelar</span></button>
<button type="button" class="btn btn-success" onClick="ValidarEditar();"><i
class="material-icons">&#xe161;</i><span>Guardar</span></button>
</div>
</div>
</div>
<!-- -------------------------- Fila 1 -------------------------- -->
<div class="form-row">
<div class="form-group col-md-8">
<label>Nombre Completo: </label>
<input type="text" class="form-control" id="txtNombre" name="txtNombre"
value="<?php echo $Fila['NombreCliente']; ?>">
					<input type="hidden" class="form-control" id="hidId" name="hidId" value="<?php echo $Fila['id_cliente']; ?>">
</div>
</div>
<!-- -------------------------- Fila 2 -------------------------- -->
<div class="form-row">
<div class="form-group col-md-8">
<label>Dirección: </label>
<input type="text" class="form-control" id="txtDireccion" name="txtDireccion"
value="<?php echo $Fila['direccion_cliente']; ?>">
					<input type="hidden" class="form-control" id="hidId" name="hidId" value="<?php echo $Fila['id_cliente']; ?>">
</div>
</div>

<div class="form-row">
<div class="form-group col-md-8">
<label>Giro NRC: </label>
<input type="text" class="form-control" id="txtGiroNrc" name="txtGiroNrc"
value="<?php echo $Fila['giro_nrc']; ?>">
					<input type="hidden" class="form-control" id="hidId" name="hidId" value="<?php echo $Fila['id_cliente']; ?>">
</div>
</div>


<!-- -------------------------- Fila 3 -------------------------- -->
<div class="form-row">
	<div class="form-group col-md-4">
<label>Departamento: </label>
<select id="cbxDepa" name="cbxDepa" class="form-control">
<option value="<?php echo $Fila['id_departamento']; ?>"><?php echo
            $Fila['Departamento']; ?></option>
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
	<option value="<?php echo $Fila['id_municipio']; ?>"><?php echo
            $Fila['Municipio']; ?></option>
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
<input type="text" class="form-control" id="txtTel" name="txtTel"
value="<?php echo $Fila['telefono_cliente']; ?>">
					<input type="hidden" class="form-control" id="hidId" name="hidId" value="<?php echo $Fila['id_cliente']; ?>">
</div>
<div class="form-group col-md-4">
<label>Correo: </label>
<input type="text" class="form-control" id="txtCorreo" name="txtCorreo"
value="<?php echo $Fila['correo_cliente']; ?>">
					<input type="hidden" class="form-control" id="hidId" name="hidId" value="<?php echo $Fila['id_cliente']; ?>">
</div>
</div>

<!-- --------------------------Fila 5 ----------------------------- -->
<div class="form-row">
<div class="form-group col-md-4">
<label>Factura: </label>
<input type="text" class="form-control" id="txtFactura" name="txtFactura"
value="<?php echo $Fila['Factura']; ?>" readonly>
</div>
<div class="form-group col-md-4">
<label>NIT: </label>
<input type="tel" class="form-control" id="txtNIT" name="txtNIT"
value="<?php echo $Fila['nit_cliente']; ?>">
					<input type="hidden" class="form-control" id="hidId" name="hidId" value="<?php echo $Fila['id_cliente']; ?>">
</div>

</div>

<!-- --------------------------Fila 5----------------------------- -->
<div class="form-row">
<div class="form-group col-md-4">
<label>NRC: </label>
<input type="tel" class="form-control" id="txtNRC" name="txtNRC"
value="<?php echo $Fila['nrc_cliente']; ?>">
					<input type="hidden" class="form-control" id="hidId" name="hidId" value="<?php echo $Fila['id_cliente']; ?>">

</div>
<div class="form-group col-md-4">
<label>Estado: </label>
<select id="cbxEstado" name="cbxEstado" class="form-control">
<option value="<?php echo $Fila['estado']; ?>"></option>
<option value="">ACTIVO</option>
<option value="">INACTIVO</option>
</select>
</div>
</div>

</div> <!-- Cierre del Div table-wrapper -->
</div> <!-- Cierre del Div container -->
</form>
<!-- -------------------- Validaciones de ingreso de datos -------------------- -->
<script type="text/javascript">
function ValidarEditar(){
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
alert('Ingrese NRC');
}
else if ( !document.getElementById('txtGiroNrc').value ) {
alert('Ingrese Giro NRC');
}
else if ( !document.getElementById('cbxEstado').value ) {
alert('Seleccione estado');
}
else {
document.forms.frmEditar.action = 'index.php?mod=clie&form=ac';
document.forms.frmEditar.submit();
}
}
</script>