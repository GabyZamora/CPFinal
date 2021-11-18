<?php
$FormValid = false;
switch ( @$_GET['form'] ) {
  case 'li':
  $Form = 'Formularios/modelos/frmListar.php';
  $FormValid = true;
  break;

  case 'nu':
  $Form = 'Formularios/modelos/frmNuevo.php';
  $FormValid = true;
  break;

  case 'ag':
  $Form = 'Formularios/modelos/agregar.php';
  $FormValid = true;
  break;

  case 'ed':
  $Form = 'Formularios/modelos/frmEditar.php';
  $FormValid = true;
  break;

  case 'ac':
  $Form = 'Formularios/modelos/actualizar.php';
  $FormValid = true;
  break;

  case 'de':
  $Form = 'Formularios/modelos/frmDetalles.php';
  $FormValid = true;
  break;

  case 'el':
  $Form = 'Formularios/modelos/eliminar.php';
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

