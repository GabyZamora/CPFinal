<?php
//Llamamos a la capa de datos
require_once 'datos/datos.php';
//Llamamos a la capa de negocio
require_once 'negocio/vehiculos.php';
//Instanciamos la clase
$Obj_Vehiculos = new Vehiculos();
//Ejecutamos el mantenimiento de eliminar
if( $Obj_Vehiculos->Eliminar( $_GET['id'] ) ) {
//Si se ejecuta, redireccionamos al formulario de listar con mensaje success
echo "<script>location.replace('index.php?mod=veh&form=li&m=delete');</script>";
}
else {
//Si no se ejecuta, redireccionamos al formulario de listar con mensaje de error
echo "<script>location.replace('index.php?mod=veh&form=li&m=error');</script>";
}
?>