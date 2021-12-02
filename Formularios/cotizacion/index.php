<?php
$FormValid = false;
switch ( @$_GET['form'] ) {
  case 'li':
  $Form = 'Formularios/cotizacion/frmListar.php';
  $FormValid = true;
  break;

  case 'nu':
  	$Form = 'Formularios/cotizacion/frmNuevo.php';
  	$FormValid = true;
  	break;

  case 'ag':
  	$Form = 'Formularios/cotizacion/agregar.php';
  	$FormValid = true;
  	break;

  case 'ed':
  	$Form = 'Formularios/cotizacion/frmEditar.php';
  	$FormValid = true;
  	break;
  case 'ac':
  	$Form = 'Formularios/cotizacion/actualizar.php';
  	$FormValid = true;
  	break;
  case 'de':
  	$Form = 'Formularios/cotizacion/frmDetalles.php';
  	$FormValid = true;
  	break;
  case 'el':
  	$Form = 'Formularios/cotizacion/eliminar.php';
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
