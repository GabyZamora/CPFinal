<?php
	//Llamamos a la capa de datos
	require_once 'datos/datos.php';
	//Llamamos a la capa de negocio
	require_once 'negocio/articulos.php';
	require_once 'negocio/cat_articulo.php';
	require_once 'negocio/marcaarticulos.php';
	require_once 'negocio/proveedor.php';
	include('../presentacion/menu.php');

$Obj_Cat_Articulo = new Cat_Articulo();
$Datos_Catar = $Obj_Cat_Articulo->ListarTodoCombos();
$Obj_Marcas_Articulos = new Marcas_Articulos();
$DatosMarcas_Articulos = $Obj_Marcas_Articulos->ListarTodoCombos();
$Obj_Proveedor = new Proveedor();
$DatosProveedor = $Obj_Proveedor->ListarTodoCombos();
	$Obj_Articulos = new Articulos();
	//Cargamos el registro solicitado
	$DatosArticulos = $Obj_Articulos->BuscarPorId( $_GET['id'] );
	//Recuperamos el registro obtenido en una variable fila
	foreach ( $DatosArticulos as $Fila ) {
	$DatosArticulos = $Fila;
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
</head>

<form name="frmEditar" action="" method="post">
	<div class="container">
		<div class="table-wrapper">
 		   <div class="table-title">
 			   <div class="form-row">
 				   <div class="col-md-8">
 					    <h2>Editar Articulo</h2>
 					</div>
 					<div class="col-md-4">
						 <button type="button" class="btn btn-danger"
						onClick="location.replace('index.php?mod=art&form=li');"><i class="materialicons">&#xe5c9;</i><span>Cancelar</span></button>
						 <button type="button" class="btn btn-success"
						onClick="ValidarEditar();"><i class="materialicons">&#xe161;</i><span>Guardar</span></button>
					 </div>
 				</div>
			</div>
			<!-- -------------------------- Fila 1 -------------------------- -->
			<div class="form-row">
 				<div class="form-group col-md-8">
					<label>Nombre del Articulo: </label>
 					<input type="text" class="form-control" id="txtNombreNombreAr"
					name="txtNombreAr" value="<?php echo $Fila['nombre_articulo']; ?>">
					<input type="hidden" class="form-control" id="hidId" name="hidId"
					value="<?php echo $Fila['id_articulo']; ?>">
 				</div>
 			</div>
 			<!---------------------------- Fila 2 -------------------------- -->
 			<div class="form-row">
 				<div class="form-group col-md-8">
 					<label>Descripcion: </label>
 					<input type="text" class="form-control" id="txtDescripcion"
					name="txtDescripcion" value="<?php echo $Fila['descripcion']; ?>">
 				</div>
 			</div>
 			<div class="form-row">
	 			<div class="form-group col-md-6">
		 			<label>Categoria Articulo: </label>
					 <select id="cbxCateArt" name="cbxCateArt" class="form-control">
						 <option value="<?php echo $Fila['id_categoria_art']; ?>"><?php
					echo $FilaCategoriaArt['NombreCategoriaArticulos']; ?></option>
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
 		<div class="form-row">
	 			<div class="form-group col-md-6">
		 			<label>Proveedor: </label>
					 <select id="cbxProveedor" name="cbxProveedor" class="form-control">
						 <option value="<?php echo $Fila['id_proveedor']; ?>"><?php
					echo $FilaProveedor['NombreProveedor']; ?></option>
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
		 			<label>Marca Articulos: </label>
					 <select id="cbxMarcArt" name="cbxMarcArt" class="form-control">
						 <option value="<?php echo $Fila['id_marca_art']; ?>"><?php
					echo $FilaMarcas_Articulos['NombreMarcaArticulos']; ?></option>
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
         <option value="<?php echo $Fila['estado']; ?>"></option>
          <option value="Activo">Activo</option>
          <option value="Inactivo">Inactivo</option>
          </select>
        </div>
      </div>
 		</div> <!-- Cierre del Div table-wrapper -->
	</div> <!-- Cierre del Div container -->
</form>
<!-- -------------------- Validaciones de ingreso de datos --------------------->
<script type="text/javascript">
	 function ValidarEditar(){
		if ( !document.getElementById('txtNombreArt').value ) {
		 alert('Ingrese el Nombre del Articulo');
		}
		if ( !document.getElementById('txtDescripcion').value ) {
		 alert('Ingrese la descripción');
		}
		
		else {
		 document.forms.frmEditar.action = 'index.php?mod=art&form=ac';
		 document.forms.frmEditar.submit();
		}
	 }
</script>