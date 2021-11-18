<?php
class Modelo extends Datos {
  //Atributos, corresponden a cada uno de los campos de la tabla de clientes
  public $nombre_modelo;
  public $id_marca;
  
  //Métodos
  public function ListarTodos( $paBuscar ) {
    $Cadena = "SELECT * FROM modelo_aut WHERE
    (nombre_modelo LIKE '%".$paBuscar."%')
    AND estado = '1'";
    return $Cadena; //Acá no se ejecuta la cadena, porque se hace en la clase del paginador
  }
  public function CantTotalRegistros( $paBuscar ) {
    $Cadena = "SELECT COUNT(id_modelo) FROM modelo_aut WHERE
    (nombre_modelo LIKE '%".$paBuscar."%')
    AND estado = '1'";
    return mysqli_fetch_row($this->EjecutarQuery( $Cadena ));
  } //Retorna el número de filas que tiene la consulta

  public function ListarTodoReporte() {
    $Cadena = "SELECT * FROM modelo_aut WHERE
    estado = '1'";
    return $this->EjecutarQuery( $Cadena );
  }
  public function BuscarPorId( $paId ) {
    $Cadena = "SELECT * FROM modelo_aut WHERE id_modelo = '".$paId."' ";
    return $this->EjecutarQuery( $Cadena );
    }
    public function Agregar() {
    $Cadena = "INSERT INTO modelo_aut (
          nombre_modelo,
          id_marca,
          estado )
      VALUES (
        '".addslashes($this->Modelo)."',
        '".addslashes($this->Marca)."',
        '1' )";
        return $this->EjecutarQuery( $Cadena );
      }
      public function Actualizar( $paId ) {
        $Cadena = "UPDATE modelo_aut SET
        nombre_modelo = '".addslashes($this->Modelo)."',
        id_marca = '".addslashes($this->Marca)."',
        WHERE id_modelo".$paId."' ";
        return $this->EjecutarQuery( $Cadena );
      }
      public function Eliminar( $paId ) {
        $Cadena = "UPDATE modelo_aut SET estado = '1' WHERE id_modelo =
        '".$paId."' ";
        return $this->EjecutarQuery( $Cadena );
      }
    }
    ?>