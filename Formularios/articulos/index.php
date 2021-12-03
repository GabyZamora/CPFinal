<?php
	$FormValid = false;
	switch ( @$_GET['form'] ) {

	case 'li':
	$Form = 'Formularios/articulos/frmListar.php';
	$FormValid = true;
	break;

	case 'nu':
	$Form = 'Formularios/articulos/frmNuevo.php';
	$FormValid = true;
	break;

	case 'ag':
	$Form = 'Formularios/articulos/agregar.php';
	$FormValid = true;
	break;
	
	case 'de':
		$Form = 'Formularios/articulos/frmDetalles.php';
		$FormValid = true;
	break;
	
	case 'ed':
	$Form = 'Formularios/articulos/frmEditar.php';
	$FormValid = true;
	break;
	
	case 'ac':
	$Form = 'Formularios/articulos/actualizar.php';
	$FormValid = true;
	break;
	
	case 'el':
	$Form = 'Formularios/articulos/eliminar.php';
	$FormValid = true;
	break;

	default:
	$FormValid = false;
	break;
	}
	//Llamadas a los archivos de formularios
	if ( $FormValid ){
	require_once $Form;
	}
	else {
	header('Location: error404.php');
	}
?>