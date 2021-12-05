<?php
//Llamamos a la capa de datos
require_once 'datos/datos.php';
//Llamamos a la capa de negocio
require_once 'negocio/cotizacion.php';
//Instanciamos la clase
$Obj_Cotizacion = new Cotizacion();
//Asignación de atributos de la clase de la capa de negocio
$Obj_Cotizacion->Servicio= $_POST['cbxServicio'];
$Obj_Cotizacion->CantServicio= $_POST['txtCantServicio'];
$Obj_Cotizacion->PrecioServicio= $_POST['txtPrecioServicio'];
$Obj_Cotizacion->Articulo= $_POST['cbxArticulo'];
$Obj_Cotizacion->CantidadArt= $_POST['txtCantidadArt'];
$Obj_Cotizacion->PrecioArt= $_POST['txtPrecioArt'];
//Ejecutamos el mantenimiento de actualizar
if(	$Obj_Cotizacion->Agregar() ) {
//Si se ejecuta, redireccionamos al formulario de listar con mensaje succes
echo "<script>location.replace('index.php?mod=cot&form=li&m=success');</script>";
}
else {
//Si no se ejecuta, redireccionamos al formulario de listar con mensaje de error
echo "<script>location.replace('index.php?mod=cot&form=li&m=error');</script>";
}
?>