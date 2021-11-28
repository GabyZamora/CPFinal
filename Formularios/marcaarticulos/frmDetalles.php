<?php
//Llamamos a la capa de datos
require_once 'datos/datos.php';
//Llamamos a la capa de negocio
require_once 'negocio/marcaarticulos.php';
//Instanciamos las clases de la capa de negocio
 $Obj_Marcas_Articulos= new Marcas_Articulos();
//Cargamos el registro solicitado
$DatosMarcas_Articulos = $Obj_Marcas_Articulos->BuscarPorId( $_GET['id'] );
//Recuperamos el registro obtenido en una variable fila
foreach ( $DatosMarcas_Articulos as $Fila ) {
$DatosMarcas_Articulos = $Fila;
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
					<h2>Detalles de Marcas de Articulos</h2>
				</div>
				<div class="col-md-4">
					<button type="button" class="btn btn-success" onClick="location.replace('index.php?mod=marcaarti&form=li');"><i class="material-icons">&#xe5c4;</i><span>Regresar</span></button>
				</div>
			</div>
		</div>
<!-- -------------------------- Fila 1 -------------------------- -->
			<div class="form-row">
 				<div class="form-group col-md-8">
					<label>Nombre de Marca de  categoria: </label>					
 					<input type="text" class="form-control" id="txtNombreMarca" readonly value="<?php echo $Fila['nombreMarca']; ?>">
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