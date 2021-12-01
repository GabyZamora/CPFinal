<?php
	$FormValid = false;
	switch ( @$_GET['form'] ) {

	case 'li':
	$Form = 'Formularios/servicios/frmListar.php';
	$FormValid = true;
	break;

	case 'nu':
	$Form = 'Formularios/servicios/frmNuevo.php';
	$FormValid = true;
	break;

	case 'ag':
	$Form = 'Formularios/servicios/agregar.php';
	$FormValid = true;
	break;
	
	case 'ed':
	$Form = 'Formularios/servicios/frmEditar.php';
	$FormValid = true;
	break;
	
	case 'ac':
	$Form = 'Formularios/servicios/actualizar.php';
	$FormValid = true;
	break;
	
	case 'el':
	$Form = 'Formularios/servicios/eliminar.php';
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