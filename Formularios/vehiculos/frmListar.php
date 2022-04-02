<?php
//Llamamos a la capa de datos
require_once('datos/datos.php');
//Llamamos a la capa de negocio
require_once('negocio/paginador.php');
require_once('negocio/vehiculos.php');
//Instanciamos las clases de la capa de negocio
require_once ('negocio/clientes.php');
require_once ('negocio/marcasautos.php');
require_once ('negocio/modelo.php');
include('presentacion/menu.php');


$Obj_Clientes = new Clientes();
$DatosClientes = $Obj_Clientes->ListarTodoCombos();
$Obj_Modelo = new Modelo();
$Datos_Modelo = $Obj_Modelo->ListarTodoCombos();
$Obj_Marcas_Autos = new Marcas_Autos();
$Datos_Marcas_Autos = $Obj_Marcas_Autos->ListarTodoCombos();

$Obj_Paginador = new Paginador();
$Obj_Vehiculos = new Vehiculos();


$Obj_Paginador->Cadena = $Obj_Vehiculos->ListarTodos( addslashes( @$_POST['txtBuscar'] ) );
$Obj_Paginador->CantTotalReg = $Obj_Vehiculos->CantTotalRegistros( addslashes( @$_POST['txtBuscar']
) );
$Obj_Paginador->FilasPorPagina = 30; 
$Obj_Paginador->NumPagina = @$_GET['np']; 
$Obj_Paginador->EnlaceListar = "mod=veh&form=li"; 
$Obj_Paginador->ConfPaginador();

?>
<head>
<!-- CSS -->
<link rel="stylesheet" href="css/iconfont/material-icons.css">
<link rel="stylesheet" href="css/bootstrap-4.3.1.min.css">
<link rel="stylesheet" href="css/formularios.css">
<!-- JS -->
<script src="js/jquery-3.4.0.min.js"></script>
<script src="js/bootstrap-4.3.1.min.js"></script>


	<link href="https://fonts.googleapis.com/css?family=Raleway|Open+Sans" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap-3.3.7.min.css"> 
	<script src="https://kit.fontawesome.com/b1f3afb15c.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="css/menuside.css">
</head>
<body>
<div class="container">
  <div class="table-wrapper">
    <div class="table-title">
      <div class="form-row">
        <div class="col-md-4">
          <a href="indx.php?mod=veh&form=li" class="a-titulo-form"><h2>Gestión de
            <b>Vehiculos</b></h2></a>
          </div>
          <div class="col-md-3">
            <div class="input-group">
              
              <form action="" method="post">
                <div class="input-group-append">
                  <input type="text" class="form-control" placeholder="Buscar..." name="txtBuscar"
                  id="txtBuscar" value="<?php echo @$_POST['txtBuscar']; ?>">
                  <button class="btn btn-info" type="submit" style="margin-left: -3px; height: 35px;">
                    <i class="material-icons">&#xe8b6;</i>
                  </button>
                </div>
              </form>
            </div>
          </div>
          
          <div class="col-md-5">
            <button type="button" class="btn btn-danger" data-toggle="modal"
            onClick="location.replace('index.php?mod=menu');">
            <i class="material-icons">&#xe879;</i><span>Cerrar</span></button>
            <button type="button" class="btn btn-info" onclick="window.open('reportes/generalVehiculos.php','ReporteGenVehiculos', 'width=1000,height=600');">
              <i class="material-icons">&#xe8ad;</i><span>Imprimir</span></button>
              <button type="button" class="btn btn-success" onclick="location.replace('index.php?mod=veh&form=nu');">
                <i class="material-icons">&#xe148;</i><span>Agregar Nuevo</span></button>
              </div>
            </div>
          </div>
          <?php
          
          echo $Obj_Paginador->MostrarControles();
          ?>
          <br>
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th>Nombre Cliente</th>
                <th>Nombre Marca</th>
                <th>Nombre Modelo</th>
                <th>Placa</th>
                <th>Tipo Vehiculo</th>
				<th>Estado de vehículo</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              <?php
              
              foreach ( $Obj_Paginador->RegistrosPaginados as $Fila ) {
                ?>
                <tr>
                  <td><?php echo $Fila['NombreCliente']; ?></td>
                  <td><?php echo $Fila['NombreMarca']; ?></td>
                  <td><?php echo $Fila['NombreModelo']; ?></td>
                  <td><?php echo $Fila['placa']; ?></td>
                  <td><?php echo $Fila['tipo_vehiculo']; ?></td>
				  <td><?php echo $Fila['estado_del_vehiculo']; ?></td>
                  <td>
				  <a href="index.php?mod=veh&form=de&id=<?php echo $Fila['id_vehiculo'];?>" class="view" title="Detalles"><i class="material-icons">&#xE417;</i></a>
                    <a href="index.php?mod=veh&form=ed&id=<?php echo $Fila['id_vehiculo'];?>" class="edit"><i class="material-icons" data-toggle="tooltip"
                      title="Editar">&#xE254;</i></a>                      
					  <a href="#" class="delete" onclick="Eliminar('<?php echo $Fila['id_vehiculo'];?>');"><i class="material-icons" data-toggle="tooltip"
                        title="Eliminar">&#xE872;</i></a>
                      </td>
                    </tr>
                    <?php
                  }
                  ?>
                </tbody>
          </table>
    </div> 
</div> 
<script type="text/javascript">
    function Eliminar(paId){
        if(confirm('¿Confirma eliminar este registro?')){
            window.location.replace('indx.php?mod=veh&form=el&id=' + paId);
        }
    }
</script>
          
<?php
          
require_once 'Formularios/myAlert.php';
          
if ( isset( $_GET['m'] ) ) {
    if ( $_GET['m'] == 'success' ) {
      	echo "<script>myAlertSuccess();</script>";
    }
   	else if ( $_GET['m'] == 'error' ) {
        echo "<script>myAlertDanger();</script>";
   	}
    else if ( $_GET['m'] == 'update' ) {
        echo "<script>myAlertInfo();</script>";
    }
    else if ( $_GET['m'] == 'delete' ) {
        echo "<script>myAlertWarning();</script>";
        }
}
?>