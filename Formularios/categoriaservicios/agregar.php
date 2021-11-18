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
	$Obj_Categoria_Servicio->Fecha_Ingreso = $_POST['txtFecha_Ingreso'];
	$Obj_Categoria_Servicio->Fecha_Modificacion = $_POST['txtFecha_Modificacion'];
//Ejecutamos el mantenimiento de agregar
if(	$Obj_Marcas_Articulos->Agregar( $_POST['id'] ) ) {
//Si se ejecuta, redireccionamos al formulario de listar con mensaje succes
echo "<script>location.replace('index.php?mod=catse&form=li&m=success');</script>";
}
else {
//Si no se ejecuta, redireccionamos al formulario de listar con mensaje de error
echo "<script>location.replace('index.php?mod=catse&form=li&m=error');</script>";
}
?>