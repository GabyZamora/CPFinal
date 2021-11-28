<?php
//Llamamos a la capa de datos
require_once 'datos/datos.php';
//Llamamos a la capa de negocio
require_once 'negocio/clientes.php';
//Instanciamos la clase
$Obj_Clientes = new Clientes();
//Asignación de atributos de la clase de la capa de negocio
$Obj_Clientes->Nombre = $_POST['txtNombre'];
$Obj_Clientes->Apellido = $_POST['txtApellido'];
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
//Ejecutamos el mantenimiento de actualizar
if( $Obj_Clientes->Actualizar( $_POST['hidId'] ) ) {
//Si se ejecuta, redireccionamos al formulario de listar con mensaje update
echo "<script>location.replace('index.php?mod=clie&form=li&m=update');</script>";
}
else {
//Si no se ejecuta, redireccionamos al formulario de listar con mensaje de error
echo "<script>location.replace('index.php?mod=clie&form=li&m=error');</script>";
}
?>