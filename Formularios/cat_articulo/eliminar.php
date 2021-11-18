<?php
//Llamamos a la capa de datos
require_once 'datos/datos.php';
//Llamamos a la capa de negocio
require_once 'negocio/cat_articulo.php';
//Instanciamos la clase
$Obj_Cat_Articulo = new Cat_Articulo();
//Ejecutamos el mantenimiento de eliminar
if( $Obj_Cat_Articulo->Eliminar( $_GET['id'] ) ) {
//Si se ejecuta, redireccionamos al formulario de listar con mensaje success
echo "<script>location.replace('index.php?mod=catar&form=li&m=delete');</script>";
}
else {
//Si no se ejecuta, redireccionamos al formulario de listar con mensaje de error
echo "<script>location.replace('index.php?mod=catar&form=li&m=error');</script>";
}
?>