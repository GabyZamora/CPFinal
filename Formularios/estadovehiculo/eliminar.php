<?php
//Llamamos a la capa de datos
require_once 'datos/datos.php';
//Llamamos a la capa de negocio
require_once 'negocio/estadovehiculo.php';
//Instanciamos la clase
$Obj_EstadoV = new EstadoV();
//Ejecutamos el mantenimiento de eliminar
if( $Obj_EstadoV->Eliminar( $_GET['id'] ) ) {
//Si se ejecuta, redireccionamos al formulario de listar con mensaje success
echo "<script>location.replace('index.php?mod=estveh&form=li&m=delete');</script>";
}
else {
//Si no se ejecuta, redireccionamos al formulario de listar con mensaje de error
echo "<script>location.replace('index.php?mod=estveh&form=li&m=error');</script>";
}
?>