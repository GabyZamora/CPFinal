<?php
//Llamamos a la capa de datos
require_once 'datos/datos.php';
//Llamamos a la capa de negocio
require_once 'negocio/cat_articulo.php';
//Instanciamos las clases de la capa de negocio
$Obj_Cat_Articulo = new Cat_Articulo();
//Cargamos el registro solicitado
$Datos_Catar = $Obj_Cat_Articulo->BuscarPorId( $_GET['id'] );
//Recuperamos el registro obtenido en una variable fila
foreach ( $Datos_Catar as $Fila ) {
$Datos_Catar = $Fila;
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
					<h2>Detalles de las categorías de artículos</h2>
				</div>
				<div class="col-md-4">
					<button type="button" class="btn btn-success" onClick="location.replace('index.php?mod=catar&form=li');"><i class="material-icons">&#xe5c4;</i><span>Regresar</span></button>
				</div>
			</div>
		</div>
<!-- -------------------------- Fila 1 -------------------------- -->
		<div class="form-row">
			<div class="form-group col-md-8">
				<label>Nombre de la Categoria de Artículo: </label>
				<input type="text" class="form-control" id="txtNombre" name="txtNombre" readonly value="<?php echo $Fila['nombre_categoria_art']; ?>">
			</div>
			<div class="form-group col-md-8">
				<label>Descripción: </label>
				<input type="text" class="form-control" id="txtDescripcion" name="txtDescripcion" readonly value="<?php echo $Fila['descripcion_categoria_art']; ?>">
			</div>
		</div>

		<div class="form-row">
			<div class="form-group col-md-8">
				<label>Fecha de Ingreso: </label>
				<input type="text" class="form-control" id="txtFecha_Ingreso" name="txtFecha_Ingreso" readonly value="<?php echo $Fila['fechaIngreso_categoria_art']; ?>">
			</div>
			<div class="form-group col-md-8">
				<label>Fecha de Modificación: </label>
				<input type="text" class="form-control" id="txtFecha_Modificacion" name="txtFecha_Modificacion" readonly value="<?php echo $Fila['fechaModificacion_categoria_art']; ?>">
			</div>
			</div>

			<div class="form-row">
			<div class="form-group col-md-8">
				<label>Estado: </label>
				<input type="text" class="form-control" id="txtEstado" name="txtEstado" readonly value="<?php echo $Fila['estado']; ?>">
			</div>
		</div>


			

<!-- Cierre de los primeros 2 div --->
	</div> <!-- Cierre del Div table-wrapper -->
</div> <!-- Cierre del Div container -->