<?php
	//Llamamos a la capa de datos
	require_once 'datos/datos.php';
	//Llamamos a la capa de negocio
	require_once 'negocio/marcaarticulos.php';
	//Instanciamos la clase
	$Obj_Marcas_Articulos = new Marcas_Articulos();
	//Asignación de atributos de la clase de la capa de negocio
	$Obj_Marcas_Articulos->nombremarca = $_POST['txtNombreMarca'];
	$Obj_Marcas_Articulos->Estado = $_POST['cbxEstado'];
	//Ejecutamos el mantenimiento de actualizar
	if(	$Obj_Marcas_Articulos->Actualizar( $_POST['hidId'] ) ) {
	//Si se ejecuta, redireccionamos al formulario de listar con mensaje update
	echo "<script>location.replace('index.php?mod=marcaarti&form=li&m=update');</script>";
	}
	else {
	//Si no se ejecuta, redireccionamos al formulario de listar con mensaje de error
	echo "<script>location.replace('index.php?mod=marcaarti&form=li&m=error');</script>";
	}
?>