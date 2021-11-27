<?php
class Municipios  extends Datos {
  //Atributos, corresponden a cada uno de los campos de la tabla de clientes
  public $id_departamento;
  public $id_municipio;
  public $nombre_municipio;
  public $nombre_departamento;
  public $codigo;


//Métodos
  public function ListarTodos( $paBuscar ) {
    $Cadena = "SELECT
    municipios.id_municipio,
    municipios.nombre_municipio AS Municipio,
    municipios.id_departamento,
    departamentos.nombre_departamento AS Departamento
    FROM departamentos
    INNER JOIN municipios ON municipios.id_departamento = departamentos.id_departamento
    WHERE (municipios.nombre_municipio LIKE '%".$paBuscar."%') ";
    return $Cadena; //Acá no se ejecuta la cadena, porque se hace en la clase del paginador
  }
  public function CantTotalRegistros( $paBuscar ) {
    $Cadena = "SELECT COUNT(id_municipio) FROM municipios
    INNER JOIN departamentos ON municipios.id_departamento = departamentos.id_departamento
    WHERE
    (municipios.id_municipio LIKE '%".$paBuscar."%') ";
    return mysqli_fetch_row($this->EjecutarQuery( $Cadena ));
  } //Retorna el número de filas que tiene la consulta

  public function ListarTodoCombos() {
    $Cadena = "SELECT * FROM municipios  
    ORDER BY nombre_municipio ASC";
    return $this->EjecutarQuery( $Cadena );
  }

  
  public function BuscarPorId( $paId ) {
    $Cadena = "SELECT
    municipios.id_municipio,
    municipios.nombre_municipio AS Municipio,
    municipios.id_departamento,
    departamentos.nombre_departamento AS Departamento
    FROM departamentos
    INNER JOIN municipios ON municipios.id_departamento = departamentos.id_departamento
    WHERE
    municipios.id_municipio = '".$paId."' ";
    return $this->EjecutarQuery( $Cadena );
    }
}
 ?>