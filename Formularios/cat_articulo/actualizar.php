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
//Ejecutamos el mantenimiento de actualizar
if( $Obj_Cat_Articulo->Actualizar( $_POST['hidId'] ) ) {
//Si se ejecuta, redireccionamos al formulario de listar con mensaje update
echo "<script>location.replace('index.php?mod=catar&form=li&m=update');</script>";
}
else {
//Si no se ejecuta, redireccionamos al formulario de listar con mensaje de error
echo "<script>location.replace('index.php?mod=catar&form=li&m=error');</script>";
}
?>