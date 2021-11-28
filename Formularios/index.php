<?php
$FormValid = false;
switch ( @$_GET['form'] ) {
  case 'li':
  $Form = 'Formularios/proveedores/frmListar.php';
  $FormValid = true;
  break;

  case 'nu':
  $Form = 'Formularios/proveedores/frmNuevo.php';
  $FormValid = true;
  break;

  case 'ag':
  $Form = 'Formularios/proveedores/agregar.php';
  $FormValid = true;
  break;

  case 'ed':
  $Form = 'Formularios/proveedores/frmEditar.php';
  $FormValid = true;
  break;

  case 'ac':
  $Form = 'Formularios/proveedores/actualizar.php';
  $FormValid = true;
  break;

  case 'de':
  $Form = 'Formularios/proveedores/frmDetalles.php';
  $FormValid = true;
  break;

  case 'el':
  $Form = 'Formularios/proveedores/eliminar.php';
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

