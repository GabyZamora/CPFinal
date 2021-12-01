<?php
class Clientes extends Datos {
  //Atributos, corresponden a cada uno de los campos de la tabla de clientes
  public $nombre_cliente;
  public $direccion_cliente;
  public $id_departamento;
  public $id_municipio;
  public $telefono_cliente;
  public $correo_cliente;
  public $nombre_factura;
  public $nit_cliente;
  public $nrc_cliente;
  public $giro_nrc;

  //Métodos
   public function ListarTodos( $paBuscar ) {
    $Cadena = "SELECT
    clientes.id_cliente,
    clientes.nombre_cliente AS NombreCliente,
    clientes.direccion_cliente AS Direccion,
    clientes.id_departamento,
    departamentos.nombre_departamento AS Departamento,
    clientes.id_municipio,
    municipios.nombre_municipio AS Municipio,
    clientes.telefono_cliente,
    clientes.correo_cliente,
    clientes.nombre_factura,
    clientes.nit_cliente,
    clientes.nrc_cliente,
    clientes.giro_nrc
    FROM
    clientes
    INNER JOIN departamentos ON clientes.id_departamento = departamentos.id_departamento
    INNER JOIN municipios ON clientes.id_municipio =
    municipios.id_municipio
    WHERE
    (clientes.id_cliente LIKE '%".$paBuscar."%') ";
    return $Cadena; //Acá no se ejecuta la cadena, porque se hace en la clase del paginador
  }
  public function CantTotalRegistros( $paBuscar ) {
    $Cadena = "SELECT COUNT(id_cliente)
    FROM
    clientes
    INNER JOIN departamentos ON clientes.id_departamento = departamentos.id_departamento
    INNER JOIN municipios ON clientes.id_municipio =
    municipios.id_municipio
    WHERE
    (clientes.id_cliente LIKE '%".$paBuscar."%') ";
    return mysqli_fetch_row($this->EjecutarQuery( $Cadena ));
  }
  
  public function ListarTodoReporte() {
    $Cadena = "SELECT
    clientes.id_cliente,
    clientes.nombre_cliente AS NombreCliente,
    clientes.direccion_cliente,
    clientes.id_departamento,
    departamentos.nombre_departamento AS Departamento,
    clientes.id_municipio,
    municipios.nombre_municipio AS Municipio,
    clientes.telefono_cliente,
    clientes.nombre_factura,
    clientes.nit_cliente,
    clientes.nrc_cliente,
    clientes.giro_nrc
    FROM
    clientes
    INNER JOIN departamentos ON clientes.id_departamento = departamentos.id_departamento
    INNER JOIN municipios ON clientes.id_municipio =
    municipios.id_municipio
    WHERE
    clientes.id_cliente=' ' ";
    return $this->EjecutarQuery( $Cadena );
  }
  public function BuscarPorId( $paId ) {
    $Cadena = "SELECT
    clientes.id_cliente,
    clientes.nombre_cliente AS NombreCliente,
    clientes.direccion_cliente,
    clientes.id_departamento,
    departamentos.nombre_departamento AS Departamento,
    clientes.id_municipio,
    municipios.nombre_municipio AS Municipio,
    clientes.telefono_cliente,
    clientes.nombre_factura,
    clientes.nit_cliente,
    clientes.nrc_cliente,
    clientes.giro_nrc,
    clientes.fechaIngreso_cliente AS FechaIngreso,
    clientes.fechaModificacion_cliente AS FechaModificacion
    FROM
    clientes
    INNER JOIN departamentos ON clientes.id_departamento = departamentos.id_departamento
    INNER JOIN municipios ON clientes.id_municipio =
    municipios.id_municipio
    WHERE
    clientes.id_cliente='".$paId."' ";
    return $this->EjecutarQuery( $Cadena );
  }
    public function Agregar() {
    $Cadena = "INSERT INTO clientes (
          nombre_cliente,
          direccion_cliente,
          id_departamento,
          id_municipio,
          telefono_cliente,
          correo_cliente,
          nombre_factura,
          nit_cliente,
          nrc_cliente,
          giro_nrc,
          estado )
      VALUES (
        '".addslashes($this->Nombre)."',
        '".addslashes($this->Direccion)."',
        '".addslashes($this->Departamento)."',
        '".addslashes($this->Municipio)."',
        '".addslashes($this->Telefono)."',
        '".addslashes($this->Correo)."',
        '".addslashes($this->Factura)."',
        '".addslashes($this->NIT)."',
        '".addslashes($this->NRC)."',
        '".addslashes($this->GiroNrc)."',
        'ACTIVO' )";
        return $this->EjecutarQuery( $Cadena );
      }
      public function Actualizar( $paId ) {
        $Cadena = "UPDATE clientes SET
        nombre_cliente = '".addslashes($this->Nombre)."',
        direccion_cliente = '".addslashes($this->Direccion)."',
        id_departamento = '".addslashes($this->Departamento)."',
        id_municipio = '".addslashes($this->Municipio)."',
        telefono_cliente = '".addslashes($this->Telefono)."',
        correo_cliente = '".addslashes($this->Correo)."',
        nombre_factura = '".addslashes($this->Factura)."',
        nit_cliente = '".addslashes($this->NIT)."',
        nrc_cliente = '".addslashes($this->NRC)."',
        giro_nrc = '".addslashes($this->GiroNrc)."',
        WHERE id_cliente".$paId."' ";
        return $this->EjecutarQuery( $Cadena );
      }
      public function Eliminar( $paId ) {
        $Cadena = "UPDATE clientes SET estado = 'ACTIVO' WHERE id_cliente =
        '".$paId."' ";
        return $this->EjecutarQuery( $Cadena );
      }
      public function ListarTodoCombos() {
        $Cadena = "SELECT * FROM clientes
        WHERE
        estado = 'ACTIVO'
        ORDER BY nombre_cliente ASC";
        return $this->EjecutarQuery( $Cadena );
    }
  }
    ?>


    