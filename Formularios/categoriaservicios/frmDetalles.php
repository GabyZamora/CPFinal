<?php
//Llamamos a la capa de datos
require_once 'datos/datos.php';
//Llamamos a la capa de negocio
require_once 'negocio/categoriaservicios.php';
//Instanciamos las clases de la capa de negocio
 $Obj_Categoria_Servicio= new Categoria_Servicio();
//Cargamos el registro solicitado
$DatosCategoria_Servicio = $Obj_Categoria_Servicio->BuscarPorId( $_GET['id'] );
//Recuperamos el registro obtenido en una variable fila
foreach ( $DatosCategoria_Servicio as $Fila ) {
$DatosCategoria_Servicio = $Fila;
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
					<h2>Detalles de Categoria de Servicios</h2>
				</div>
				<div class="col-md-4">
					<button type="button" class="btn btn-info" onclick="window.open('reportes/detalleCategoriaServicio.php?id=<?php echo $_GET['id'] ?>', 'ReporteDeCategoriaServicio', 'width=1000,height=600');"><i class="material-icons">&#xe8ad;</i><span>Imprimir</span></button>
					<button type="button" class="btn btn-success" onClick="location.replace('index.php?mod=catse&form=li');"><i class="material-icons">&#xe5c4;</i><span>Regresar</span></button>
				</div>
			</div>
		</div>
<!-- -------------------------- Fila 1 -------------------------- -->
			<div class="form-row">
 				<div class="form-group col-md-8">
					<label>Nombre de Categoria de Servicios: </label>					
 					<input type="text" class="form-control" id="txtNombreCategoria" readonly value="<?php echo $Fila['nombre_categoria']; ?>">
 				</div>
 				<div class="form-group col-md-8">
					<label>Descripcion: </label>
 					<input type="text" class="form-control" id="txtDescripcion" readonly value="<?php echo $Fila['descripcion']; ?>">
 				</div>
				<div class="form-row">
				<div class="form-group col-md-4">
				<label>Estado: </label>
				<input type="text" class="form-control" id="txtEstado" name="txtEstado" readonly value="<?php echo $Fila['estado']; ?>">
				</div>
			</div>
		</div> 	
<!-- Cierre de los primeros 2 div --->
	</div> <!-- Cierre del Div table-wrapper -->
</div> <!-- Cierre del Div container -->