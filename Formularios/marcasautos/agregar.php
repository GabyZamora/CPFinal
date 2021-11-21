<?php
//Llamamos a la capa de datos
//Llamamos a la capa de datos
	require_once 'datos/datos.php';
	//Llamamos a la capa de negocio
	require_once 'negocio/marcasautos.php';
	//Instanciamos la clase
	$Obj_Marcas_Autos = new Marcas_Autos();
	//Asignación de atributos de la clase de la capa de negocio
	$Obj_Marcas_Autos->Marca = $_POST['txtMarca'];
	$Obj_Marcas_Autos->Estado = $_POST['cbxEstado'];
	//Ejecutamos el mantenimiento de actualizar
	if( $Obj_Marcas_Autos->Actualizar( $_POST['hidId'] ) ) {
	//Si se ejecuta, redireccionamos al formulario de listar con mensaje update
	echo "<script>location.replace('index.php?mod=marc&form=li&m=update');</script>";
	}
	else {
	//Si no se ejecuta, redireccionamos al formulario de listar con mensaje de error
	echo "<script>location.replace('index.php?mod=marc&form=li&m=error');</script>";
	}
?>