<?php
class Marcas_Articulos extends Datos {
  //Atributos, corresponden a cada uno de los campos de la tabla de clientes
  public $nombreMarca;
  public $estado;

//Métodos
    public function ListarTodos( $paBuscar ) {
        $Cadena = "SELECT * FROM marca_art WHERE
        (nombreMarca LIKE '%".$paBuscar."%' OR nombreMarca LIKE '%".$paBuscar."%') AND estado = 'ACTIVO'";
        return $Cadena; 
    }

    public function CantTotalRegistros( $paBuscar ) {
        $Cadena = "SELECT COUNT(id_marca_art ) FROM marca_art  WHERE
        (nombreMarca LIKE '%".$paBuscar."%' OR nombreMarca LIKE '%".$paBuscar."%') AND estado = 'ACTIVO'";
        return mysqli_fetch_row($this->EjecutarQuery( $Cadena ));

    } //Retorna el número de filas que tiene la consulta

    public function ListarTodoReporte() {
        $Cadena = "SELECT * FROM marca_art WHERE estado = 'ACTIVO'";
        return $this->EjecutarQuery( $Cadena );
    }
    public function BuscarPorId( $paId ) {
        $Cadena = "SELECT * FROM marca_art  WHERE id_marca_art  = '".$paid."' ";
        return $this->EjecutarQuery( $Cadena );
    }
        public function Agregar() {
        $Cadena = "INSERT INTO marca_art (
                nombreMarca,
                estado )
            VALUES (
        '".addslashes($this->nombreMarca)."',
        'ACTIVO')";
        return $this->EjecutarQuery( $Cadena );
    }
    public function Actualizar( $paId ) {
        $Cadena = "UPDATE marca_art SET
        nombreMarca = '".addslashes($this->NombreMarca)."',
        estado = '".addslashes($this->estado)."'
        WHERE id_marca_art  = '".$paId."' ";
        return $this->EjecutarQuery( $Cadena );
    }
      public function Eliminar( $paId ) {
        $Cadena = "UPDATE marca_art SET Estado = 'INACTIVO' WHERE id_marca_art  =
        '".$paId."' ";
        return $this->EjecutarQuery( $Cadena );
    }

    public function ListarTodoCombos() {
        $Cadena = "SELECT * FROM marca_art
        WHERE
        estado = 'ACTIVO'
        ORDER BY nombreMarca ASC";
        return $this->EjecutarQuery( $Cadena );
    }
 }
 ?>