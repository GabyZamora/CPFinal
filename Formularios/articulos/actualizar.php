<?php
	//Llamamos a la capa de datos
	require_once 'datos/datos.php';
	//Llamamos a la capa de negocio
	require_once 'negocio/articulos.php';
	//Instanciamos la clase
	$Obj_Articulos = new Articulos();
	//Asignación de atributos de la clase de la capa de negocio
	$Obj_Articulos->NombreArticulo = $_POST['txtNombreAr'];
	$Obj_Articulos->Descripcion = $_POST['txtDescripcion'];
	$Obj_Articulos->NombreCategoriaArticulos =$_POST['cbxCateArt'];
	$Obj_Articulos->NombreProveedor = $_POST['cbxProveedor'];
	$Obj_Articulos->NombreMarcaArt = $_POST['cbxMarcArt'];
	$Obj_Articulos->Estado = $_POST['cbxEstado'];
	//Ejecutamos el mantenimiento de actualizar
	if( $Obj_Articulos->Actualizar( $_POST['hidId'] ) ) {
	 //Si se ejecuta, redireccionamos al formulario de listar con mensaje update
	echo "<script>location.replace('index.php?mod=art&form=li&m=update');</script>";
	}
	else {
	 //Si no se ejecuta, redireccionamos al formulario de listar con mensaje de error
	echo
	"<script>location.replace('index.php?mod=art&form=li&m=error');</script>";
	}
?>