<?php
class Marcas_Autos extends Datos {
  //Atributos, corresponden a cada uno de los campos de la tabla de clientes
  public $nombreMarca;
  public $Estado;  
//Métodos
    public function ListarTodos( $paBuscar ) {
        $Cadena = "SELECT * FROM marca_aut WHERE
        (nombre_marca LIKE '%".$paBuscar."%') AND estado = 'ACTIVO'";
        return $Cadena; 
    }

    public function CantTotalRegistros( $paBuscar ) {
        $Cadena = "SELECT COUNT(id_marca) FROM marca_aut  WHERE
        (nombre_marca LIKE '%".$paBuscar."%' OR nombre_marca LIKE '%".$paBuscar."%') AND estado = 'ACTIVO'";
        return mysqli_fetch_row($this->EjecutarQuery( $Cadena ));

    } //Retorna el número de filas que tiene la consulta

    public function ListarTodoReporte() {
        $Cadena = "SELECT * FROM marca_aut  WHERE estado = 'ACTIVO'";
        return $this->EjecutarQuery( $Cadena );
    }
    public function BuscarPorId( $paId ) {
        $Cadena = "SELECT * FROM marca_aut WHERE id_marca  = '".$paid."' ";
        return $this->EjecutarQuery( $Cadena );
    }
        public function Agregar() {
        $Cadena = "INSERT INTO marca_aut  (
                nombre_marca;
                estado)
            VALUES (
        '".addslashes($this->NombreMarca)."',
        '".addslashes($this->Estado)."'";
        return $this->EjecutarQuery( $Cadena );
    }
    public function Actualizar( $paId ) {
        $Cadena = "UPDATE marca_aut SET
        nombre_marca = '".addslashes($this->NombreMarca)."',
        estado = '".addslashes($this->Estado)."'
        WHERE id_marca  = '".$paId."' ";
        return $this->EjecutarQuery( $Cadena );
    }
    public function Eliminar( $paId ) {
        $Cadena = "UPDATE marca_aut SET Estado = 'ACTIVO' WHERE id_marca  =
        '".$paId."' ";
        return $this->EjecutarQuery( $Cadena );
    }
}
?>