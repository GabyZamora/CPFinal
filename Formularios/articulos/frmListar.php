<?php
	//Llamamos a la capa de datos
	require_once 'datos/datos.php';
	//Llamamos a la capa de negocio
	require_once 'negocio/paginador.php';
	require_once 'negocio/articulos.php';
	include('presentacion/menu.php');

	//Instanciamos las clases de la capa de negocio
	$Obj_Paginador = new Paginador();
	$Obj_Articulos = new Articulos();
	//Asignamos los valores necesarios a los atributos de la clase del paginador ---
	$Obj_Paginador->Cadena = $Obj_Articulos->ListarTodos( addslashes(
	@$_POST['txtBuscar'] ) );
	$Obj_Paginador->CantTotalReg = $Obj_Articulos->CantTotalRegistros( addslashes(
	@$_POST['txtBuscar'] ) );
	$Obj_Paginador->FilasPorPagina = 10; //Define la cantidad de registros mostrados por página
	$Obj_Paginador->NumPagina = @$_GET['np']; //Define la página solicitada al paginador
	$Obj_Paginador->EnlaceListar = "mod=art&form=li"; //Define el enlace al modulo y formulario listar de ese módulo
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

<div class="container">
	<div class="table-wrapper">
		<div class="table-title">
			<div class="form-row">
				<div class="col-md-4">
					<a href="index.php?mod=art&form=li" class="a-tituloform"><h2>Gestión de <b>Articulos</b></h2></a>
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
					<button type="button" class="btn btn-danger" data-toggle="modal" onClick="location.replace('index.php?mod=menu');">
						<i class="material-icons">&#xe879;</i><span>Cerrar</span></button>
						<button type="button" class="btn btn-success"
						onClick="location.replace('index.php?mod=art&form=nu');">
						<i class="material-icons">&#xe148;</i><span>Agregar Nuevo</span>
					</button>
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
					<th>Articulo</th>
					<th>Marca</th>
					<th>Categoría</th>
					<th>Descripción</th>
						<th>Acciones</th>
				</tr>
			</thead>
			<tbody>
				<?php
				// Recperamos los registros de la tabla (vienen de la clase paginador) y los mostramos en la tabla HTML
					foreach ( $Obj_Paginador->RegistrosPaginados as $Fila ) {
				?>
				<tr>
					<td><?php echo $Fila['NombreArticulo']; ?></td>
					<td><?php echo $Fila['NombreMarcaArticulos']; ?></td>
						<td><?php echo $Fila['NombreCategoriaArticulos']; ?></td>
					<td><?php echo $Fila['descripcion']; ?></td>
					<td>
						<a href="index.php?mod=art&form=de&id=<?php echo $Fila['id_articulo'];?>" class="view" title="Detalles"><i class="material-icons">&#xE417;</i></a>
						<a href="index.php?mod=art&form=ed&id=<?php echo $Fila['id_articulo']; ?>" class="edit"><i class="material-icons" datatoggle="tooltip" title="Editar">&#xE254;</i></a>
						<a href="#" class="delete" onclick="Eliminar('<?php echo
					$Fila['id_articulo']; ?>');"><i class="material-icons" data-toggle="tooltip"
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
		window.location.replace('index.php?mod=art&form=el&id=' +
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