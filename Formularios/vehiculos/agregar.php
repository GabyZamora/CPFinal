<?php
//Llamamos a la capa de datos
require_once 'datos/datos.php';
//Llamamos a la capa de negocio
require_once 'negocio/vehiculos.php';
//Instanciamos la clase de la capa de negocio
$Obj_Vehiculos = new Vehiculos();
//Asignación de atributos a la clase de la capa de negocio
$Obj_Vehiculos->Cliente = $_POST['cbxCliente'];
$Obj_Vehiculos->Marca = $_POST['cbxMarca'];
$Obj_Vehiculos->Modelo = $_POST['cbxModelo'];
$Obj_Vehiculos->Placa = $_POST['txtPlaca'];
$Obj_Vehiculos->TipoVehiculo = $_POST['cbxTipo'];
$Obj_Vehiculos->ColorVehiculo = $_POST['txtColorVeh'];
$Obj_Vehiculos->AnioVehiculo = $_POST['txtAnio'];
$Obj_Vehiculos->VinVehiculo = $_POST['txtVin'];
$Obj_Vehiculos->NumeroMotor = $_POST['txtMotor'];
$Obj_Vehiculos->Observaciones = $_POST['txtObservacion'];
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