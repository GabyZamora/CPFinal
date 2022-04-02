<?php
	//Llamamos a la capa de datos
	require_once 'datos/datos.php';
	//Llamamos a la capa de negocio
	require_once 'negocio/marcaarticulos.php';
	include('presentacion/menu.php');

	//Instanciamos la clase
	$Obj_Marcas_Articulos= new Marcas_Articulos();
//Cargamos el registro solicitado
$DatosMarcas_Articulos = $Obj_Marcas_Articulos->BuscarPorId( $_GET['id'] );
//Recuperamos el registro obtenido en una variable fila
foreach ( $DatosMarcas_Articulos as $Fila ) {
$DatosMarcas_Articulos = $Fila;
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
<body>
<form name="frmEditar" action="" method="post">
	<div class="container">
		<div class="table-wrapper">
 			<div class="table-title">
 				<div class="form-row">
 					<div class="col-md-8">
 						<h2>Editar Marcas de Articulos</h2>
 					</div>
 					<div class="col-md-4">
						 <button type="button" class="btn btn-danger"
						onClick="location.replace('index.php?mod=marcaarti&form=li');"><i class="materialicons">&#xe5c9;</i><span>Cancelar</span></button>
						 <button type="button" class="btn btn-success"
						onClick="ValidarEditar();"><i class="materialicons">&#xe161;</i><span>Guardar</span></button>
					 </div>
 				</div>
			</div>
<!-- -------------------------- Fila 1 -------------------------- -->
			<div class="form-row">
 				<div class="form-group col-md-8">
					<label>Nombre de Marca de articulos: </label>
 					<input type="text" class="form-control" id="txtNombreMarca" name="txtNombreMarca"value="<?php echo $Fila['nombreMarca']; ?>">
					<input type="hidden" class="form-control" id="hidId" name="hidId" value="<?php echo $Fila['id_marca_art']; ?>">
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
    </div> <!-- Cierre del Div table-wrapper ---->
  </div> <!-- Cierre del Div container -->
</form>
<!-- -------------------- Validaciones de ingreso de datos -------------------- -->
<script type="text/javascript">
	function ValidarEditar(){
		if ( !document.getElementById('txtNombreMarca').value ) {
		alert('Ingrese el nombre de  la marca de articulos');
		}
		
		else {
		document.forms.frmEditar.action = 'index.php?mod=marcaarti&form=ac';
		document.forms.frmEditar.submit();
		}
	}
</script>