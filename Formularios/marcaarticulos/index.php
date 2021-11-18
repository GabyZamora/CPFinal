<?php
$FormValid = false;
switch ( @$_GET['form'] ) {
  case 'li':
  $Form = 'Formularios/marcaarticulos/frmListar.php';
  $FormValid = true;
  break;

  case 'nu':
  $Form = 'Formularios/marcaarticulos/frmNuevo.php';
  $FormValid = true;
  break;

  case 'ag':
  $Form = 'Formularios/marcaarticulos/agregar.php';
  $FormValid = true;
  break;

  case 'ed':
  $Form = 'Formularios/marcaarticulos/frmEditar.php';
  $FormValid = true;
  break;

  case 'ac':
  $Form = 'Formularios/marcaarticulos/actualizar.php';
  $FormValid = true;
  break;

  case 'de':
  $Form = 'Formularios/marcaarticulos/frmDetalles.php';
  $FormValid = true;
  break;

  case 'el':
  $Form = 'Formularios/marcaarticulos/eliminar.php';
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
