<?php
	//Llamamos a la capa de datos
	require_once 'datos/datos.php';
	//Llamamos a la capa de negocio
	require_once 'negocio/servicios.php';
	//Instanciamos la clase
	$Obj_Servicios = new Servicios();
	//Asignación de atributos de la clase de la capa de negocio
	$Obj_Servicios->NombreServicio = $_POST['txtNombreServ'];
	$Obj_Servicios->Detalles = $_POST['txtDetalles'];
	$Obj_Servicios->NombreCategoria = $_POST['cbxCategoria'];
	//Ejecutamos el mantenimiento de actualizar
	if( $Obj_Usuarios->Actualizar( $_POST['hidId'] ) ) {
	 //Si se ejecuta, redireccionamos al formulario de listar con mensaje update
	echo "<script>location.replace('index.php?mod=serv&form=li&m=update');</script>";
	}
	else {
	 //Si no se ejecuta, redireccionamos al formulario de listar con mensaje de error
	echo
	"<script>location.replace('index.php?mod=serv&form=li&m=error');</script>";
	}
?>