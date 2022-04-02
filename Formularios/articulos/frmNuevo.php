<?php
require_once 'datos/datos.php';
require_once 'negocio/cat_articulo.php';
require_once 'negocio/marcaarticulos.php';
require_once 'negocio/proveedor.php';
include('presentacion/menu.php');

$Obj_Cat_Articulo = new Cat_Articulo();
$Datos_Catar = $Obj_Cat_Articulo->ListarTodoCombos();
$Obj_Marcas_Articulos = new Marcas_Articulos();
$DatosMarcas_Articulos = $Obj_Marcas_Articulos->ListarTodoCombos();
$Obj_Proveedor = new Proveedor();
$DatosProveedor = $Obj_Proveedor->ListarTodoCombos();
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
<form name="frmNuevo" action="" method="post">
	<div class="container">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="form-row">
					<div class="col-md-8">
						<h2>Nuevo Articulo</h2>
					</div>
					<div class="col-md-4">
						<button type="button" class="btn btn-danger"
						onClick="location.replace('index.php?mod=art&form=li');"><i class="material-icons">&#xe5c9;</i><span>Cancelar</span></button>
						<button type="button" class="btn btn-success"
						onClick="ValidarNuevo();"><i class="material-icons">&#xe161;</i><span>Guardar</span></button>
					</div>
				</div>
			</div>
			<!-- -------------------------- Fila 1 -------------------------- -->
			<div class="form-row">
				<div class="form-group col-md-8">
					<label>Nombre de Articulo: </label>
					<input type="text" class="form-control" id="txtNombreAr"
					name="txtNombreAr">
				</div>
			</div>
			<!-- -------------------------- Fila 2 -------------------------- -->
			<div class="form-row">
				<div class="form-group col-md-8">
					<label>Descripcion: </label>
						<textarea class="form-control" id="txtDescripcion" name="txtDescripcion"
					rows="3"></textarea>
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label>Categoria de Articulo: </label>
						<select id="cbxCateArt" name="cbxCateArt" class="form-control">
							<option value="">Seleccione...</option>
							<?php
							foreach ( $Datos_Catar as $FilaCategoriaArt ) {
							?>
						<option value="<?php echo $FilaCategoriaArt['id_categoria_art']; ?>"><?php echo
						$FilaCategoriaArt['nombre_categoria_art']; ?></option>
							<?php
							}
							?>
					</select>
				</div>
			</div>
		</div> <!-- Cierre del Div table-wrapper -->
		<div class="form-row">
				<div class="form-group col-md-6">
					<label>Proveedor: </label>
						<select id="cbxProveedor" name="cbxProveedor" class="form-control">
							<option value="">Seleccione...</option>
							<?php
							foreach ( $DatosProveedor as $FilaProveedor ) {
							?>
						<option value="<?php echo $FilaProveedor['id_proveedor']; ?>"><?php echo
						$FilaProveedor['nombre_comercial_proveedor']; ?></option>
							<?php
							}
							?>
					</select>
				</div>
		</div> 
		<div class="form-row">
				<div class="form-group col-md-6">
					<label>Marcas de Articulos: </label>
						<select id="cbxMarcArt" name="cbxMarcArt" class="form-control">
							<option value="">Seleccione...</option>
							<?php
							foreach ( $DatosMarcas_Articulos as $FilaMarcas_Articulos ) {
							?>
						<option value="<?php echo $FilaMarcas_Articulos['id_marca_art']; ?>"><?php echo
						$FilaMarcas_Articulos['nombreMarca']; ?></option>
							<?php
							}
							?>
					</select>
				</div>
		</div> 
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
	function ValidarNuevo(){
		 if ( !document.getElementById('txtNombreAr').value ) {
		 alert('Ingrese el nombre del Articulo');
		 }
		 else if ( !document.getElementById('txtDescripcion').value ) {
		 alert('Ingrese los descripcion del articulo');
		 }

		 else if( !document.getElementById('cbxCateArt').value){
    	alert('Seleccione categoría de artículo');
    	}
		else if( !document.getElementById('cbxProveedor').value){
    	alert('Seleccione el proveedor');
    	}
		else if( !document.getElementById('cbxMarcArt').value){
    	alert('Seleccione la marca del artículo');
    	}
		 else if( !document.getElementById('cbxEstado').value){
    	alert('Seleccione estado');
    	}
		 else {
		 document.forms.frmNuevo.action = 'index.php?mod=art&form=ag';
		 document.forms.frmNuevo.submit();
		 }
	}
</script>