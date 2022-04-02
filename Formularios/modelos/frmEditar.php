<?php
//Llamamos a la capa de datos
require_once 'datos/datos.php';
//Llamamos a la capa de negocio
require_once 'negocio/modelo.php';
include('presentacion/menu.php');
//Instanciamos las clases de la capa de negocio
$Obj_Modelo = new Modelo();
//Cargamos el registro solicitado
$DatosModelo = $Obj_Modelo->BuscarPorId( $_GET['id'] );
//Recuperamos el registro obtenido en una variable fila
foreach ( $DatosModelo as $Fila ) {
$DatosModelo = $Fila;
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
 						<h2>Editar Modelo</h2>
 					</div>
 					<div class="col-md-4">
						 <button type="button" class="btn btn-danger"
						onClick="location.replace('index.php?mod=model&form=li');"><i class="material-icons">&#xe5c9;</i><span>Cancelar</span></button>
						 <button type="button" class="btn btn-success"
						onClick="ValidarEditar();"><i class="material-icons">&#xe161;</i><span>Guardar</span></button>
					 </div>
 				</div>
			</div>
<!-- -------------------------- Fila 1 -------------------------- -->
			<div class="form-row">
        <div class="form-group col-md-8">
          <label>Modelo: </label>
          <input type="text" class="form-control" id="txtModelo" value="<?php echo $Fila['NombreModelo']; ?>">
        </div>
        <div class="form-group col-md-8">
          <label>Marca: </label>
          <select id="cbxMarca" name="cbxMarca" class="form-control">
           <option value="<?php echo
          $Fila['id_marca']; ?>"><?php
					echo $Fila['NombreMarca']; ?></option>
           <?php
           foreach ( $Datos_Marcas_Autos as $FilaMarca ) {
           ?>
           <option value="<?php echo $FilaMarca['id_marca']; ?>"><?php echo
          $FilaMarca['NombreMarca']; ?></option>
           <?php
           }
           ?>
          </select>
        </div>
		<div class="form-group col-md-4">
        <label>Estado: </label>
        <select id="cbxEstado" name="cbxEstado" class="form-control">
          <option value="">Seleccione...</option>
          <option value="">Activo</option>
          <option value="">Inactivo</option>
        </select>
		</div>
    </div> <!-- Cierre del Div table-wrapper -->
  </div> <!-- Cierre del Div container -->
</form>
<script type="text/javascript">
  function ValidarActualizar(){
    if ( !document.getElementById('txtModelo').value ) {
    alert('Ingrese el nombre de la marca');
    }
    else if ( !document.getElementById('cbxMarca').value ){
    alert('Ingrese el nombre de la marca');
    }
    else {
    document.forms.frmEditar.action = 'index.php?mod=model&form=ac';
    document.forms.frmEditar.submit();
    }
  }
</script>