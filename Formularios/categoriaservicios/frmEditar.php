<?php
  //Llamamos a la capa de datos
	require_once 'datos/datos.php';
  //Llamamos a la capa de negocio
	require_once 'negocio/categoriaservicios.php';
	include('presentacion/menu.php');
	$Obj_Categoria_Servicio= new Categoria_Servicio();


	//Cargamos el registro solicitado
	$DatosCategoria_Servicio = $Obj_Categoria_Servicio->BuscarPorId( $_GET['id'] );
	//Recuperamos el registro obtenido en una variable fila
	foreach ( $DatosCategoria_Servicio as $Fila ) {
	$DatosCategoria_Servicio = $Fila;
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
 						<h2>Editar Categoria de Servicios</h2>
 					</div>
 					<div class="col-md-4">
						 <button type="button" class="btn btn-danger"
						onClick="location.replace('index.php?mod=catse&form=li');"><i class="materialicons">&#xe5c9;</i><span>Cancelar</span></button>
						 <button type="button" class="btn btn-success"
						onClick="ValidarEditar();"><i class="materialicons">&#xe161;</i><span>Guardar</span></button>
					 </div>
 				</div>
			</div>
<!-- -------------------------- Fila 1 -------------------------- -->
			<div class="form-row">
 				<div class="form-group col-md-8">
					<label>Nombre de Categoria de Servicio: </label>
 					<input type="text" class="form-control" id="txtNombreCategoria" name ="txtNombreCategoria"value="<?php echo $Fila['nombre_categoria']; ?>">
					<input type="hidden" class="form-control" id="hidId" name="hidId" value="<?php echo $Fila['id_categoria']; ?>">
 				</div>
 				<div class="form-group col-md-8">
					<label>Descripcion; </label>
 					<input type="text" class="form-control" id="txtDescripcion"name="txtDescripcion"value="<?php echo $Fila['descripcion']; ?>">
					<input type="hidden" class="form-control" id="hidId" name="hidId" value="<?php echo $Fila['id_categoria']; ?>">
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
  </div>
 </div> <!-- Cierre del Div container -->
</form>
<!-- -------------------- Validaciones de ingreso de datos -------------------- -->
<script type="text/javascript">
	function ValidarEditar(){
		if ( !document.getElementById('txtNombreCategoria').value ) {
		alert('Ingrese el nombre de  la categoria del servicio');
		}
		if ( !document.getElementById('txtDescripcion').value ) {
		alert('Ingrese la descripción');
		}
		else {
		document.forms.frmEditar.action = 'index.php?mod=catse&form=ac';
		document.forms.frmEditar.submit();
		}
	}
</script>