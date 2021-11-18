<?php
$FormValid = false;
switch ( @$_GET['form'] ) {
  case 'li':
  $Form = 'Formularios/cat_articulo/frmListar.php';
  $FormValid = true;
  break;

  case 'nu':
  	$Form = 'Formularios/cat_articulo/frmNuevo.php';
  	$FormValid = true;
  	break;

  case 'ag':
  	$Form = 'Formularios/cat_articulo/agregar.php';
  	$FormValid = true;
  	break;

  case 'ed':
  	$Form = 'presentacion/cat_articulo/frmEditar.php';
  	$FormValid = true;
  	break;
  case 'ac':
  	$Form = 'Formularios/cat_articulo/actualizar.php';
  	$FormValid = true;
  	break;
  case 'de':
  	$Form = 'Formularios/cat_articulo/frmDetalles.php';
  	$FormValid = true;
  	break;
  case 'el':
  	$Form = 'Formularios/cat_articulo/eliminar.php';
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
