<?php
class Departamentos extends Datos {
  //Atributos, corresponden a cada uno de los campos de la tabla de clientes
  public $id_departamento;
  public $nombre_departamento;
  public $codigo;


//Métodos
    public function ListarTodos( $paBuscar ) {
        $Cadena = "SELECT * FROM departamentos WHERE
        (nombre_departamento LIKE '%".$paBuscar."%' OR codigoLIKE '%".$paBuscar."%')";
        return $Cadena; 
    }

    public function CantTotalRegistros( $paBuscar ) {
        $Cadena = "SELECT COUNT(id_departamento) FROM departamentos  WHERE
        (nombre_departamento LIKE '%".$paBuscar."%' OR codigo LIKE '%".$paBuscar."%')";
        return mysqli_fetch_row($this->EjecutarQuery( $Cadena ));

    } //Retorna el número de filas que tiene la consulta

    public function ListarTodoReporte() {
        $Cadena = "SELECT * FROM departamentos  WHERE";
        return $this->EjecutarQuery( $Cadena );
    }
    public function BuscarPorId( $paId ) {
        $Cadena = "SELECT * FROM departamentos  WHERE id_departamento  = '".$paid."' ";
        return $this->EjecutarQuery( $Cadena );
    }

     public function ListarTodoCombos() {
    $Cadena = "SELECT * FROM departamentos";
    return $this->EjecutarQuery( $Cadena );
  }
       
 }
 ?>