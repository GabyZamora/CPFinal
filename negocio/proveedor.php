<?php
class Proveedor extends datos {
  //Atributos, corresponden a cada uno de los campos de la tabla de proveedores
  public $nombre_proveedor;
  public $apellido_proveedor;
  public $genero_proveedor;
  public $DUI_proveedor;
  public $NIT_proveedor;
  public $direccion_proveedor;
  public $telefono1_proveedor;
  public $telefono2_proveedor;
  public $telefono3_proveedor;
  public $fecIngreso_proveedores;
  public $fechModificacion_proveedores;
  public $Estado;

  //Métodos
    public function ListarTodos( $paBuscar ) {
        $Cadena = "SELECT * FROM proveedores WHERE
        (nombre_proveedor LIKE '%".$paBuscar."%' OR nombre_proveedor LIKE '%".$paBuscar."%')
        AND Estado = 'N'";
        return $Cadena; //Acá no se ejecuta la cadena, porque se hace en la clase del paginador
    }
    public function CantTotalRegistros( $paBuscar ) {
        $Cadena = "SELECT COUNT(id_proveedor) FROM proveedores WHERE
        (nombre_proveedor LIKE '%".$paBuscar."%' OR nombre_proveedor LIKE '%".$paBuscar."%')
        AND Estado = 'N'";
        return mysqli_fetch_row($this->EjecutarQuery( $Cadena ));
    } //Retorna el número de filas que tiene la consulta

    public function ListarTodoReporte() {
        $Cadena = "SELECT * FROM proveedores WHERE
        Estado = 'N'";
        return $this->EjecutarQuery( $Cadena );
    }
    public function BuscarPorId( $paId ) {
        $Cadena = "SELECT * FROM proveedores WHERE id_proveedor = '".$paId."' ";
        return $this->EjecutarQuery( $Cadena );
    }
        public function Agregar() {
        $Cadena = "INSERT INTO proveedores (
                nombre_proveedor;
                apellido_proveedor;
                genero_proveedor;
                DUI_proveedor;
                NIT_proveedor;
                direccion_proveedor;
                telefono1_proveedor;
                telefono2_proveedor;
                telefono3_proveedor;
                fecIngreso_proveedores;
                fechModificacion_proveedores;
                estado )
            VALUES (
     '".addslashes($this->Nombre)."',
        '".addslashes($this->Apellido)."',
        '".addslashes($this->Genero)."',
        '".addslashes($this->DUI)."',
        '".addslashes($this->NIT)."',
        '".addslashes($this->Direccion)."',
        '".addslashes($this->Telefono1)."',
        '".addslashes($this->Telefono2)."',
        '".addslashes($this->Telefono3)."',
        '".addslashes($this->Fecha_ingreso_proveedores)."',
        '".addslashes($this->Fecha_modificacion_proveedores)."',
        '".addslashes($this->Estado)."',
        'N' )";
        return $this->EjecutarQuery( $Cadena );
    }
    public function Actualizar( $paId ) {
        $Cadena = "UPDATE proveedores SET
        nombre_proveedor  = '".addslashes($this->Nombre)."',
        apellido_proveedor = '".addslashes($this->Apellido)."',
        genero_proveedor = '".addslashes($this->Genero)."',
        DUI_proveedor = '".addslashes($this->DUI)."',
        NIT_proveedor = '".addslashes($this->NIT)."',
        direccion_proveedor = '".addslashes($this->Direccion)."',
        telefono1_proveedor = '".addslashes($this->Telefono1)."',
        telefono2_proveedor = '".addslashes($this->Telefono2)."',
        telefono3_proveedor = '".addslashes($this->Telefono3)."',
        fecIngreso_proveedores= '".addslashes($this->Fecha_ingreso_proveedores)."',
        fechModificacion_proveedores = '".addslashes($this->Fecha_modificacion_proveedores)."',
        estado = '".addslashes($this->Estado)."'
        WHERE id_proveedor = '".$paId."' ";
        return $this->EjecutarQuery( $Cadena );
    }
      public function Eliminar( $paId ) {
        $Cadena = "UPDATE proveedores SET Estado = 'S' WHERE id_proveedor =
        '".$paId."' ";
        return $this->EjecutarQuery( $Cadena );
    }
 }
 ?>
