<?php
//Llamamos a la capa de datos
require_once 'datos/datos.php';
//Llamamos a la capa de negocio
require_once 'negocio/vehiculos.php';
//Instanciamos la clase de la capa de negocio
$Obj_Vehiculos = new Vehiculos();
//Asignación de atributos a la clase de la capa de negocio
$Obj_Vehiculos->nombre_cliente = $_POST['txtNombre'];
$Obj_Vehiculos->nombre_marca = $_POST['cbxMarca'];
$Obj_Vehiculos->nombre_modelo = $_POST['cbxModelo'];
$Obj_Vehiculos->tipo_vehiculo = $_POST['txtTipoVeh'];
$Obj_Vehiculos->color_vehiculo = $_POST['txtColor'];
$Obj_Vehiculos->anio_vehiculo = $_POST['txtAnio'];
$Obj_Vehiculos->vin_vehiculo = $_POST['txtVin'];
$Obj_Vehiculos->numero_motor_vehiculo = $_POST['txtMotor'];
$Obj_Vehiculos->observaciones_vehiculo = $_POST['txtObservacion'];
$Obj_Vehiculos->estado = $_POST['cbxEstado'];
//Ejecutamos el mantenimiento de agregar
if( $Obj_Vehiculos->Agregar() ) {
//Si se ejecuta, redireccionamos al formulario de listar con mensaje succes
echo "<script>location.replace('index.php?mod=veh&form=li&m=success');</script>";
}
else {
//Si no se ejecuta, redireccionamos al formulario de listar con mensaje de error
echo "<script>location.replace('index.php?mod=veh&form=li&m=error');</script>";
}