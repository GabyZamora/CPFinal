<?php
//Llamamos a la capa de datos
require_once 'datos/datos.php';
//Llamamos a la capa de negocio
require_once 'negocio/Vehiculos.php';
//Instanciamos la clase
$Obj_Vehiculos = new Vehiculos();
//Asignación de atributos de la clase de la capa de negocio
$Obj_Vehiculos->nombre_cliente = $_POST['txtNombre'];
$Obj_Vehiculos->nombre_marca = $_POST['cbxMarca'];
$Obj_Vehiculos->nombre_modelo = $_POST['cbxModelo'];
$Obj_Vehiculos->tipo_vehiculo = $_POST['cbxTipo'];
$Obj_Vehiculos->EstadoVehiculo = $_POST['cbxEstadoVeh'];
$Obj_Vehiculos->color_vehiculo = $_POST['txtColor'];
$Obj_Vehiculos->anio_vehiculo = $_POST['txtAnio'];
$Obj_Vehiculos->vin_vehiculo = $_POST['txtVin'];
$Obj_Vehiculos->numero_motor_vehiculo = $_POST['txtMotor'];
$Obj_Vehiculos->observaciones_vehiculo = $_POST['txtObservacion'];
$Obj_Vehiculos->estado = $_POST['cbxEstado'];
//Ejecutamos el mantenimiento de actualizar
if( $Obj_Vehiculos->Actualizar( $_POST['hidId'] ) ) {
//Si se ejecuta, redireccionamos al formulario de listar con mensaje update
echo "<script>location.replace('index.php?mod=veh&form=li&m=update');</script>";
}
else {
//Si no se ejecuta, redireccionamos al formulario de listar con mensaje de error
echo "<script>location.replace('index.php?mod=veh&form=li&m=error');</script>";
}
?>