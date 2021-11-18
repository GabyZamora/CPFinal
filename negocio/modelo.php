<?php
class Modelo extends Datos {
  //Atributos, corresponden a cada uno de los campos de la tabla de clientes
  public $nombre_modelo;
  public $id_marca;
  
  //Métodos
  public function ListarTodos( $paBuscar ) {
    $Cadena = "SELECT
    modelo_aut.id_modelo,
    modelo_aut.nombre_modelo AS NombreModelo,
    modelo_aut.id_marca,
    marca_aut.nombre_marca AS NombreMarca
    FROM modelo_aut
    INNER JOIN marca_aut ON modelo_aut.id_marca = marca_aut.id_marca
    WHERE (modelo_aut.nombre_modelo LIKE '%".$paBuscar."%')
    AND modelo_aut.estado='1' ";
    return $Cadena; //Acá no se ejecuta la cadena, porque se hace en la clase del paginador
  }
  public function CantTotalRegistros( $paBuscar ) {
    $Cadena = "SELECT COUNT(id_modelo) FROM modelo_aut
    INNER JOIN marca_aut ON modelo_aut.id_marca = marca_aut.id_marca 
    WHERE
    (modelo_aut.nombre_modelo LIKE '%".$paBuscar."%')
    AND modelo_aut.estado = '1' ";
    return mysqli_fetch_row($this->EjecutarQuery( $Cadena ));
  } //Retorna el número de filas que tiene la consulta

  public function ListarTodoReporte() {
    $Cadena = "SELECT
    modelo_aut.id_modelo,
    modelo_aut.nombre_modelo AS NombreModelo,
    modelo_aut.id_marca,
    marca_aut.nombre_marca AS NombreMarca
    FROM modelo_aut
    INNER JOIN marca_aut ON modelo_aut.id_marca = marca_aut.id_marca
    WHERE modelo_aut.estado = '1' ";
    return $this->EjecutarQuery( $Cadena );
  }
  public function BuscarPorId( $paId ) {
    $Cadena = "SELECT
    modelo_aut.id_modelo,
    modelo_aut.nombre_modelo AS NombreModelo,
    modelo_aut.id_marca,
    marca_aut.nombre_marca AS NombreMarca
    FROM modelo_aut
    INNER JOIN marca_aut ON modelo_aut.id_marca = marca_aut.id_marca
    WHERE
    modelo_aut.modelo_id = '".$paId."' ";
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