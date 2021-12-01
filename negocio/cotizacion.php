<?php
class Cotizacion extends Datos {
  //Atributos, corresponden a cada uno de los campos de la tabla de clientes
  public $id_servicio;
  public $cantidad_se;
  public $precio_se;
  public $id_articulo;
  public $cantidad_ar;
  public $precio_ar;
  public $fechaIngreso_cotizacion;
  public $fechaModificacion_cotizacion;
  public $estado;

  //Métodos
  public function ListarTodos( $paBuscar ) {
    $Cadena = "SELECT 
    cotizacion.id_cotizacion,
    cotizacion.id_servicio, servicios.nombre_servicio AS Servicio,
    cotizacion.cantidad_se AS CantServicio,
    cotizacion.precio_se AS PrecioServicio,
    cotizacion.id_articulo, articulos.nombre_articulo AS Articulo,
    cotizacion.cantidad_ar AS CantidadArt,
    cotizacion.precio_ar AS PrecioArt,
    cotizacion.fechaIngreso_cotizacion AS FechaIngreso,
    cotizacion.fechaModificacion_cotizacion AS FechaModificacion,
    cotizacion.estado AS Estado
    FROM
    cotizacion
    INNER JOIN servicos ON cotizacion.id_servicio = servicios.id_servicio
    INNER JOIN articulos ON cotizacion.id_articulo = articulos.id_articulo
    WHERE
    (cotizacion.nombre_servicio LIKE '%".$paBuscar."%')
    AND estado = 'ACTIVO'";
    return $Cadena; //Acá no se ejecuta la cadena, porque se hace en la clase del paginador
  }
  public function CantTotalRegistros( $paBuscar ) {
    $Cadena = "SELECT COUNT(id_cotizacion) FROM cotizacion
    INNER JOIN servicos ON cotizacion.id_servicio = servicios.id_servicio
    INNER JOIN articulos ON cotizacion.id_articulo = articulos.id_articulo
    WHERE
    (cotizacion.nombre_servicio LIKE '%".$paBuscar."%')
    AND estado = 'ACTIVO'";
    return mysqli_fetch_row($this->EjecutarQuery( $Cadena ));
  } //Retorna el número de filas que tiene la consulta

  public function ListarTodoReporte() {
    $Cadena = "SELECT
    cotizacion.id_cotizacion,
    cotizacion.id_servicio, servicios.nombre_servicio AS Servicio,
    cotizacion.cantidad_se AS CantServicio,
    cotizacion.precio_se AS PrecioServicio,
    cotizacion.id_articulo, articulos.nombre_articulo AS Articulo,
    cotizacion.cantidad_ar AS CantidadArt,
    cotizacion.precio_ar AS PrecioArt,
    cotizacion.fechaIngreso_cotizacion AS FechaIngreso,
    cotizacion.fechaModificacion_cotizacion AS FechaModificacion,
    cotizacion.estado AS Estado
    FROM
    cotizacion
    INNER JOIN servicos ON cotizacion.id_servicio = servicios.id_servicio
    INNER JOIN articulos ON cotizacion.id_articulo = articulos.id_articulo
    WHERE
    cotizacion.estado = 'ACTIVO'";
    return $this->EjecutarQuery( $Cadena );
  }
  public function BuscarPorId( $paId ) {
    $Cadena = "SELECT
    cotizacion.id_cotizacion,
    cotizacion.id_servicio, servicios.nombre_servicio AS Servicio,
    cotizacion.cantidad_se AS CantServicio,
    cotizacion.precio_se AS PrecioServicio,
    cotizacion.id_articulo, articulos.nombre_articulo AS Articulo,
    cotizacion.cantidad_ar AS CantidadArt,
    cotizacion.precio_ar AS PrecioArt,
    cotizacion.fechaIngreso_cotizacion AS FechaIngreso,
    cotizacion.fechaModificacion_cotizacion AS FechaModificacion,
    cotizacion.estado AS Estado
    FROM
    cotizacion
    INNER JOIN servicos ON cotizacion.id_servicio = servicios.id_servicio
    INNER JOIN articulos ON cotizacion.id_articulo = articulos.id_articulo
    WHERE
    cotizacion.id_cotizacion = '".$paId."' ";
    return $this->EjecutarQuery( $Cadena );
    }
    public function Agregar() {
    $Cadena = "INSERT INTO cotizacion (
          id_servicio,
          cantidad_se,
          precio_se,
          id_articulo,
          cantidad_ar,
          precio_ar,
          estado)
      VALUES (
        '".addslashes($this->Servicio)."',
        '".addslashes($this->CantServicio)."',
        '".addslashes($this->PrecioServicio)."',
        '".addslashes($this->Articulo)."',
        '".addslashes($this->CantidadArt)."',
        '".addslashes($this->PrecioArt)."',
        'ACTIVO' )";
        return $this->EjecutarQuery( $Cadena );
      }
      public function Actualizar( $paId ) {
        $Cadena = "UPDATE cotizacion SET
        id_servicio = '".addslashes($this->Servicio)."',
        cantidad_se = '".addslashes($this->CantServicio)."',
        precio_se = '".addslashes($this->PrecioServicio)."',
        id_articulo = '".addslashes($this->Articulo)."',
        cantidad_ar = '".addslashes($this->CantidadArt)."',
        precio_ar = '".addslashes($this->PrecioArt)."'
        WHERE id_cotizacion  = '".$paId."' ";
        return $this->EjecutarQuery( $Cadena );
      }
      public function Eliminar( $paId ) {
        $Cadena = "UPDATE categoria_art SET estado = 'INACTIVO' WHERE id_cotizacion = '".$paId."' ";
        return $this->EjecutarQuery( $Cadena );
      }

      public function ListarTodoCombos() {
        $Cadena = "SELECT * FROM cotizacion
        WHERE
        estado = 'ACTIVO' ";
        return $this->EjecutarQuery( $Cadena );
      }
    }
    ?>


    