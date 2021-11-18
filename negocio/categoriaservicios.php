<?php
class Categoria_Servicio extends Datos {
  //Atributos, corresponden a cada uno de los campos de la tabla de clientes
  public $nombre_categoria;
  public $descripcion_catServ;
  public $fecIngreso_cateServ;
  public $fechModificacion_catServ;

//Métodos
    public function ListarTodos( $paBuscar ) {
        $Cadena = "SELECT * FROM categorias_serv WHERE
        (nombre_categoria LIKE '%".$paBuscar."%' OR nombre_categoria LIKE '%".$paBuscar."%')";
        return $Cadena; 
    }

    public function CantTotalRegistros( $paBuscar ) {
        $Cadena = "SELECT COUNT(id_categoria ) FROM categorias_serv  WHERE
        (nombre_categoria LIKE '%".$paBuscar."%' OR nombre_categoria LIKE '%".$paBuscar."%')";
        return mysqli_fetch_row($this->EjecutarQuery( $Cadena ));

    } //Retorna el número de filas que tiene la consulta

    public function ListarTodoReporte() {
        $Cadena = "SELECT * FROM categorias_serv WHERE";
        return $this->EjecutarQuery( $Cadena );
    }
    public function BuscarPorId( $paId ) {
        $Cadena = "SELECT * FROM categorias_serv  WHERE id_categoria = '".$paid."' ";
        return $this->EjecutarQuery( $Cadena );
    }
        public function Agregar() {
        $Cadena = "INSERT INTO categorias_serv (
                nombre_categoria;
                descripcion_catServ;
                fecIngreso_cateServ;
               fechModificacion_catServ)
            VALUES (
        '".addslashes($this->Nombre_de_Categoria)."',
        '".addslashes($this->Descripcion_de_Categoria)."',
        '".addslashes($this->Fecha_ingreso_de_categoria_de_articulos)."',
        '".addslashes($this->Fecha_modificacion_de_categoria_de_articulos)."'";
        return $this->EjecutarQuery( $Cadena );
    }
    public function Actualizar( $paId ) {
        $Cadena = "UPDATE categorias_serv SET
        nombre_categoria  = '".addslashes($this->Nombre_de_Categoria)."',
        descripcion_catServ = '".addslashes($this->NDescripcion_de_Categoria)."',
        fecIngreso_cateServ = '".addslashes($this->Fecha_ingreso_de_categoria_de_articulos)."',
        fechModificacion_catServ = '".addslashes($this->Fecha_modificacion_de_categoria_de_articulos)."'
        WHERE id_categoria  = '".$paId."' ";
        return $this->EjecutarQuery( $Cadena );
    }
      public function Eliminar( $paId ) {
        $Cadena = "UPDATE categorias_serv SET Estado = 'S' WHERE id_categoria  =
        '".$paId."' ";
        return $this->EjecutarQuery( $Cadena );
    }
 }
 ?>