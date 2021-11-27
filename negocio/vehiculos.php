<?php
class Vehiculos extends Datos {
  //Atributos, corresponden a cada uno de los campos de la tabla de vehiculos
  public $id_cliente;
  public $id_marca;
  public $id_modelo;
  public $placa;
  public $tipo_vehiculo;
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
    clientes.apellidos_cliente AS ApellidoCliente,
    vehiculos.id_marca,
    marca_aut.nombre_marca AS NombreMarca,
    vehiculos.id_modelo,
    modelo_aut.nombre_modelo AS NombreModelo,
    vehiculos.placa,
    vehiculos.tipo_vehiculo,
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
    clientes.apellidos_cliente AS ApellidoCliente,
    vehiculos.id_marca,
    marca_aut.nombre_marca AS NombreMarca,
    vehiculos.id_modelo,
    modelo_aut.nombre_modelo AS NombreModelo,
    vehiculos.placa,
    vehiculos.tipo_vehiculo,
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
    vehiculos.id_cliente,
    clientes.nombre_cliente AS NombreCliente,
    clientes.apellidos_cliente AS ApellidoCliente,
    vehiculos.id_marca,
    marca_aut.nombre_marca AS NombreMarca,
    vehiculos.id_modelo,
    modelo_aut.nombre_modelo AS NombreModelo,
    vehiculos.placa,
    vehiculos.tipo_vehiculo,
    vehiculos.color_vehiculo,
    vehiculos.anio_vehiculo,
    vehiculos.vin_vehiculo,
    vehiculos.numero_motor_vehiculo,
    vehiculos.observaciones_vehiculo
    FROM vehiculos 
    INNER JOIN clientes ON vehiculos.id_cliente = clientes.id_cliente
    INNER JOIN marca_aut ON vehiculos.id_marca = marca_aut.id_marca
    INNER JOIN modelo_aut ON vehiculos.id_modelo = modelo_aut.id_modelo
    WHERE vehiculos.id_vehiculo = '".$paId."' ";
    return $this->EjecutarQuery( $Cadena );
    }
    public function Agregar() {
    $Cadena = "INSERT INTO vehiculos (
          id_cliente,
          id_marca,
          id_modelo,
          placa,
          tipo_vehiculo,
          color_vehiculo,
          anio_vehiculo,
          vin_vehiculo,
          numero_motor_vehiculo,
          observaciones_vehiculo,
          estado )
      VALUES (
        '".addslashes($this->id_cliente)."',
        '".addslashes($this->id_marca)."',
        '".addslashes($this->id_modelo)."',
        '".addslashes($this->placa)."',
        '".addslashes($this->tipo_vehiculo)."',
        '".addslashes($this->color_vehiculo)."',
        '".addslashes($this->anio_vehiculo)."',
        '".addslashes($this->vin_vehiculo)."',
        '".addslashes($this->numero_motor_vehiculo)."',
        '".addslashes($this->observaciones_vehiculo)."',
        'ACTIVO' )";
        return $this->EjecutarQuery( $Cadena );
      }
      public function Actualizar( $paId ) {
        $Cadena = "UPDATE vehiculos SET
        id_cliente = '".addslashes($this->id_cliente)."',
        id_marca = '".addslashes($this->id_marca)."',
        id_modelo = '".addslashes($this->id_modelo)."',
        placa = '".addslashes($this->placa)."',
        tipo_vehiculo = '".addslashes($this->tipo_vehiculo)."',
        color_vehiculo = '".addslashes($this->color_vehiculo)."',
        anio_vehiculo = '".addslashes($this->anio_vehiculo)."',
        vin_vehiculo = '".addslashes($this->vin_vehiculo)."',
        numero_motor_vehiculo = '".addslashes($this->numero_motor_vehiculo)."',
        observaciones_vehiculo = '".addslashes($this->observaciones_vehiculo)."',
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
        ORDER BY NombreCliente ASC";
        return $this->EjecutarQuery( $Cadena );
      }
    }
    ?>


    