<?php
class Vehiculos extends Datos {
  //Atributos, corresponden a cada uno de los campos de la tabla de vehiculos
  public $id_cliente;
  public $id_marca;
  public $id_modelo;
  public $placa;
  public $tipo_vehiculo;
  public $estado_del_vehiculo;
  public $color_vehiculo;
  public $anio_vehiculo;
  public $vin_vehiculo;
  public $numero_motor_vehiculo;
  public $observaciones_vehiculo;



  //Métodos
  public function ListarTodos( $paBuscar ) {
    $Cadena = "SELECT 
    vehiculos.id_cliente,
    clientes.nombre_cliente AS NombreCliente,
    vehiculos.id_marca,
    marca_aut.nombre_marca AS NombreMarca,
    vehiculos.id_modelo,
    modelo_aut.nombre_modelo AS NombreModelo,
    vehiculos.placa,
    vehiculos.tipo_vehiculo,
    vehiculos.estado_del_vehiculo,
    vehiculos.color_vehiculo,
    vehiculos.anio_vehiculo,
    vehiculos.vin_vehiculo,
    vehiculos.numero_motor_vehiculo,
    vehiculos.observaciones_vehiculo
    FROM vehiculos 
    INNER JOIN clientes ON vehiculos.id_cliente = clientes.id_cliente
    INNER JOIN marca_aut ON vehiculos.id_marca = marca_aut.id_marca
    INNER JOIN modelo_aut ON vehiculos.id_modelo = modelo_aut.id_modelo
    WHERE
    (vehiculos.placa LIKE '%".$paBuscar."%')
    AND vehiculos.estado = 'ACTIVO'";
    return $Cadena; //Acá no se ejecuta la cadena, porque se hace en la clase del paginador
  }
  public function CantTotalRegistros( $paBuscar ) {
    $Cadena = "SELECT COUNT(id_vehiculo) FROM vehiculos 
    INNER JOIN clientes ON vehiculos.id_cliente = clientes.id_cliente
    INNER JOIN marca_aut ON vehiculos.id_marca = marca_aut.id_marca
    INNER JOIN modelo_aut ON vehiculos.id_modelo = modelo_aut.id_modelo
    WHERE
    (placa LIKE '%".$paBuscar."%')
    AND vehiculos.estado = 'ACTIVO'";
    return mysqli_fetch_row($this->EjecutarQuery( $Cadena ));
  } //Retorna el número de filas que tiene la consulta

  public function ListarTodoReporte() {
    $Cadena = "SELECT     
    vehiculos.id_cliente,
    clientes.nombre_cliente AS NombreCliente,
    vehiculos.id_marca,
    marca_aut.nombre_marca AS NombreMarca,
    vehiculos.id_modelo,
    modelo_aut.nombre_modelo AS NombreModelo,
    vehiculos.placa,
    vehiculos.tipo_vehiculo,
    vehiculos.estado_del_vehiculo,
    vehiculos.color_vehiculo,
    vehiculos.anio_vehiculo,
    vehiculos.vin_vehiculo,
    vehiculos.numero_motor_vehiculo,
    vehiculos.observaciones_vehiculo
    FROM vehiculos 
    INNER JOIN clientes ON vehiculos.id_cliente = clientes.id_cliente
    INNER JOIN marca_aut ON vehiculos.id_marca = marca_aut.id_marca
    INNER JOIN modelo_aut ON vehiculos.id_modelo = modelo_aut.id_modelo 
    WHERE
    vehiculos.estado = 'ACTIVO'";
    return $this->EjecutarQuery( $Cadena );
  }
  public function BuscarPorId( $paId ) {
    $Cadena = "SELECT 
    vehiculos.id_vehiculo,
    vehiculos.id_cliente,
    clientes.nombre_cliente AS NombreCliente,
    vehiculos.id_marca,
    marca_aut.nombre_marca AS NombreMarca,
    vehiculos.id_modelo,
    modelo_aut.nombre_modelo AS NombreModelo,
    vehiculos.placa,
    vehiculos.tipo_vehiculo,
    vehiculos.estado_del_vehiculo,
    vehiculos.color_vehiculo,
    vehiculos.anio_vehiculo,
    vehiculos.vin_vehiculo,
    vehiculos.numero_motor_vehiculo,
    vehiculos.observaciones_vehiculo
    FROM vehiculos 
    INNER JOIN clientes ON vehiculos.id_cliente = clientes.id_cliente
    INNER JOIN marca_aut ON vehiculos.id_marca = marca_aut.id_marca
    INNER JOIN modelo_aut ON vehiculos.id_modelo = modelo_aut.id_modelo
    WHERE
    vehiculos.id_vehiculo = '".$paId."' ";
    return $this->EjecutarQuery( $Cadena );
    }
    public function Agregar() {
    $Cadena = "INSERT INTO vehiculos (
          id_cliente,
          id_marca,
          id_modelo,
          placa,
          tipo_vehiculo,
          estado_del_vehiculo,
          color_vehiculo,
          anio_vehiculo,
          vin_vehiculo,
          numero_motor_vehiculo,
          observaciones_vehiculo,
          estado )
      VALUES (
        '".addslashes($this->Cliente)."',
        '".addslashes($this->Marca)."',
        '".addslashes($this->Modelo)."',
        '".addslashes($this->Placa)."',
        '".addslashes($this->TipoVehiculo)."',
        '".addslashes($this->EstadoVehiculo)."',
        '".addslashes($this->ColorVehiculo)."',
        '".addslashes($this->AnioVehiculo)."',
        '".addslashes($this->VinVehiculo)."',
        '".addslashes($this->NumeroMotor)."',
        '".addslashes($this->Observaciones)."',
        'ACTIVO')";
        return $this->EjecutarQuery( $Cadena );
      }
      public function Actualizar( $paId ) {
        $Cadena = "UPDATE vehiculos SET
        id_cliente = '".addslashes($this->Cliente)."',
        id_marca = '".addslashes($this->Marca)."',
        id_modelo = '".addslashes($this->Modelo)."',
        placa = '".addslashes($this->Placa)."',
        tipo_vehiculo = '".addslashes($this->TipoVehiculo)."',
        estado_del_vehiculo = '".addslashes($this->EstadoVehiculo)."',
        color_vehiculo = '".addslashes($this->ColorVehiculo)."',
        anio_vehiculo = '".addslashes($this->AnioVehiculo)."',
        vin_vehiculo = '".addslashes($this->VinVehiculo)."',
        numero_motor_vehiculo = '".addslashes($this->NumeroMotor)."',
        observaciones_vehiculo = '".addslashes($this->Observaciones)."',
        WHERE id_vehiculo".$paId."' ";
        return $this->EjecutarQuery( $Cadena );
      }
      public function Eliminar( $paId ) {
        $Cadena = "UPDATE vehiculos SET estado = 'INACTIVO' WHERE id_vehiculo =
        '".$paId."' ";
        return $this->EjecutarQuery( $Cadena );
      }
      public function ListarTodoCombos() {
        $Cadena = "SELECT * FROM vehiculos
        WHERE
        estado = 'ACTIVO'
        ORDER BY placa ASC";
        return $this->EjecutarQuery( $Cadena );
      }
    }
    ?>


    