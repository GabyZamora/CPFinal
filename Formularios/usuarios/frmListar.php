<?php
	//Llamamos a la capa de datos
	require_once 'datos/datos.php';
	//Llamamos a la capa de negocio
	require_once 'negocio/paginador.php';
	require_once 'negocio/usuarios.php';
	//Instanciamos las clases de la capa de negocio
	$Obj_Paginador = new Paginador();
	$Obj_Usuarios = new Usuarios();
	//Asignamos los valores necesarios a los atributos de la clase del paginador ---
	$Obj_Paginador->Cadena = $Obj_Usuarios->ListarTodos( addslashes(
	@$_POST['txtBuscar'] ) );
	$Obj_Paginador->CantTotalReg = $Obj_Usuarios->CantTotalRegistros( addslashes(
	@$_POST['txtBuscar'] ) );
	$Obj_Paginador->FilasPorPagina = 5; //Define la cantidad de registros mostrados por página
	$Obj_Paginador->NumPagina = @$_GET['np']; //Define la página solicitada al paginador
	$Obj_Paginador->EnlaceListar = "mod=usua&form=li"; //Define el enlace al modulo y formulario listar de ese módulo
	//Aplicamos la configuración al paginador
	$Obj_Paginador->ConfPaginador();
	//Fin de configuraciones del paginador ------------------------------------------
?>
<!-- CSS -->
<head>
	<link rel="stylesheet" href="css/iconfont/material-icons.css">
	<link rel="stylesheet" href="css/bootstrap-4.3.1.min.css">
	<link rel="stylesheet" href="css/formularios.css">
	<!-- JS -->
	<script src="js/jquery-3.4.0.min.js"></script>
	<script src="js/bootstrap-4.3.1.min.js"></script>
	
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
					</ul>
				</li>
				<li>
					<a href="#" class="ser-btn">Servicios
						<span class="fas fa-caret-down first"></span>
					</a>
					<ul class="ser-show">
						<li><a href="#">Gestión de servicios</a></li>
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
		 		<div class="col-md-4">
		 			<a href="index.php?mod=usua&form=li" class="a-tituloform"><h2>Gestión de <b>Usuarios</b></h2></a>
		 		</div>
		 		<div class="col-md-3">
		 			<div class="input-group">
		 				<form action="" method="post">
		 					<div class="input-group-append">
		 						<input type="text" class="form-control"
								placeholder="Buscar..." name="txtBuscar" id="txtBuscar" value="<?php echo
								@$_POST['txtBuscar']; ?>">
		 						<button class="btn btn-info" type="submit"
								style="margin-left: -3px; height: 35px;">
		 						<i class="material-icons">&#xe8b6;</i>
		 						</button>
		 					</div>
		 				</form>
		 			</div>
		 		</div>
		 		<div class="col-md-5">
				 	<button type="button" class="btn btn-danger" data-toggle="modal"
            		onClick="location.replace('index.php?mod=menu');">
           			 <i class="material-icons">&#xe879;</i><span>Cerrar</span></button>
		 			<button type="button" class="btn btn-success"
					onClick="location.replace('index.php?mod=usu&form=nu');">
		 			<i class="material-icons">&#xe148;</i><span>Agregar
					Nuevo</span></button>
		 		</div>
	 		</div>
	 	</div>
	 <?php
	 //----------------------------------- Mostramos los controles (botones) del paginador ----------------------------------
	 echo $Obj_Paginador->MostrarControles();
	 ?>
	 <br>
	 	<table class="table table-striped table-hover">
	 		<thead>
	 			<tr>
	 				<th>Nombre Completo</th>
	 				<th>Usuario</th>
					 <th>Acciones</th>
	 			</tr>
	 		</thead>
	 		<tbody>
			 <?php
			 // Recperamos los registros de la tabla (vienen de la clase paginador) y los mostramos en la tabla HTML
				 foreach ( $Obj_Paginador->RegistrosPaginados as $Fila ) {
			 ?>
	 			<tr>
		 			<td><?php echo $Fila['nombre_usuario']; ?></td>
		 			<td><?php echo $Fila['Usuario']; ?></td>
		 			<td>
					 <a href="#" class="view" onClick="ReestablecerPassword('<?php
					echo $Fila['IdUsuario']; ?>');" title="Reestablecer Password"><i class="materialicons">&#xe0da;</i></a>
					 <a href="index.php?mod=usu&form=ed&id=<?php echo
					$Fila['id_usuario']; ?>" class="edit"><i class="material-icons" datatoggle="tooltip" title="Editar">&#xE254;</i></a>
					 <a href="#" class="delete" onClick="Eliminar('<?php echo
					$Fila['IdUsuario']; ?>');"><i class="material-icons" data-toggle="tooltip"
					title="Eliminar">&#xE872;</i></a>
					</td>
			 	</tr>
				 <?php
				 }
				 ?>
			 </tbody>
		</table>
 	</div> <!-- Cierre del Div table-wrapper -->
</div> <!-- Cierre del Div container -->
<script type="text/javascript">
	function Eliminar( paId ){
		if( confirm('¿Confirma eliminar este registro?') ){
		window.location.replace('index.php?mod=usua&form=el&id=' +
		paId);
		}
	}
	//Función para reestablecer el password de la cuenta
	function ReestablecerPassword( paId ){
		if( confirm('¿Confirma reestablecer el password de esta cuenta?') ){
		window.location.replace('index.php?mod=usua&form=rp&id=' +
		paId);
		}
	}
</script>
<?php
	require_once 'Formularios/myAlert.php';
	if ( isset( $_GET['m'] ) ) {
		if ( $_GET['m'] == 'success' ) {
		 echo "<script>myAlertSuccess();</script>";
		}
		else if ( $_GET['m'] == 'error' ) {
		 echo "<script>myAlertDanger();</script>";
		}
		else if ( $_GET['m'] == 'update' ) {
		 echo "<script>myAlertInfo();</script>";
		}
		else if ( $_GET['m'] == 'delete' ) {
		 echo "<script>myAlertWarning();</script>";
		}
	}
?>