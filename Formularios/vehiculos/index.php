<?php
$FormValid = false;
switch ( @$_GET['form'] ) {
  case 'li':
  $Form = 'Formularios/vehiculos/frmListar.php';
  $FormValid = true;
  break;

  case 'nu':
  	$Form = 'Formularios/vehiculos/frmNuevo.php';
  	$FormValid = true;
  	break;

  case 'ag':
  	$Form = 'Formularios/vehiculos/agregar.php';
  	$FormValid = true;
  	break;

  case 'ed':
  	$Form = 'presentacion/vehiculos/frmEditar.php';
  	$FormValid = true;
  	break;
  case 'ac':
  	$Form = 'Formularios/vehiculos/actualizar.php';
  	$FormValid = true;
  	break;
  case 'de':
  	$Form = 'Formularios/vehiculos/frmDetalles.php';
  	$FormValid = true;
  	break;
  case 'el':
  	$Form = 'Formularios/vehiculos/eliminar.php';
  	$FormValid = true;
  	break;

  default:
  $FormValid = false;
  break;
}

if ( $FormValid  ){
  require_once $Form;
}
else {
  header('Location: error404.php');
}
?>
