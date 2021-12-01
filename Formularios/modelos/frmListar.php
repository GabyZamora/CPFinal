<?php
//Llamamos a la capa de datos
require_once 'datos/datos.php';
//Llamamos a la capa de negocio
require_once 'negocio/paginador.php';
require_once 'negocio/modelo.php';
//Instanciamos las clases de la capa de negocio
$Obj_Paginador = new Paginador();
$Obj_Modelo = new Modelo();

//Asignamos los valores necesatrios a los atributos de la clase del paginador -----------------------------------------
$Obj_Paginador->Cadena = $Obj_Modelo->ListarTodos( addslashes( @$_POST['txtBuscar'] ) );
$Obj_Paginador->CantTotalReg = $Obj_Modelo->CantTotalRegistros( addslashes( @$_POST['txtBuscar']
) );
$Obj_Paginador->FilasPorPagina = 20; //Define la cantidad de registros mostrados por página
$Obj_Paginador->NumPagina = @$_GET['np']; //Define la página solicitada al paginador
$Obj_Paginador->EnlaceListar = "mod=model&form=li"; //Define el enlace al modulo y formulario listar de ese módulo
//Aplicamos la configuración al paginador
$Obj_Paginador->ConfPaginador();
//Fin de configuraciones del paginador --------------------------------------------------------------------------------
?>
<!-- CSS -->
<head>
  <link rel="stylesheet" href="css/iconfont/material-icons.css">
  <link rel="stylesheet" href="css/bootstrap-4.3.1.min.css">
  <link rel="stylesheet" href="css/formularios.css">
  <!-- JS -->
  <script src="js/jquery-3.4.0.min.js"></script>
  <script src="js/bootstrap-4.3.1.min.js"></script>
  
	<link href="https://fonts.googleapis.com/css?family=Raleway|Open+Sans" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
	<link rel="stylesheet" href="css/iconfont/material-icons.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap-3.3.7.min.css"> 
	<script src="https://kit.fontawesome.com/b1f3afb15c.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="css/menuside.css">
	<style type="text/css">
				*{
			margin: 0;
			padding: 0;
			user-select: none;
			box-sizing: border-box;

		}
		.sidebar{
			position: absolute;
			width: 250px;
			height: 100%;
			left: 0;
			top: 70px;
			background-color: white;
			overflow: auto;
		}

		#sidemenu #profile{
			border-bottom: solid 1px var(--hovercolor);
			padding: var(--padding) 0;
			text-align: center;
		}

		#sidemenu #profile #photo{
			box-sizing: border-box;
			padding: var(--padding);
			margin: 0 auto;
		}
		.sidebar .text{
			color: white;
			font-size: 25px;
			font-weight: 600;
			line-height: 65px;
			text-align: center;
			background: #032c55;
			letter-spacing: 1px;
		}

		nav ul{
			background: white;
			height: 100%;
			width: 100%;
			list-style: none;
		}

		nav ul li{
			line-height: 60px;	
		}

		nav ul li a{
			position: relative;
			color: black;
			text-decoration: none;
			font-size: 18px;
			padding-left: 40px;
			font-weight: 500;
			display: block;
			width: 100%;
		}

		nav ul li a:hover{
			color: #f7dc74;
		}

		nav ul ul{
			position: static;
			display: none;
		}

		nav ul .vehi-show.show{
			display: block;
		}

		nav ul ul li{
			line-height: 42px;
			border-bottom: none;
		}

		nav ul ul li a{
			font-size: 17px;
			padding-left: 80px;
		}

		nav ul li a span{
			position: absolute;
			top: 50%;
			right: 20px;
			transform: translateY(-50%);
			font-size: 22px;
			transition: transform 0.4s;
		}

		nav ul li a:hover span{
			transform: translateY(-50%) rotate(-180deg);
		}

		
	</style>
</head>
<body>
	<nav class="navbar navbar-default navbar-expand-lg navbar-light"> 
		<div class="navbar-header d-flex col"> 
			<a class="navbar-brand" href="index.php?mod=menu">Autos <b>Consultoria Profesional</b>
			</a> 
			<img style="height:60px; width:60px;"src="images/car.png">
		</div>
	</nav> 
	<nav class="sidebar">
			<div class="text">
				<div id="profile">
					<div id="photo"><img style="width:100px; height:auto;"src="images/logo.png" alt=""></div>
			</div>
			</div>
			<ul>
				<li><a href="index.php?mod=menu"><span class="fas fa-home"></span>Inicio</a></li>
				<li><a href="index.php?mod=usu&form=li"><span class="fas fa-user"></span> Usuarios</a></li>
				<li><a href="index.php?mod=clie&form=li"><span class="fas fa-clipboard-list"></span> Clientes</a></li>
				<li><a href="index.php?mod=prove&form=li"><span class="fas fa-truck"></span> Proveedores</a></li>
				<li><a href="index.php?mod=estveh&form=li"><span class="fas fa-file-alt"></span>Estado de <br>vehículo</a>
				<li>
					<a href="#" class="vehi-btn">Vehículos
						<span class="fas fa-caret-down first"></span>
					</a>
					<ul class="vehi-show">
						<li><a href="index.php?mod=veh&form=li">Gestión de Vehículos</a></li>
						<li><a href="index.php?mod=model&form=li">Modelos</a></li>
						<li><a href="index.php?mod=marc&form=li">Marcas</a></li>
					</ul>
				</li>
				<li>
					<a href="#" class="art-btn">Inventario
						<span class="fas fa-caret-down first"></span>
					</a>
					<ul class="art-show">
						<li><a href="#">Artículos</a></li>
						<li><a href="index.php?mod=catar&form=li">Categorías</a></li>
						<li><a href="index.php?mod=marcaarti&form=li">Marcas</a></li>
					</ul>
				</li>
				<li>
					<a href="#" class="ser-btn">Servicios
						<span class="fas fa-caret-down first"></span>
					</a>
					<ul class="ser-show">
						<li><a href="index.php?mod=ser&form=li">Gestión de servicios</a></li>
						<li><a href="index.php?mod=catse&form=li">Categorías</a></li>
					</ul>
				</li>
				<li><a href="index.php"><span class="fas fa-sign-out-alt"></span>Cerrar sesión</a></li>
			</ul>
		</nav>
	<script>
		$('.vehi-btn').click(function(){
			$('nav ul .vehi-show').toggleClass("show");
		});
		$('.art-btn').click(function(){
			$('nav ul .art-show').toggleClass("show");
		});
		$('.ser-btn').click(function(){
			$('nav ul .ser-show').toggleClass("show");
		});
	</script>

<div class="container">
  <div class="table-wrapper">
    <div class="table-title">
      <div class="form-row">
        <div class="col-md-4">
          <a href="index.php?mod=clie&form=li" class="a-titulo-form"><h2>Gestión de
            <b>Modelos de Vehículos</b></h2></a>
          </div>
          <div class="col-md-3">
            <div class="input-group">
              <!-- Acá usamos un formulario, que solo contiene el input text para la búsqueda, se hace así
              porque la
              búsqueda se efectúa al hacer POST enviado el tecxto del input text -->
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
          <!-- En esta columna colocamos los botones de acción principales, a los cuales les hemos agregado
          íconos
          incluidos en el archivo "material-icons.css" referenciado arriba en este archivo -->
          <div class="col-md-5">
            <button type="button" class="btn btn-danger" data-toggle="modal"
            onClick="location.replace('index.php?mod=menu');">
            <i class="material-icons">&#xe879;</i><span>Cerrar</span></button>
              <button type="button" class="btn btn-success" onclick="location.replace('index.php?mod=model&form=nu');">
                <i class="material-icons">&#xe148;</i><span>Agregar Nuevo</span></button>
              </div>
            </div>
          </div>
          <?php
          //----------------------------------- Mostramos los controles (botones) del paginador ----------------------------------
          echo $Obj_Paginador->MostrarControles();
          ?>
          <br>
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th>Modelo</th>
                <th>Marca</th>
                <th>Estado</th>
              </tr>
            </thead>
            <tbody>
              <?php
              // Recperamos los registros de la tabla (vienen de la clase paginador) y los mostramos en la tabla HTML
              foreach ( $Obj_Paginador->RegistrosPaginados as $Fila ) {
                ?>
                <tr>
                  <td><?php echo $Fila['NombreModelo']; ?></td>
                  <td><?php echo $Fila['NombreMarca']; ?></td>
                  <td><?php echo $Fila['estado']; ?></td>
                  <td>
                    <a href="index.php?mod=model&form=de&id=<?php echo $Fila['id_modelo'];?>" class="view" title="Detalles"><i class="material-icons">&#xE417;</i></a>
                    <a href="index.php?mod=model&form=ed&id=<?php echo $Fila['id_modelo'];?>" class="edit"><i class="material-icons" data-toggle="tooltip"
                      title="Editar">&#xE254;</i></a>
                      <a href="#" class="delete" onclick="Eliminar('<?php echo $Fila['id_modelo']; ?>');"><i class="material-icons" data-toggle="tooltip"
                        title="Eliminar">&#xE872;</i></a>
                      </td>
                    </tr>
                    <?php
                  }
                  ?>
                </tbody>
              </table>
            </div> <!-- Cierre del Div table-wrapper -->
          </div> <!-- Cierre del Div container -->
          <script type="text/javascript">
          function Eliminar(paId){
            if(confirm('¿Confirma eliminar este registro?')){
              window.location.replace('index.php?mod=model&form=el&id=' + paId);
            }
          }
          </script>
          <?php
          //Llamamos a la capa de presentación, para las alertas que darán información al ejecutarse los mantenimientos
          require_once 'Formularios/MyAlert.php';
          //-- -------------------- Opciones para las alertas -------------------- --
          //-- Si la url lleva una variable "m", significa mensaje, se mostrará según lo que sea solicitado
          if ( isset( $_GET['m'] ) ) {
            if ( $_GET['m'] == 'success' ) {
              echo "<script>myAlertSuccess();</script>";
            }
            else if ( $_GET['m'] == 'error' ) {
              echo "<script>myAlertDanger();</script>";
            }
          }