<?php
$FormValid = false;
switch ( @$_GET['form'] ) {
  case 'li':
  $Form = 'Formularios/categoriaservicios/frmListar.php';
  $FormValid = true;
  break;

  case 'nu':
  $Form = 'Formularios/categoriaservicios/frmNuevo.php';
  $FormValid = true;
  break;

  case 'ag':
  $Form = 'Formularios/categoriaservicios/agregar.php';
  $FormValid = true;
  break;

  case 'ed':
  $Form = 'Formularios/categoriaservicios/frmEditar.php';
  $FormValid = true;
  break;

  case 'ac':
  $Form = 'Formularios/categoriaservicios/actualizar.php';
  $FormValid = true;
  break;

  case 'de':
  $Form = 'Formularios/categoriaservicios/frmDetalles.php';
  $FormValid = true;
  break;

  case 'el':
  $Form = 'Formularios/categoriaservicios/eliminar.php';
  $FormValid = true;
  break;

  default:
  $FormValid = false;
  break;
}
//Llamadas a los archivos de formularios
if ( $FormValid  ){
  require_once $Form;
}
else {
  header('Location: error404.php');
}
?>
