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
            <h2>Nuevo Proveedor</h2>
           </div>
          <div class="col-md-4">
            <button type="button" class="btn btn-danger"
            onClick="location.replace('index.php?mod=prove&form=li');"><i class="material-icons">&#xe5c9;</i><span>Cancelar</span></button>
            <button type="button" class="btn btn-success" onClick="ValidarNuevo();"><i
              class="material-icons">&#xe161;</i><span>Guardar</span></button>
            </div>
          </div>
        </div>
<!-- -------------------------- Fila 1 -------------------------- -->
      <div class="form-row">
        <div class="form-group col-md-8">
          <label>Nombre Comercial: </label>
          <input type="text" class="form-control" id="txtNombreComercial"name="txtNombreComercial">
        </div>
        <div class="form-group col-md-8">
          <label>Nombre del Proveedor: </label>
          <input type="text" class="form-control" id="txtNombreProveedor"name="txtNombreProveedor">
        </div>
        <div class="form-group col-md-8">
          <label>Giro: </label>
          <input type="text" class="form-control" id="txtGiro" name="txtGiro">
        </div>
      </div>
<!-- -------------------------- Fila 2 -------------------------- -->
      <div class="form-row">
        <div class="form-group col-md-8">
          <label>DUI: </label>
          <input type="text" class="form-control" id="txtDUI" name="txtDUI">
        </div>
        <div class="form-group col-md-8">
          <label>NIT: </label>
          <input type="text" class="form-control" id="txtNIT" name="txtNIT">
        </div>
        <div class="form-group col-md-8">
          <label>Dirección: </label>
          <input type="text" class="form-control" id="txtDireccion" name="txtDireccion">
        </div>
      </div>
<!-- -------------------------- Fila 3 -------------------------- -->
      <div class="form-row">
        <div class="form-group col-md-8">
          <label>Telefono 1: </label>
          <input type="text" class="form-control" id="txtTelefono1" name="txtTelefono1">
        </div>
        <div class="form-group col-md-8">
          <label>Telefono 2: </label>
          <input type="text" class="form-control" id="txtTelefono2" name="txtTelefono2">
        </div>
        <div class="form-group col-md-8">
          <label>Telefono 3: </label>
          <input type="text" class="form-control" id="txtTelefono3" name="txtTelefono3">
        </div>
      </div>

<!-- -------------------------- Fila 4 -------------------------- -->

<!-- --------------------------Fila5----------------------------- -->

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
<script type="text/javascript">
  function ValidarNuevo(){
    if ( !document.getElementById('txtNombreComercial').value ) {
    alert('Ingrese el nombre Comercial del proveedor');
    }
    else if ( !document.getElementById('txtNombreProveedor').value ){
    alert('Ingrese el nombre completo del proveedor');
    }
    else if ( !document.getElementById('txtGiro').value ) {
    alert('Ingrese el genero del proveedor');
    }
    else if ( !document.getElementById('txtDUI').value ) {
    alert('Ingrese número de DUI');
    }

    else if ( !document.getElementById('txtNIT').value ) {
    alert('Ingrese número de nit del proveedor');
    }
    else if ( !document.getElementById('txtDireccion').value ) {
    alert('Ingrese la direccion del proveedor');
    }
    else if ( !document.getElementById('txtTelefono1').value ) {
    alert('Ingrese el numero de telefono  del proveedor');
    }
    else if ( !document.getElementById('txtTelefono2').value ) {
    alert('Ingrese el numero de telefono  del proveedor');
    }
    else if ( !document.getElementById('txtTelefono3').value ) {
    alert('Ingrese el numero de telefono  del proveedor');
    }
    else if ( !document.getElementById('cbxEstado').value ) {
    alert('Seleccione estado');
    }
    else {
    document.forms.frmNuevo.action = 'index.php?mod=prove&form=ag';
    document.forms.frmNuevo.submit();
    }
  }
</script>