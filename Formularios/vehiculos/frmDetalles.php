<?php
//Llamamos a la capa de datos
require_once 'datos/datos.php';
//Llamamos a la capa de negocio
require_once 'negocio/vehiculos.php';
//Instanciamos las clases de la capa de negocio
$Obj_Vehiculos = new Vehiculos();
//Cargamos el registro solicitado
$DatosVehiculos = $Obj_Vehiculos->BuscarPorId( $_GET['id'] );
//Recuperamos el registro obtenido en una variable fila
foreach ( $DatosVehiculos as $Fila ) {
$DatosVehiculos = $Fila;
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
			position: fixed;
			width: 250px;
			height: 100%;
			left: 0;
			top: 70px;
			background-color: white;
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
				<li><a href="index.php?mod=estveh&form=li"><span class="fas fa-file-alt"></span>Estado de <br>vehículo</a>
				<li>
					<a href="#" class="vehi-btn">Vehículos
						<span class="fas fa-caret-down first"></span>
					</a>
					<ul class="vehi-show">
						<li><a href="#">Gestión de Vehículos</a></li>
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
						<li><a href="index.php?mod=estveh&form=li">Estado de Vehículo</a></li>
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

<div class="container">

	<div class="table-wrapper">
		<div class="table-title">
			<div class="form-row">
				<div class="col-md-8">
					<h2>Detalles de Vehiculo</h2>
				</div>
				<div class="col-md-4">
					<button type="button" class="btn btn-info" onclick="window.open('reportes/detalleVehiculo.php?id=<?php echo $_GET['id'] ?>', 'ReporteDetVehiculo', 'width=1000,height=600');"><i class="material-icons">&#xe8ad;</i><span>Imprimir</span></button>
					<button type="button" class="btn btn-success" onClick="location.replace('index.php?mod=veh&form=li');"><i class="material-icons">&#xe5c4;</i><span>Regresar</span></button>
				</div>
			</div>
		</div>
<!-- -------------------------- Fila 1 -------------------------- -->
		<div class="form-row">
			<div class="form-group col-md-8">
				<label>Nombre: </label>
				<input type="text" class="form-control" id="txtNombre" name="txtNombreC" readonly value="<?php echo $Fila['nombre_cliente']; ?>">
			</div>
			<div class="form-group col-md-6">
				<label>Marca: </label>
				<input class="form-control" id="cbxMarca" name="cbxMarca" readonly value="<?php echo $Fila['nombre_marca']; ?>">
			</div>
			<div class="form-group col-md-4">
				<label>Modelo: </label>
				<input  class="form-control" id="cbxModelo" name="cbxModelo" readonly value="<?php echo $Fila['nombre_modelo']; ?>">
			</div>
		</div>
<!-- -------------------------- Fila 2 -------------------------- -->
		<div class="form-row">
			<div class="form-group col-md-8">
				<label>Placa: </label>
				<input type="text" class="form-control" id="txtPlaca" name="txtPlaca" readonly value="<?php echo $Fila['placa']; ?>">
			</div>
			<div class="form-group col-md-4">
				<label>Tipo Vehiculo: </label>
				<input type="text" class="form-control" id="txtTipoVeh" name="txtTipoVeh" readonly value="<?php echo $Fila['tipo_vehiculo']; ?>">
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-4">
				<label>Color: </label>
				<input type="text" class="form-control" id="txtColorVeh" name="txtColorVeh" readonly value="<?php echo $Fila['color_vehiculo']; ?>">
			</div>
			<div class="form-group col-md-4">
				<label>Año Vehiculo: </label>
				<input type="text" class="form-control" id="txtAnio" name="txtAnio" readonly value="<?php echo $Fila['anio_vehiculo']; ?>">
			</div>
		</div>
<!-- -------------------------- Fila 4 -------------------------- -->

		<div class="form-row">
			<div class="form-group col-md-4">
				<label>Vin : </label>
				<input type="text" class="form-control" id="txVin" name="txtVin" readonly value="<?php echo $Fila['vin_vehiculo']; ?>">
			</div>
			<div class="form-group col-md-4">
				<label>Número de Motor : </label>
				<input type="text" class="form-control" id="txtMotor" name="txtMotor" readonly value="<?php echo $Fila['numero_motor_vehiculo']; ?>">
			</div>
			<div class="form-group col-md-4">
				<label>Observaciones : </label>
				<input type="text" class="form-control" id="txObservacion" name="txtObservacion" readonly value="<?php echo $Fila['observaciones_vehiculo']; ?>">
			</div>
		</div>
		
<!-- -------------------------- Fila 5 -------------------------- -->
		<div class="form-row">
			<div class="form-group col-md-4">
				<label>Fecha de Ingreso: </label>
				<input type="text" class="form-control" id="txtFechIngreso" name="txtFechIngreso" readonly value="<?php echo $Fila['fecIngreso_cliente']; ?>">
			</div>
			
			<div class="form-group col-md-4">
				<label>Fecha de Modificación: </label>
				<input type="text" class="form-control" id="txtFechModificacon" name="txtFechModificacion" readonly value="<?php echo $Fila['fechModificacion_cliente']; ?>">
			</div>
				<div class="form-group col-md-4">
					<label>Estado: </label>
					<input type="text" class="form-control" id="txtEstado" name="txtEstado" readonly value="<?php echo $Fila['estado']; ?>">
				</div>
			</div>
<!-- Cierre de los primeros 2 div --->
	</div> <!-- Cierre del Div table-wrapper -->
</div> <!-- Cierre del Div container -->