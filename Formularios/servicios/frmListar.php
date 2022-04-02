<?php
	//Llamamos a la capa de datos
	require_once 'datos/datos.php';
	//Llamamos a la capa de negocio
	require_once 'negocio/paginador.php';
	require_once 'negocio/servicios.php';
	include('presentacion/menu.php');
	//Instanciamos las clases de la capa de negocio
	require_once 'negocio/categoriaservicios.php';
	$Obj_Categoria_Servicio= new Categoria_Servicio();
	$DatosCategoria_Servicio = $Obj_Categoria_Servicio->ListarTodoCombos();
	$Obj_Paginador = new Paginador();
	$Obj_Servicios = new Servicios();
	
	//Asignamos los valores necesarios a los atributos de la clase del paginador ---
	$Obj_Paginador->Cadena = $Obj_Servicios->ListarTodos( addslashes(
	@$_POST['txtBuscar'] ) );
	$Obj_Paginador->CantTotalReg = $Obj_Servicios->CantTotalRegistros( addslashes(
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
</head>
<body>
<div class="container">
	<div class="table-wrapper">
		<div class="table-title">
			<div class="form-row">
		 		<div class="col-md-4">
		 			<a href="index.php?mod=ser&form=li" class="a-tituloform"><h2>Gestión de <b>Servicios</b></h2></a>
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
					onClick="location.replace('index.php?mod=ser&form=nu');">
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
	 				<th>Servicio</th>
	 				<th>Detalles</th>
					 <th>Categoría</th>
					 <th>Acciones</th>
	 			</tr>
	 		</thead>
	 		<tbody>
			 <?php
			 // Recperamos los registros de la tabla (vienen de la clase paginador) y los mostramos en la tabla HTML
				 foreach ( $Obj_Paginador->RegistrosPaginados as $Fila ) {
			 ?>
	 			<tr>
		 			<td><?php echo $Fila['NombreServicio']; ?></td>
		 			<td><?php echo $Fila['Detalles']; ?></td>
					 <td><?php echo $Fila['NombreCategoria']; ?></td>
		 			<td>
					 <a href="index.php?mod=ser&form=ed&id=<?php echo
					$Fila['id_servicio']; ?>" class="edit"><i class="material-icons" datatoggle="tooltip" title="Editar">&#xE254;</i></a>
					 <a href="#" class="delete" onclick="Eliminar('<?php echo
					$Fila['id_servicio']; ?>');"><i class="material-icons" data-toggle="tooltip"
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
		window.location.replace('index.php?mod=ser&form=el&id=' +
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