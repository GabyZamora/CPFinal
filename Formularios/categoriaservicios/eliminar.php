<?php
	//Llamamos a la capa de datos
	require_once 'datos/datos.php';
	//Llamamos a la capa de negocio
	require_once 'negocio/categoriaservicios.php';
	//Instanciamos la clase
	$Obj_Categoria_Servicio= new Categoria_Servicio();
//Ejecutamos el mantenimiento de eliminar
if( $Obj_Categoria_Servicio->Eliminar( $_GET['id'] ) ) {
//Si se ejecuta, redireccionamos al formulario de listar con mensaje success
echo "<script>location.replace('index.php?mod=catse&form=li&m=delete');</script>";
}
else {
//Si no se ejecuta, redireccionamos al formulario de listar con mensaje de error
echo "<script>location.replace('index.php?mod=catse&form=li&m=error');</script>";
}
?>