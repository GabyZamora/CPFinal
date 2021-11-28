<?php
$FormValid = false;
switch ( @$_GET['form'] ) {
  case 'li':
  $Form = 'Formularios/clientes/frmListar.php';
  $FormValid = true;
  break;

  case 'nu':
  	$Form = 'Formularios/clientes/frmNuevo.php';
  	$FormValid = true;
  	break;

  case 'ag':
  	$Form = 'Formularios/clientes/agregar.php';
  	$FormValid = true;
  	break;

  case 'ed':
  	$Form = 'Formularios/clientes/frmEditar.php';
  	$FormValid = true;
  	break;
  case 'ac':
  	$Form = 'Formularios/clientes/actualizar.php';
  	$FormValid = true;
  	break;
  case 'de':
  	$Form = 'Formularios/clientes/frmDetalles.php';
  	$FormValid = true;
  	break;
  case 'el':
  	$Form = 'Formularios/clientes/eliminar.php';
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
