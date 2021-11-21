<?php
class Municipios extends Datos {
  //Atributos, corresponden a cada uno de los campos de la tabla de clientes
  public $nombre_municipio;
  public $id_departamento;

  //Métodos
  public function ListarMunicipios( $paBuscar ) {
    $Cadena = "SELECT
    municipios.nombre_municipio AS NombreMunicipio,
    municipios.id_departamento,
    departamentos.nombre_departamento AS NombreDepartamento
    FROM municipios
    INNER JOIN departamentos ON municipios.id_departamento = departamentos.id_departamentos
    WHERE (municipios.nombre_municipios LIKE '%".$paBuscar."%')";
    return $Cadena; //Acá no se ejecuta la cadena, porque se hace en la clase del paginador
  }

  public function ListarMuni( $paBuscar ) {
    $Cadena = "SELECT
    municipios.nombre_municipio FROM municipios 
    INNER JOIN departamentos ON municipios.id_departamento = departamentos.id_departamentos
    WHERE departamentos.id_departamento= '".$paId."' ";
    return $this->EjecutarQuery( $Cadena ); //Acá no se ejecuta la cadena, porque se hace en la clase del paginador
  }

  public function CantTotalRegistros( $paBuscar ) {
    $Cadena = "SELECT COUNT(id_municipio) FROM municipios
    INNER JOIN departamentos ON municipios.id_departamento = departamentos.id_departamento 
    WHERE
    (municipios.nombre_municipio LIKE '%".$paBuscar."%') ";
    return mysqli_fetch_row($this->EjecutarQuery( $Cadena ));
  } //Retorna el número de filas que tiene la consulta

  public function ListarTodoReporte() {
    $Cadena = "SELECT
    municipios.id_municipio,
    municipios.nombre_municipio AS NombreMunicipio,
    municipios.id_departamento,
    departamentos.nombre_departamento AS NombreDepartamento
    FROM municipios
    INNER JOIN departamentos ON municipios.id_departamento = departamentos.id_departamento ";
    return $this->EjecutarQuery( $Cadena );
  }
  public function BuscarPorId( $paId ) {
    $Cadena = "SELECT
    municipios.id_municipio,
    municipios.nombre_municipio AS NombreMunicipio,
    municipios.id_departamento,
    departamentos.nombre_marca AS NombreDepartamento
    FROM municipios
    INNER JOIN departamentos ON municipios.id_departamento = departamentos.id_departamento
    WHERE
    municipios.id_municipio = '".$paId."' ";
    return $this->EjecutarQuery( $Cadena );
    }
    public function Agregar() {
    $Cadena = "INSERT INTO municipios (
          nombre_municipio,
          id_departamento )
      VALUES (
        '".addslashes($this->Municipio)."',
        '".addslashes($this->Departamento)."' )";
        return $this->EjecutarQuery( $Cadena );
      }
      public function Actualizar( $paId ) {
        $Cadena = "UPDATE municipios SET
        nombre_municipio = '".addslashes($this->Municipio)."',
        id_departamento = '".addslashes($this->Departamento)."',
        WHERE id_municipio".$paId."' ";
        return $this->EjecutarQuery( $Cadena );
      }
      public function Eliminar( $paId ) {
        $Cadena = "UPDATE municipios WHERE id_municipio =
        '".$paId."' ";
        return $this->EjecutarQuery( $Cadena );
      }

      public function ListarTodoCombos() {
        $Cadena = "SELECT * FROM municipios
        ORDER BY nombre_municipio ASC";
        return $this->EjecutarQuery( $Cadena );
      }
    }
    ?>