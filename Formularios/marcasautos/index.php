<?php
$FormValid = false;
switch ( @$_GET['form'] ) {
  case 'li':
  $Form = 'Formularios/marcasautos/frmListar.php';
  $FormValid = true;
  break;

  case 'nu':
  $Form = 'Formularios/marcasautos/frmNuevo.php';
  $FormValid = true;
  break;

  case 'ag':
  $Form = 'Formularios/marcasautos/agregar.php';
  $FormValid = true;
  break;

  case 'ed':
  $Form = 'Formularios/marcasautos/frmEditar.php';
  $FormValid = true;
  break;

  case 'ac':
  $Form = 'Formularios/marcasautos/actualizar.php';
  $FormValid = true;
  break;

  case 'el':
  $Form = 'Formularios/marcasautos/eliminar.php';
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
