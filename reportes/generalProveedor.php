<?php
//Llamamos a la capa de datos
require_once '../datos/datos.php';
//Llamamos a la capa de negocio
require_once '../negocio/proveedor.php';
//Instanciamos las clases de la capa de negocio
$Obj_Proveedor = new Proveedor();
//Recuperamos los registros de la tabla
$DatosProveedor = $Obj_Proveedor->ListarTodoReporte();
?>
<html lang="es">
<head>
  <title>Reporte General de Proveedores</title>
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
      <h3>Reporte General de Proveedores</h3>
      <table width="100%" class="table table-bordered">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Nombre Comercial</th>
            <th scope="col">Nombre del Proveedor</th>
            <th scope="col">Giro</th>
            <th scope="col">DUI</th>
            <th scope="col">NIT</th>
            <th scope="col">Dirrecion</th>
            <th scope="col">Telefono1</th>
            <th scope="col">Telefono2</th>
            <th scope="col">Telefono3</th>
            <th scope="col">Estado</th>
          </tr>
        </thead>
        <tbody>
          <?php
          foreach ( $DatosProveedor as $Fila ) {
            ?>
            <tr>
              <td><?php echo $Fila['nombre_comercial_proveedor']; ?></td>
              <td><?php echo $Fila['nombre_propietario_proveedor']; ?></td>
              <td><?php echo $Fila['giro_proveedor']; ?></td>
              <td><?php echo $Fila['DUI_proveedor']; ?></td>
              <td><?php echo $Fila['NIT_proveedor']; ?></td>
              <td><?php echo $Fila['direccion_proveedor']; ?></td>
              <td><?php echo $Fila['telefono1_proveedor']; ?></td>
              <td><?php echo $Fila['telefono2_proveedor']; ?></td>
              <td><?php echo $Fila['telefono3_proveedor']; ?></td>
              <td><?php echo $Fila['estado']; ?></td>
            </tr>
            <?php
          }
          ?>
        </tbody>
      </table>
    </div>
  </body>
  </html>
