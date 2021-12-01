<?php
//Llamamos a la capa de datos
require_once 'datos/datos.php';
//Llamamos a la capa de negocio
require_once 'negocio/clientes.php';
//Instanciamos la clase de la capa de negocio
$Obj_Clientes = new Clientes();
//Asignación de atributos a la clase de la capa de negocio
$Obj_Clientes->Nombre = $_POST['txtNombre'];
$Obj_Clientes->Direccion = $_POST['txtDireccion'];
$Obj_Clientes->Departamento = $_POST['cbxDepa'];
$Obj_Clientes->Municipio = $_POST['cbxMunicipio'];
$Obj_Clientes->Telefono = $_POST['txtTel'];
$Obj_Clientes->Correo = $_POST['txtCorreo'];
$Obj_Clientes->Factura = $_POST['txtFactura'];
$Obj_Clientes->NIT = $_POST['txtNIT'];
$Obj_Clientes->NRC = $_POST['txtNRC'];
$Obj_Clientes->GiroNrc = $_POST['txtGiroNrc'];
$Obj_Clientes->Estado = $_POST['cbxEstado'];
//Ejecutamos el mantenimiento de agregar
if( $Obj_Clientes->Agregar() ) {
//Si se ejecuta, redireccionamos al formulario de listar con mensaje succes
echo "<script>location.replace('index.php?mod=clie&form=li&m=success');</script>";
}
else {
//Si no se ejecuta, redireccionamos al formulario de listar con mensaje de error
echo "<script>location.replace('index.php?mod=clie&form=li&m=error');</script>";
}
?>