<?php
class Cat_Articulo extends Datos {
  //Atributos, corresponden a cada uno de los campos de la tabla de clientes
  public $nombre_categoria_art;
  public $descripcion_categoria_art;


  //Métodos
  public function ListarTodos( $paBuscar ) {
    $Cadena = "SELECT * FROM categoria_art WHERE
    (nombre_categoria_art LIKE '%".$paBuscar."%' ) 
      AND estado= 'ACTIVO' ";
    return $Cadena; //Acá no se ejecuta la cadena, porque se hace en la clase del paginador
  }
  public function CantTotalRegistros( $paBuscar ) {
    $Cadena = "SELECT COUNT(id_categoria_art) FROM categoria_art WHERE
    (nombre_categoria_art LIKE '%".$paBuscar."%' )
    AND estado= 'ACTIVO' ";
    return mysqli_fetch_row($this->EjecutarQuery( $Cadena ));
  } //Retorna el número de filas que tiene la consulta

  public function ListarTodoReporte() {
    $Cadena = "SELECT * FROM categoria_art ";
    return $this->EjecutarQuery( $Cadena );
  }
  public function BuscarPorId( $paId ) {
    $Cadena = "SELECT * FROM categoria_art WHERE id_categoria_art = '".$paId."' ";
    return $this->EjecutarQuery( $Cadena );
    }
    public function Agregar() {
    $Cadena = "INSERT INTO categoria_art (
          nombre_categoria_art,
          descripcion_categoria_art,
          estado)
      VALUES (
        '".addslashes($this->Nombre)."',
        '".addslashes($this->Descripcion)."',
        'ACTIVO' )";
        return $this->EjecutarQuery( $Cadena );
      }
      public function Actualizar( $paId ) {
        $Cadena = "UPDATE categoria_art SET
        nombre_categoria_art = '".addslashes($this->Nombre)."',
        descripcion_categoria_art = '".addslashes($this->Descripcion)."'
        WHERE id_categoria_art  = '".$paId."' ";
        return $this->EjecutarQuery( $Cadena );
      }
      public function Eliminar( $paId ) {
        $Cadena = "UPDATE categoria_art SET estado = 'INACTIVO' WHERE id_categoria_art = '".$paId."' ";
        return $this->EjecutarQuery( $Cadena );
      }
    }
    ?>


    