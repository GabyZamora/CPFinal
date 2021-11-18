<?php
class Marcas_Articulos extends Datos {
  //Atributos, corresponden a cada uno de los campos de la tabla de clientes
  public $nombreMarca;
  public $fecIngreso_marca_art;
  public $fechModificacion_marca_art;


//Métodos
    public function ListarTodos( $paBuscar ) {
        $Cadena = "SELECT * FROM marca_art WHERE
        (nombreMarca LIKE '%".$paBuscar."%' OR nombreMarca LIKE '%".$paBuscar."%')";
        return $Cadena; 
    }

    public function CantTotalRegistros( $paBuscar ) {
        $Cadena = "SELECT COUNT(id_marca_art ) FROM marca_art  WHERE
        (nombreMarca LIKE '%".$paBuscar."%' OR nombreMarca LIKE '%".$paBuscar."%')";
        return mysqli_fetch_row($this->EjecutarQuery( $Cadena ));

    } //Retorna el número de filas que tiene la consulta

    public function ListarTodoReporte() {
        $Cadena = "SELECT * FROM marca_art  WHERE";
        return $this->EjecutarQuery( $Cadena );
    }
    public function BuscarPorId( $paId ) {
        $Cadena = "SELECT * FROM marca_art  WHERE id_marca_art  = '".$paid."' ";
        return $this->EjecutarQuery( $Cadena );
    }
        public function Agregar() {
        $Cadena = "INSERT INTO marca_art  (
                nombreMarca;
                fecIngreso_marca_art;
                fechModificacion_marca_art)
            VALUES (
        '".addslashes($this->NombreMarca)."',
        '".addslashes($this->Fecha_ingreso_Marca_de_articulos)."',
        '".addslashes($this->Fecha_modificacion_Marca_de_articulos)."'";
        return $this->EjecutarQuery( $Cadena );
    }
    public function Actualizar( $paId ) {
        $Cadena = "UPDATE marca_art SET
        nombreMarca = '".addslashes($this->NombreMarca)."',
        fecIngreso_marca_art = '".addslashes($this->Fecha_ingreso_Marca_de_articulos)."',
        fechModificacion_marca_art = '".addslashes($this->Fecha_modificacion_Marca_de_articulos)."'
        WHERE id_marca_art  = '".$paId."' ";
        return $this->EjecutarQuery( $Cadena );
    }
      public function Eliminar( $paId ) {
        $Cadena = "UPDATE marca_art SET Estado = 'S' WHERE id_marca_art  =
        '".$paId."' ";
        return $this->EjecutarQuery( $Cadena );
    }
 }
 ?>