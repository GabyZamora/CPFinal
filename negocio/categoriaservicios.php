<?php
class Categoria_Servicio extends datos {
  //Atributos, corresponden a cada uno de los campos de la tabla de clientes
  public $nombre_categoria;
  public $descripcion;

//Métodos
    public function ListarTodos( $paBuscar ) {
        $Cadena = "SELECT * FROM categorias_serv WHERE
        (nombre_categoria LIKE '%".$paBuscar."%') AND estado = 'ACTIVO' ";
        return $Cadena; 
    }

    public function CantTotalRegistros( $paBuscar ) {
        $Cadena = "SELECT COUNT(id_categoria ) FROM categorias_serv  WHERE
         (nombre_categoria LIKE '%".$paBuscar."%') AND estado = 'ACTIVO' ";
        return mysqli_fetch_row($this->EjecutarQuery( $Cadena ));

    } //Retorna el número de filas que tiene la consulta

    public function ListarTodoReporte() {
        $Cadena = "SELECT * FROM categorias_serv WHERE
        estado = 'ACTIVO'";
        return $this->EjecutarQuery( $Cadena );
    }
    public function BuscarPorId( $paId ) {
        $Cadena = "SELECT * FROM categorias_serv WHERE id_categoria = '".$paId."' ";
        return $this->EjecutarQuery( $Cadena );
        }

        public function Agregar() {
             $Cadena = "INSERT INTO categorias_serv (
                    nombre_categoria,
                    descripcion,
                    estado )
                 VALUES (
                 '".addslashes($this->Nombre)."',
                '".addslashes($this->Descripcion)."',
                'ACTIVO')";
            return $this->EjecutarQuery( $Cadena );
        }
    public function Actualizar( $paId ) {
        $Cadena = "UPDATE categorias_serv SET
        nombre_categoria  = '".addslashes($this->Nombre)."',
        descripcion= '".addslashes($this->Descripcion)."'
        WHERE id_categoria  = '".$paId."' ";
        return $this->EjecutarQuery( $Cadena );
    }
      public function Eliminar( $paId ) {
        $Cadena = "UPDATE categorias_serv SET estado = 'INACTIVO' WHERE id_categoria  =
        '".$paId."' ";
        return $this->EjecutarQuery( $Cadena );
    }
    public function ListarTodoCombos() {
        $Cadena = "SELECT * FROM categorias_serv
        WHERE
        estado = 'INACTIVO'
        ORDER BY nombre_categoria ASC";
        return $this->EjecutarQuery( $Cadena );
    }
 }
 ?>
