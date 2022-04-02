<?php
require_once 'datos/datos.php';
require_once 'negocio/marcasautos.php';
include('presentacion/menu.php');
$Obj_Marcas_Autos = new Marcas_Autos();
$Datos_Marcas_Autos = $Obj_Marcas_Autos->ListarTodoCombos();
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
            <h2>Nuevo Modelo</h2>
           </div>
          <div class="col-md-4">
            <button type="button" class="btn btn-danger"
            onClick="location.replace('index.php?mod=model&form=li');"><i class="material-icons">&#xe5c9;</i><span>Cancelar</span></button>
            <button type="button" class="btn btn-success" onClick="ValidarNuevo();"><i
              class="material-icons">&#xe161;</i><span>Guardar</span></button>
            </div>
          </div>
        </div>

        <div class="form-row">
        <div class="form-group col-md-8">
        <label>Modelo: </label>
        <input type="text" class="form-control" id="txtModelo" name="txtModelo">
        </div>
        <div class="form-group col-md-6">
          <label>Marca: </label>
          <select id="cbxMarca" name="cbxMarca" class="form-control">
           <option value="">Seleccione...</option>
           <?php
           foreach ( $Datos_Marcas_Autos as $FilaMarca ) {
           ?>
           <option value="<?php echo $FilaMarca['id_marca']; ?>"><?php echo
          $FilaMarca['nombre_marca']; ?></option>
           <?php
           }
           ?>
          </select>
        </div>
      </div>
  
    </div> <!-- Cierre del Div table-wrapper -->
  </div> <!-- Cierre del Div container -->
</form>

<script type="text/javascript">
  function ValidarAgregar(){
    if ( !document.getElementById('txtModelo').value ) {
    alert('Ingrese el nombre de la marca');
    }
    else if ( !document.getElementById('cbxMarca').value ){
    alert('Ingrese el nombre de la marca');
    }
    else {
    document.forms.frmNuevo.action = 'index.php?mod=model&form=nu';
    document.forms.frmNuevo.submit();
    }
  }
</script>