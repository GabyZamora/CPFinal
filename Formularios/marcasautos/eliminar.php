<?php
//Llamamos a la capa de datos
require_once 'datos/datos.php';
//Llamamos a la capa de negocio
require_once 'negocio/marcasautos.php';
//Instanciamos la clase
$Obj_Marcas_Autos = new Marcas_Autos();
//Ejecutamos el mantenimiento de eliminar
if( $Obj_Marcas_Autos->Eliminar( $_GET['id'] ) ) {
//Si se ejecuta, redireccionamos al formulario de listar con mensaje success
echo "<script>location.replace('index.php?mod=marc&form=li&m=delete');</script>";
}
else {
//Si no se ejecuta, redireccionamos al formulario de listar con mensaje de error
echo "<script>location.replace('index.php?mod=marc&form=li&m=error');</script>";
}
?>