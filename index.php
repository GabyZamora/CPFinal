<?php
// ---------- Configuramos la zona horaria de El Salvador ----------
date_default_timezone_set("America/El_Salvador");
switch( @$_GET["mod"] ){
  case 'menu':
    $Modulo = 'presentacion/menu.php';
    break;
  case 'clie':
  $Modulo = 'Formularios/clientes/index.php';
  break;
  case 'prove':
    $Modulo = 'Formularios/proveedores/index.php';
    break;
  case 'usu':
    $Modulo = 'Formularios/usuarios/index.php';
    break;
  case 'marcaarti':
    $Modulo = 'Formularios/marcaarticulos/index.php';
    break;
  case 'catar':
      $Modulo = 'Formularios/cat_articulo/index.php';
  break;
  case 'catse':
    $Modulo = 'Formularios/categoriaservicios/index.php';
    break;
  case 'marc':
    $Modulo = 'Formularios/marcasautos/index.php';
    break;
  case 'model':
      $Modulo = 'Formularios/modelos/index.php';
  break;
  case 'veh':
    $Modulo = 'Formularios/vehiculos/index.php';
  break;
  case 'estveh':
    $Modulo = 'Formularios/estadovehiculo/index.php';
  break;
  case 'serv':
    $Modulo = 'Formularios/servicios/index.php';
  break;
  default:
  $Modulo = 'login.php';
  break;
}
?>

<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="CProyecto" content="width=device-width, initial-scale=1.0">
  <title>Proyecto Final</title>
  <meta name="author" content="ITCA-FEPADE" />
  <link rel="shortcut icon" href="images/car.png">
  <style>
  body {
    font-family: "Trebuchet MS", Arial, Helvetica;
  }
</style>
</head>
<body>
  <div id="DivMainIndex" style='position: relative; margin: 0 auto 0 auto;'>
    <?php
    require_once $Modulo;
    ?>
  </div>
</body>
</html>
