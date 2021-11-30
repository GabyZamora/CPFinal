<?php
//Llamamos a la capa de datos
require_once 'datos/datos.php';
//Llamamos a la capa de negocio
require_once 'negocio/estadovehiculo.php';
//Instanciamos la clase
$Obj_EstadoV = new EstadoV();
//Asignación de atributos de la clase de la capa de negocio
$Obj_EstadoV->Ingresado = $_POST['txtIngresado'];
$Obj_EstadoV->Placa = $_POST['cbxPlaca'];
$Obj_EstadoV->Aceptacion = $_POST['txtAceptacion'];
$Obj_EstadoV->EsperaRepuesto = $_POST['txtEsperaRepuesto'];
$Obj_EstadoV->EstadoReparacion = $_POST['txtEstadoReparacion'];
$Obj_EstadoV->FinalizacionTaller = $_POST['txtFinalizacionTaller'];
$Obj_EstadoV->FueraTaller = $_POST['txtFueraTaller'];
$Obj_EstadoV->estado = $_POST['cbxEstado'];
//Ejecutamos el mantenimiento de actualizar
if(	$Obj_EstadoV->Agregar() ) {
//Si se ejecuta, redireccionamos al formulario de listar con mensaje succes
echo "<script>location.replace('index.php?mod=estveh&form=li&m=success');</script>";
}
else {
//Si no se ejecuta, redireccionamos al formulario de listar con mensaje de error
echo "<script>location.replace('index.php?mod=estveh&form=li&m=error');</script>";
}
?>