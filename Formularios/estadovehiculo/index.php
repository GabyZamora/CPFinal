<?php
$FormValid = false;
switch ( @$_GET['form'] ) {
  case 'li':
  $Form = 'Formularios/estadovehiculo/frmListar.php';
  $FormValid = true;
  break;

  case 'nu':
  	$Form = 'Formularios/estadovehiculo/frmNuevo.php';
  	$FormValid = true;
  	break;

  case 'ag':
  	$Form = 'Formularios/estadovehiculo/agregar.php';
  	$FormValid = true;
  	break;

  case 'ed':
  	$Form = 'Formularios/estadovehiculo/frmEditar.php';
  	$FormValid = true;
  	break;
  case 'ac':
  	$Form = 'Formularios/estadovehiculo/actualizar.php';
  	$FormValid = true;
  	break;
  case 'de':
  	$Form = 'Formularios/estadovehiculo/frmDetalles.php';
  	$FormValid = true;
  	break;
  case 'el':
  	$Form = 'Formularios/estadovehiculo/eliminar.php';
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
