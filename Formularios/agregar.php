<?php
//Llamamos a la capa de datos
//Llamamos a la capa de datos
	require_once 'datos/datos.php';
	//Llamamos a la capa de negocio
	require_once 'negocio/proveedor.php';
	//Instanciamos la clase
	$Obj_Proveedor = new Proveedor();
	//Asignación de atributos de la clase de la capa de negocio
	$Obj_Proveedor->NombreComercial = $_POST['txtNombreComercial'];
	$Obj_Proveedor->NombreProveedor = $_POST['txtNombreProveedor'];
	$Obj_Proveedor->Giro = $_POST['txtGiro'];
	$Obj_Proveedor->DUI = $_POST['txtDUI'];
	$Obj_Proveedor->NIT = $_POST['txtNIT'];
	$Obj_Proveedor->Direccion = $_POST['txtDireccion'];
	$Obj_Proveedor->Telefono1 = $_POST['txtTelefono1'];
	$Obj_Proveedor->Telefono2 = $_POST['txtTelefono2'];
	$Obj_Proveedor->Telefono3 = $_POST['txtTelefono3'];
	$Obj_Proveedor->Estado = $_POST['cbxEstado'];
//Ejecutamos el mantenimiento de agregar
if( $Obj_Proveedor->Agregar() ) {
//Si se ejecuta, redireccionamos al formulario de listar con mensaje succes
echo "<script>location.replace('index.php?mod=prove&form=li&m=success');</script>";
}
else {
//Si no se ejecuta, redireccionamos al formulario de listar con mensaje de error
echo "<script>location.replace('index.php?mod=prove&form=li&m=error');</script>";
}
?>