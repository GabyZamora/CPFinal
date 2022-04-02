<?php
include('presentacion/menu.php');
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

<form name="frmNuevo" action="" method="post">
  <div class="container">
    <div class="table-wrapper">
      <div class="table-title">
        <div class="form-row">
          <div class="col-md-8">
            <h2>Nueva Marca</h2>
           </div>
          <div class="col-md-4">
            <button type="button" class="btn btn-danger"
            onClick="location.replace('index.php?mod=marc&form=li');"><i class="material-icons">&#xe5c9;</i><span>Cancelar</span></button>
            <button type="button" class="btn btn-success" onClick="ValidarNuevo();"><i
              class="material-icons">&#xe161;</i><span>Guardar</span></button>
            </div>
          </div>
        </div>

        <div class="form-row">
        <div class="form-group col-md-8">
        <label>Marca: </label>
        <input type="text" class="form-control" id="txtMarca" name="txtMarca">
        </div>
  
<!-- --------------------------Fila2----------------------------- -->

      <div class="form-group col-md-4">
        <label>Estado: </label>
        <select id="cbxEstado" name="cbxEstado" class="form-control">
          <option value="">Seleccione...</option>
          <option value="">Activo</option>
          <option value="">Inactivo</option>
        </select>
      </div>
	</div>
    </div> <!-- Cierre del Div table-wrapper -->
  </div> <!-- Cierre del Div container -->
</form>

<script type="text/javascript">
  function ValidarAgregar(){
    if ( !document.getElementById('txtMarca').value ) {
    alert('Ingrese el nombre de la marca');
    }
    else if ( !document.getElementById('cbxEstado').value ) {
    alert('Seleccione estado');
    }
    else {
    document.forms.frmNuevo.action = 'index.php?mod=marc&form=nu';
    document.forms.frmNuevo.submit();
    }
  }
</script>