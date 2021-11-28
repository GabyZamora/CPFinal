<?php
	//Llamamos a la capa de datos
	require_once 'datos/datos.php';
	//Llamamos a la capa de negocio
	require_once 'negocio/categoriaservicios.php';
	//Instanciamos la clase
	$Obj_Categoria_Servicio= new Categoria_Servicio();
	//Asignación de atributos de la clase de la capa de negocio
	$Obj_Categoria_Servicio->Nombre = $_POST['txtNombreCategoria'];
	$Obj_Categoria_Servicio->Descripcion = $_POST['txtDescripcion'];
	$Obj_Categoria_Servicio->Estado = $_POST['cbxEstado'];
	//Ejecutamos el mantenimiento de actualizar
	if(	$Obj_Categoria_Servicio->Actualizar( $_POST['hidId'] ) ) {
	//Si se ejecuta, redireccionamos al formulario de listar con mensaje update
	echo "<script>location.replace('index.php?mod=catse&form=li&m=update');</script>";
	}
	else {
	//Si no se ejecuta, redireccionamos al formulario de listar con mensaje de error
	echo "<script>location.replace('index.php?mod=catse&form=li&m=error');</script>";
	}
?>