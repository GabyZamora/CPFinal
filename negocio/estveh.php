<?php
class EstadoV extends Datos {
  //Atributos, corresponden a cada uno de los campos de la tabla de clientes
  public $id_estado_del_vehiculo;
  public $ingresado;
  public $id_vehiculo;
  public $aceptado_por_el_cliente;
  public $Espera_de_repuesto;
  public $estado_de_reparacion;
  public $finalizacion_de_taller;
  public $fuera_de_taller;
  
  //Métodos
  public function ListarTodos( $paBuscar ) {
    $Cadena = "SELECT
    estado_del_vehiculo.id_estado_del_vehiculo,
    estado_del_vehiculo.ingresado AS Ingresado,
    estado_del_vehiculo.id_vehiculo,
    vehiculos.placa AS Placa,
    estado_del_vehiculo.aceptado_por_el_cliente AS Aceptacion,
    estado_del_vehiculo.Espera_de_repuesto AS EsperaRepuesto,
    estado_del_vehiculo.estado_de_reparacion AS EstadoReparacion,
    estado_del_vehiculo.finalizacion_de_taller AS FinalizacionTaller,
    estado_del_vehiculo.fuera_de_taller AS FueraTaller,
    estado_del_vehiculo.estado
    FROM estado_del_vehiculo
    INNER JOIN vehiculos ON estado_del_vehiculo.id_vehiculo = vehiculos.id_vehiculo
    WHERE (estado_del_vehiculo.id_estado_del_vehiculo LIKE '%".$paBuscar."%') ";
    return $Cadena; //Acá no se ejecuta la cadena, porque se hace en la clase del paginador
  }
  public function CantTotalRegistros( $paBuscar ) {
    $Cadena = "SELECT COUNT(id_estado_del_vehiculo) FROM estado_del_vehiculo
    INNER JOIN vehiculos ON estado_del_vehiculo.id_vehiculo = vehiculos.id_vehiculo 
    WHERE
    (vehiculos.placa LIKE '%".$paBuscar."%')";
    return mysqli_fetch_row($this->EjecutarQuery( $Cadena ));
  } //Retorna el número de filas que tiene la consulta

  public function ListarTodoReporte() {
    $Cadena = "SELECT
    estado_del_vehiculo.id_estado_del_vehiculo,
    estado_del_vehiculo.ingresado AS Ingresado,
    estado_del_vehiculo.id_vehiculo,
    vehiculos.placa AS Placa,
    estado_del_vehiculo.aceptado_por_el_cliente AS Aceptacion,
    estado_del_vehiculo.Espera_de_repuesto AS EsperaRepuesto,
    estado_del_vehiculo.estado_de_reparacion AS EstadoReparacion,
    estado_del_vehiculo.finalizacion_de_taller AS FinalizacionTaller,
    estado_del_vehiculo.fuera_de_taller AS FueraTaller,
    estado_del_vehiculo.estado
    FROM estado_del_vehiculo
    INNER JOIN vehiculos ON estado_del_vehiculo.id_vehiculo = vehiculos.id_vehiculo
    WHERE estado_del_vehiculo.id_estado_del_vehiculo = 'ACTIVO' ";
    return $this->EjecutarQuery( $Cadena );
  }
  public function BuscarPorId( $paId ) {
    $Cadena = "SELECT
    estado_del_vehiculo.id_estado_del_vehiculo,
    estado_del_vehiculo.ingresado AS Ingresado,
    estado_del_vehiculo.id_vehiculo,
    vehiculos.placa AS Placa,
    estado_del_vehiculo.aceptado_por_el_cliente AS Aceptacion,
    estado_del_vehiculo.Espera_de_repuesto AS EsperaRepuesto,
    estado_del_vehiculo.estado_de_reparacion AS EstadoReparacion,
    estado_del_vehiculo.finalizacion_de_taller AS FinalizacionTaller,
    estado_del_vehiculo.fuera_de_taller AS FueraTaller,
    estado_del_vehiculo.estado
    FROM estado_del_vehiculo
    INNER JOIN vehiculos ON estado_del_vehiculo.id_vehiculo = vehiculos.id_vehiculo
    WHERE estado_del_vehiculo.id_estado_del_vehiculo ='".$paId."' ";
    return $this->EjecutarQuery( $Cadena );
    }
    public function Agregar() {
    $Cadena = "INSERT INTO estado_del_vehiculo (
          ingresado,
          id_vehiculo,
          aceptado_por_el_cliente,
          Espera_de_repuesto,
          estado_de_reparacion,
          finalizacion_de_taller,
          fuera_de_taller,
          estado )
      VALUES (
        '".addslashes($this->Ingresado)."',
        '".addslashes($this->Placa)."',
        '".addslashes($this->Aceptacion)."',
        '".addslashes($this->EsperaRepuesto)."',
        '".addslashes($this->EstadoReparacion)."',
        '".addslashes($this->FinalizacionTaller)."',
        '".addslashes($this->FueraTaller)."',
        'ACTIVO' )";
        return $this->EjecutarQuery( $Cadena );
      }
      public function Actualizar( $paId ) {
        $Cadena = "UPDATE modelo_aut SET
        ingresado'".addslashes($this->Ingresado)."',
        id_vehiculo'".addslashes($this->Placa)."',
        aceptado_por_el_cliente'".addslashes($this->Aceptacion)."',
        Espera_de_repuesto'".addslashes($this->EsperaRepuesto)."',
        estado_de_reparacion'".addslashes($this->EstadoReparacion)."',
        finalizacion_de_taller'".addslashes($this->FinalizacionTaller)."',
        fuera_de_taller'".addslashes($this->FueraTaller)."',
        WHERE id_estado_del_vehiculo = ".$paId."' ";
        return $this->EjecutarQuery( $Cadena );
      }
      public function Eliminar( $paId ) {
        $Cadena = "UPDATE estado_del_vehiculo SET estado = 'INACTIVO' WHERE id_estado_del_vehiculo =
        '".$paId."' ";
        return $this->EjecutarQuery( $Cadena );
      }
    }
    ?>