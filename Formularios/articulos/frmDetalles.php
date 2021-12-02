<?php
	//Llamamos a la capa de datos
	require_once 'datos/datos.php';
	//Llamamos a la capa de negocio
	require_once 'negocio/articulos.php';
	//Instanciamos las clases de la capa de negocio
	$Obj_Articulos= new Articulos();
	//Cargamos el registro solicitado
	$DatosArticulos = $Obj_Articulos->BuscarPorId( $_GET['id'] );
	//Recuperamos el registro obtenido en una variable fila
	foreach ( $DatosArticulos as $Fila ) {
	$DatosArticulos = $Fila;
	}
?>

<!-- CSS -->
<link rel="stylesheet" href="css/iconfont/material-icons.css">
<link rel="stylesheet" href="css/bootstrap-4.3.1.min.css">
<link rel="stylesheet" href="css/formularios.css">

<div class="container">

	<div class="table-wrapper">
		<div class="table-title">
			<div class="form-row">
				<div class="col-md-8">
					<h2>Detalles  de Articulos</h2>
				</div>
				<div class="col-md-4">
					<button type="button" class="btn btn-success" onClick="location.replace('index.php?mod=art&form=li');"><i class="material-icons">&#xe5c4;</i><span>Regresar</span></button>
				</div>
			</div>
		</div>
<!-- -------------------------- Fila 1 -------------------------- -->
			<div class="form-row">
 				<div class="form-group col-md-8">
					<label>Nombre del Articulo: </label>					
 					<input type="text" class="form-control" id="txtNombreA" readonly value="<?php echo $Fila['nombre_articulo']; ?>">
 				</div>
 				</div>
 				<div class="form-row">
 				<div class="form-group col-md-8">
					<label>Descripcion: </label>					
 					<input type="text" class="form-control" id="txtDescripcion" readonly value="<?php echo $Fila['descripcion']; ?>">
 				</div>
 				</div>
 				<div class="form-row">
 				<div class="form-group col-md-8">
					<label>Categoria de articulo: </label>					
 					<input type="text" class="form-control" id="txtCateArt" readonly value="<?php echo $Fila['id_categoria_art']; ?>">
 				</div>
 				</div>
 				<div class="form-row">
 				<div class="form-group col-md-8">
					<label>Proveedor: </label>					
 					<input type="text" class="form-control" id="txtProveedor" readonly value="<?php echo $Fila['id_proveedor']; ?>">
 				</div>
 				</div>
 				<div class="form-row">
 				<div class="form-group col-md-8">
					<label>Marca de Articulo: </label>					
 					<input type="text" class="form-control" id="txtMarcArt" readonly value="<?php echo $Fila['id_marca_art']; ?>">
 				</div>
 				</div>
				<div class="form-row">
				<div class="form-group col-md-4">
				<label>Estado: </label>
				<input type="text" class="form-control" id="txtEstado" name="txtEstado" readonly value="<?php echo $Fila['estado']; ?>">
				</div>
			</div>
		</div> 	
<!-- Cierre de los primeros 2 div --->
	 <!-- Cierre del Div table-wrapper -->
</div> <!-- Cierre del Div container -->