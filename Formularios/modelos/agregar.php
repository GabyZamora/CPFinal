<?php
//Llamamos a la capa de datos
//Llamamos a la capa de datos
	require_once 'datos/datos.php';
	//Llamamos a la capa de negocio
	require_once 'negocio/modelo.php';
	//Instanciamos la clase
	$Obj_Modelo = new Modelo();
	//Asignación de atributos de la clase de la capa de negocio
	$Obj_Modelo->Modelo = $_POST['txtModelo'];
	$Obj_Modelo->Marca = $_POST['cbxMarca'];
	$Obj_Proveedor->Estado = $_POST['cbxEstado'];
	//Ejecutamos el mantenimiento de actualizar
	if( $Obj_Proveedor->Actualizar( $_POST['hidId'] ) ) {
	//Si se ejecuta, redireccionamos al formulario de listar con mensaje update
	echo "<script>location.replace('index.php?mod=model&form=li&m=update');</script>";
	}
	else {
	//Si no se ejecuta, redireccionamos al formulario de listar con mensaje de error
	echo "<script>location.replace('index.php?mod=model&form=li&m=error');</script>";
	}
?>