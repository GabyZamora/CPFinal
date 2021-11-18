<?php
//Llamamos a la capa de datos
require_once '../datos/datos.php';
//Llamamos a la capa de negocio
require_once '../negocio/proveedor.php';
//Instanciamos las clases de la capa de negocio
$Obj_Proveedor = new Proveedor();
//Cargamos el registro solicitado
$DatosProveedor = $Obj_Proveedor->BuscarPorId( $_GET['id'] );
//Recuperamos el registro obtenido en una variable fila
foreach ( $DatosProveedor as $Fila ) {
  $DatosProductos = $Fila;
}
?>
<html lang="es">
<head>
  <title>Detalle del Proveeedor</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/iconfont/material-icons.css">
  <link rel="stylesheet" href="../css/bootstrap-4.3.1.min.css">
  <style>
  table.table tr th, table.table tr td {
    border-color: #e9e9e9;
    padding: 12px 15px;
    vertical-align: middle;font-size: 14px;
  }
  /* Estilos para los botones (imprimir y cerrar) */
  .table-botones .btn {
    margin-top: 5px;
    margin-bottom: 5px;
  }
  .table-botones .btn {
    color: #fff;
    font-size: 13px;
    border: none;
    min-width: 50px;
    border-radius: 2px;
    border: none;
    outline: none !important;
    margin-left: 0px;
  }
  .table-botones .btn i {
    float: left;
    font-size: 21px;
    margin-right: 5px;
  }
  .table-botones .btn span {
    float: left;
    margin-top: 2px;
  }
  /* Esto es para que al imprimir en papel, no se impriman los botones del
  formulario (imprimir y cerrar) */
  @media print {
    .table-botones {
      display:none;
    }
  }
</style>
</head>
<body>
  <div class="container">
    <div class="table-botones">
      <div class="form-row">
        <div class="col-md-9"></div>
        <div class="col-md-3">
          <button type="button" class="btn btn-info" onClick="window.print();">
            <i class="material-icons">&#xe8ad;</i><span>Imprimir</span></button>
            <button type="button" class="btn btn-danger" data-toggle="modal"
            onClick="window.close();">
            <i class="material-icons">&#xe879;</i><span>Cerrar</span></button>
          </div>
        </div>
      </div>
      <h3>Detalle de Productos</h3>
      <table width="100%" class="table table-borderless ">
        <tbody>
          <tr>
            <td width="20%"><strong>Nombre del Proveedor:</strong></td>
            <td colspan="3"><?php echo $Fila['Nombre']; ?></td>
          </tr>
          <tr>
            <td><strong>Apellido del Proveedor</strong></td>
            <td width="41%"><?php echo $Fila['Apellido']; ?></td>
          </tr>
          <tr>
            <td><strong>Genero</strong></td>
            <td width="41%"><?php echo $Fila['Genero']; ?></td>
          </tr>
          <tr>
            <td><strong>DUI</strong></td>
            <td width="41%"><?php echo $Fila['DUI']; ?></td>
          </tr>
           <tr>
            <td><strong>NIT</strong></td>
            <td width="41%"><?php echo $Fila['NIT']; ?></td>
          </tr>
           <tr>
            <td><strong>Direccion</strong></td>
            <td width="41%"><?php echo $Fila['Direccion']; ?></td>
          </tr>
           <tr>
            <td><strong>Telefono 1</strong></td>
            <td width="41%"><?php echo $Fila['Telefono1']; ?></td>
          </tr>
          <tr>
            <td><strong>Telefono 2</strong></td>
            <td width="41%"><?php echo $Fila['Telefono2']; ?></td>
          </tr>
          <tr>
            <td><strong>Telefono 3</strong></td>
            <td width="41%"><?php echo $Fila['Telefono3']; ?></td>
          </tr>
          <tr>
            <td><strong>Fecha de ingreso</strong></td>
            <td width="41%"><?php echo $Fila['Fecha_Ingreso']; ?></td>
          </tr>
          <tr>
            <td><strong>Fecha de modificacion</strong></td>
            <td width="41%"><?php echo $Fila['Fecha_Modificacion']; ?></td>
          </tr>
          <tr>
            <td><strong>Estado</strong></td>
            <td width="41%"><?php echo $Fila['Estado']; ?></td>
          </tr>
          </tbody>
        </table>
      </div>
    </body>
    </html>