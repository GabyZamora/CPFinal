<?php
	$FormValid = false;
	switch ( @$_GET['form'] ) {

	case 'li':
	$Form = 'Formularios/usuarios/frmListar.php';
	$FormValid = true;
	break;

	case 'nu':
	$Form = 'Formularios/usuarios/frmNuevo.php';
	$FormValid = true;
	break;

	case 'ag':
	$Form = 'Formularios/usuarios/agregar.php';
	$FormValid = true;
	break;
	
	case 'ed':
	$Form = 'Formularios/usuarios/frmEditar.php';
	$FormValid = true;
	break;
	
	case 'ac':
	$Form = 'Formularios/usuarios/actualizar.php';
	$FormValid = true;
	break;
	
	case 'rp':
	$Form = 'Formularios/usuarios/reestablecerPassword.php';
	$FormValid = true;
	break;
	
	case 'el':
	$Form = 'Formularios/usuarios/eliminar.php';
	$FormValid = true;
	break;
	
	case 'mc':
	$Form = 'Formularios/usuarios/frmMiCuenta.php';
	$FormValid = true;
	break;
	
	case 'cp':
	$Form = 'Formularios/usuarios/cambiarPassword.php';
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