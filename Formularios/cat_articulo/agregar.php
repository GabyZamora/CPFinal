<?php
//Llamamos a la capa de datos
require_once 'datos/datos.php';
//Llamamos a la capa de negocio
require_once 'negocio/cat_articulo.php';
//Instanciamos la clase
$Obj_Cat_Articulo = new Cat_Articulo();
//Asignación de atributos de la clase de la capa de negocio
$Obj_Cat_Articulo->Nombre = $_POST['txtNombre'];
$Obj_Cat_Articulo->Descripcion = $_POST['txtDescripcion'];
$Obj_Cat_Articulo->Estado = $_POST['cbxEstado'];
//Ejecutamos el mantenimiento de actualizar
if(	$Obj_Cat_Articulo->Agregar() ) {
//Si se ejecuta, redireccionamos al formulario de listar con mensaje succes
echo "<script>location.replace('index.php?mod=catar&form=li&m=success');</script>";
}
else {
//Si no se ejecuta, redireccionamos al formulario de listar con mensaje de error
echo "<script>location.replace('index.php?mod=catar&form=li&m=error');</script>";
}
?>