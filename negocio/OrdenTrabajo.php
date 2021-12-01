
<?php
class Clientes extends Datos {
  //Atributos, corresponden a cada uno de los campos de la tabla de clientes
  public $lista_de_verificacion;
  public $falla_de_vehiculo;
  public $fechaIngreso_orden_trabajo;
  public $fechaModificacion_orden_trabajo;
  public $id_cliente;
  public $id_estado_del_vehiculo;
  public $id_cotizacion;
  public $id_servicio;
  public $estado;

  //Métodos
  public function ListarTodos( $paBuscar ) {
    $Cadena = "SELECT 
    orden_trabajo.id_orden_trabajo,
    orden_trabajo.lista_de_verificacion AS ListaVerificacion,
    orden_trabajo.falla_de_vehiculo AS FallaVehiculo,
    orden_trabajo.fechaIngreso_orden_trabajo AS FechaIngreso,
    orden_trabajo.fechaModificacion_orden_trabajo AS FechaModificacion,
    orden_trabajo.id_cliente, clientes.nombre_cliente AS NombreCliente,
    orden_trabajo.id_estado_del_vehiculo, estado_del_vehiculo.ingresado AS Ingresado,
    orden_trabajo.id_cotizacion, cotizacion.id_cotizacion AS Cotizacion,
    orden_trabajo.id_servicio, servicios.nombre_servicio AS Servicio,
    orden_trabajo.estado AS Estado
    FROM
    orden_trabajo
    INNER JOIN clientes ON orden_trabajo.id_cliente = clientes.id_cliente
    INNER JOIN cotizacion ON orden_trabajo.cotizacion = cotizacion.id_cotizacion
    INNER JOIN estado_del_vehiculo ON orden_trabajo.id_estado_del_vehiculo = estado_del_vehiculo.id_estado_del_vehiculo
    INNER JOIN servicios ON orden_trabajo.id_servicio = servicios.id_servicio
    WHERE
    (orden_trabajo.id_orden_trabajo LIKE '%".$paBuscar."%' )
    AND estado = 'ACTIVO'";
    return $Cadena; //Acá no se ejecuta la cadena, porque se hace en la clase del paginador
  }
  public function CantTotalRegistros( $paBuscar ) {
    $Cadena = "SELECT COUNT(id_orden_trabajo) FROM orden_trabajo
    INNER JOIN clientes ON orden_trabajo.id_cliente = clientes.id_cliente
    INNER JOIN cotizacion ON orden_trabajo.cotizacion = cotizacion.id_cotizacion
    INNER JOIN estado_del_vehiculo ON orden_trabajo.id_estado_del_vehiculo = estado_del_vehiculo.id_estado_del_vehiculo
    INNER JOIN servicios ON orden_trabajo.id_servicio = servicios.id_servicio
    WHERE
    (orden_trabajo.lista_de_verificacion LIKE '%".$paBuscar."%' )
    AND estado = 'ACTIVO'";
    return mysqli_fetch_row($this->EjecutarQuery( $Cadena ));
  } //Retorna el número de filas que tiene la consulta

  public function ListarTodoReporte() {
    $Cadena = "SELECT 
    orden_trabajo.id_orden_trabajo,
    orden_trabajo.lista_de_verificacion AS ListaVerificacion,
    orden_trabajo.falla_de_vehiculo AS FallaVehiculo,
    orden_trabajo.fechaIngreso_orden_trabajo AS FechaIngreso,
    orden_trabajo.fechaModificacion_orden_trabajo AS FechaModificacion,
    orden_trabajo.id_cliente, clientes.nombre_cliente AS NombreCliente,
    orden_trabajo.id_estado_del_vehiculo, estado_del_vehiculo.ingresado AS Ingresado,
    orden_trabajo.id_cotizacion, cotizacion.id_cotizacion AS Cotizacion,
    orden_trabajo.id_servicio, servicios.nombre_servicio AS Servicio,
    orden_trabajo.estado AS Estado
    FROM
    orden_trabajo
    INNER JOIN clientes ON orden_trabajo.id_cliente = clientes.id_cliente
    INNER JOIN cotizacion ON orden_trabajo.cotizacion = cotizacion.id_cotizacion
    INNER JOIN estado_del_vehiculo ON orden_trabajo.id_estado_del_vehiculo = estado_del_vehiculo.id_estado_del_vehiculo
    INNER JOIN servicios ON orden_trabajo.id_servicio = servicios.id_servicio
    WHERE
    orden_trabajo.estado = 'ACTIVO'";
    return $this->EjecutarQuery( $Cadena );
  }
  public function BuscarPorId( $paId ) {
    $Cadena = "SELECT
    orden_trabajo.id_orden_trabajo,
    orden_trabajo.lista_de_verificacion AS ListaVerificacion,
    orden_trabajo.falla_de_vehiculo AS FallaVehiculo,
    orden_trabajo.fechaIngreso_orden_trabajo AS FechaIngreso,
    orden_trabajo.fechaModificacion_orden_trabajo AS FechaModificacion,
    orden_trabajo.id_cliente, clientes.nombre_cliente AS NombreCliente,
    orden_trabajo.id_estado_del_vehiculo, estado_del_vehiculo.ingresado AS Ingresado,
    orden_trabajo.id_cotizacion, cotizacion.id_cotizacion AS Cotizacion,
    orden_trabajo.id_servicio, servicios.nombre_servicio AS Servicio,
    orden_trabajo.estado AS Estado
    FROM
    orden_trabajo
    INNER JOIN clientes ON orden_trabajo.id_cliente = clientes.id_cliente
    INNER JOIN cotizacion ON orden_trabajo.cotizacion = cotizacion.id_cotizacion
    INNER JOIN estado_del_vehiculo ON orden_trabajo.id_estado_del_vehiculo = estado_del_vehiculo.id_estado_del_vehiculo
    INNER JOIN servicios ON orden_trabajo.id_servicio = servicios.id_servicio
    WHERE 
    orden_trabajo.id_orden_trabajo = '".$paId."' ";
    return $this->EjecutarQuery( $Cadena );
    }
    public function Agregar() {
    $Cadena = "INSERT INTO orden_trabajo (
          lista_de_verificacion,
          falla_de_vehiculo,
          id_cliente,
          id_estado_del_vehiculo,
          id_cotizacion,
          id_servicio,
          estado )
      VALUES (
        '".addslashes($this->ListaVerificacion)."',
        '".addslashes($this->FallaVehiculo)."',
        '".addslashes($this->NombreCliente)."',
        '".addslashes($this->Ingresado)."',
        '".addslashes($this->Cotizacion)."',
        '".addslashes($this->Servicio)."',
        'ACTIVO' )";
        return $this->EjecutarQuery( $Cadena );
      }
      public function Actualizar( $paId ) {
        $Cadena = "UPDATE orden_trabajo SET
        lista_de_verificacion='".addslashes($this->ListaVerificacion)."',
        falla_de_vehiculo='".addslashes($this->FallaVehiculo)."',
        id_cliente='".addslashes($this->NombreCliente)."',
        id_estado_del_vehiculo='".addslashes($this->Ingresado)."',
        id_cotizacion='".addslashes($this->Cotizacion)."',
        id_servicio='".addslashes($this->Servicio)."'
           WHERE id_cliente  = '".$paId."' ";
        return $this->EjecutarQuery( $Cadena );
      }
      public function Eliminar( $paId ) {
        $Cadena = "UPDATE orden_trabajo SET estado = 'INACTIVO' WHERE id_orden_trabajo =
        '".$paId."' ";
        return $this->EjecutarQuery( $Cadena );
      }
      public function ListarTodoCombos() {
        $Cadena = "SELECT * FROM orden_trabajo
        WHERE
        estado = 'ACTIVO' ";
        return $this->EjecutarQuery( $Cadena );
      }
    }
    ?>


    