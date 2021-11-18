<?php
	//Llamamos a la capa de datos
	require_once 'datos/datos.php';
	//Llamamos a la capa de negocio
	require_once 'negocio/marcaarticulos.php';
	//Instanciamos la clase
	$Obj_Marcas_Articulos = new Marcas_Articulos();
	//Asignación de atributos de la clase de la capa de negocio
	$Obj_Marcas_Articulos->Nombre = $_POST['txtNombreMarca'];
	$Obj_Marcas_Articulos->Fecha_Ingreso = $_POST['txtFecha_Ingreso'];
	$Obj_Marcas_Articulos->Fecha_Modificacion = $_POST['txtFecha_Modificacion'];
//Ejecutamos el mantenimiento de agregar
if(	$Obj_Marcas_Articulos->Agregar( $_POST['id'] ) ) {
//Si se ejecuta, redireccionamos al formulario de listar con mensaje succes
echo "<script>location.replace('index.php?mod=marcaarti&form=li&m=success');</script>";
}
else {
//Si no se ejecuta, redireccionamos al formulario de listar con mensaje de error
echo "<script>location.replace('index.php?mod=marcaarti&form=li&m=error');</script>";
}
?>