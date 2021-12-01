<?php
//Llamamos a la capa de datos
require_once 'datos/datos.php';
//Llamamos a la capa de negocio
require_once 'negocio/departamentos.php';
require_once 'negocio/municipios.php';
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
				<li><a href="index.php?mod=clie&form=li"><span class="fas fa-caret-down"></span> Clientes</a></li>
				<li><a href="index.php?mod=prove&form=li"><span class="fas fa-truck"></span> Proveedores</a></li>
				<li><a href="index.php?mod=estveh&form=li"><span class="fas fa-file-alt"></span>Estado de <br>vehículo</a>
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
<label>Nombre: </label>
<input type="text" class="form-control" id="txtNombre" name="txtNombre">
</div>
<div class="form-group col-md-8">
<label>Apellidos: </label>
<input type="text" class="form-control" id="txtApellido" name="txtApellido">
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
else if ( !document.getElementById('txtApellido').value ) {
alert('Ingrese los apellidos del cliente');
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

