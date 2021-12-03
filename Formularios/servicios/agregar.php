<?php
	//Llamamos a la capa de datos
	require_once 'datos/datos.php';
	//Llamamos a la capa de negocio
	require_once 'negocio/servicios.php';
	//Instanciamos la clase de la capa de negocio
	$Obj_Servicios = new Servicios();
	//Asignación de atributos a la clase de la capa de negocio
	$Obj_Servicios->NombreServicio = $_POST['txtNombreServ'];
	$Obj_Servicios->Detalles = $_POST['txtDetalles'];
	$Obj_Servicios->NombreCategoria = $_POST['cbxCategoria'];
	//Ejecutamos el mantenimiento de agregar
	if( $Obj_Servicios->Agregar() ) {
	 //Si se ejecuta, redireccionamos al formulario de listar con mensaje succes
	echo 
	"<script>location.replace('index.php?mod=ser&form=li&m=success');</script>";
	}
	else {
	 //Si no se ejecuta, redireccionamos al formulario de listar con mensaje de error
	echo
	"<script>location.replace('index.php?mod=ser&form=li&m=error');</script>";
	}
?>
