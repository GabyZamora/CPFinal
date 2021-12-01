<?php
//Llamamos a la capa de datos
require_once 'datos/datos.php';
//Llamamos a la capa de negocio
require_once 'negocio/proveedor.php';
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
	<style type="text/css">
				*{
			margin: 0;
			padding: 0;
			user-select: none;
			box-sizing: border-box;

		}
		.sidebar{
			position: absolute;
			width: 250px;
			height: 100%;
			left: 0;
			top: 70px;
			background-color: white;
			overflow: auto;
		}

		#sidemenu #profile{
			border-bottom: solid 1px var(--hovercolor);
			padding: var(--padding) 0;
			text-align: center;
		}

		#sidemenu #profile #photo{
			box-sizing: border-box;
			padding: var(--padding);
			margin: 0 auto;
		}
		.sidebar .text{
			color: white;
			font-size: 25px;
			font-weight: 600;
			line-height: 65px;
			text-align: center;
			background: #032c55;
			letter-spacing: 1px;
		}

		nav ul{
			background: white;
			height: 100%;
			width: 100%;
			list-style: none;
		}

		nav ul li{
			line-height: 60px;	
		}

		nav ul li a{
			position: relative;
			color: black;
			text-decoration: none;
			font-size: 18px;
			padding-left: 40px;
			font-weight: 500;
			display: block;
			width: 100%;
		}

		nav ul li a:hover{
			color: #f7dc74;
		}

		nav ul ul{
			position: static;
			display: none;
		}

		nav ul .vehi-show.show{
			display: block;
		}

		nav ul ul li{
			line-height: 42px;
			border-bottom: none;
		}

		nav ul ul li a{
			font-size: 17px;
			padding-left: 80px;
		}

		nav ul li a span{
			position: absolute;
			top: 50%;
			right: 20px;
			transform: translateY(-50%);
			font-size: 22px;
			transition: transform 0.4s;
		}

		nav ul li a:hover span{
			transform: translateY(-50%) rotate(-180deg);
		}

		
	</style>
</head>
<body>
	<nav class="navbar navbar-default navbar-expand-lg navbar-light"> 
		<div class="navbar-header d-flex col"> 
			<a class="navbar-brand" href="index.php?mod=menu">Autos <b>Consultoria Profesional</b>
			</a> 
			<img style="height:60px; width:60px;"src="images/car.png">
		</div>
	</nav> 
	<nav class="sidebar">
			<div class="text">
				<div id="profile">
					<div id="photo"><img style="width:100px; height:auto;"src="images/logo.png" alt=""></div>
			</div>
			</div>
			<ul>
				<li><a href="index.php?mod=menu"><span class="fas fa-home"></span>Inicio</a></li>
				<li><a href="index.php?mod=usu&form=li"><span class="fas fa-user"></span> Usuarios</a></li>
				<li><a href="index.php?mod=clie&form=li"><span class="fas fa-clipboard-list"></span> Clientes</a></li>
				<li><a href="index.php?mod=prove&form=li"><span class="fas fa-truck"></span> Proveedores</a></li>
				<li>
					<a href="#" class="vehi-btn">Vehículos
						<span class="fas fa-caret-down first"></span>
					</a>
					<ul class="vehi-show">
						<li><a href="index.php?mod=veh&form=li">Gestión de Vehículos</a></li>
						<li><a href="index.php?mod=model&form=li">Modelos</a></li>
						<li><a href="index.php?mod=marc&form=li">Marcas</a></li>
					</ul>
				</li>
				<li>
					<a href="#" class="art-btn">Inventario
						<span class="fas fa-caret-down first"></span>
					</a>
					<ul class="art-show">
						<li><a href="#">Artículos</a></li>
						<li><a href="index.php?mod=catar&form=li">Categorías</a></li>
						<li><a href="index.php?mod=marcaarti&form=li">Marcas</a></li>
					</ul>
				</li>
				<li>
					<a href="#" class="ser-btn">Servicios
						<span class="fas fa-caret-down first"></span>
					</a>
					<ul class="ser-show">
						<li><a href="index.php?mod=ser&form=li">Gestión de servicios</a></li>
						<li><a href="index.php?mod=catse&form=li">Categorías</a></li>
					</ul>
				</li>
				<li><a href="index.php"><span class="fas fa-sign-out-alt"></span>Cerrar sesión</a></li>
			</ul>
		</nav>
	<script>
		$('.vehi-btn').click(function(){
			$('nav ul .vehi-show').toggleClass("show");
		});
		$('.art-btn').click(function(){
			$('nav ul .art-show').toggleClass("show");
		});
		$('.ser-btn').click(function(){
			$('nav ul .ser-show').toggleClass("show");
		});
	</script>

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
          <option value="Activo">Activo</option>
          <option value="Inactivo">Inactivo</option>
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