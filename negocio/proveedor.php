<?php
class Proveedor extends datos {
  //Atributos, corresponden a cada uno de los campos de la tabla de proveedores
  public $nombre_comercial_proveedor;
  public $nombre_propietario_proveedor;
  public $giro_proveedor;
  public $DUI_proveedor;
  public $NIT_proveedor;
  public $direccion_proveedor;
  public $telefono1_proveedor;
  public $telefono2_proveedor;
  public $telefono3_proveedor;

  //Métodos

    public function ListarTodos( $paBuscar ) {
        $Cadena = "SELECT * FROM proveedores WHERE
        (nombre_comercial_proveedor LIKE '%".$paBuscar."%' OR direccion_proveedor LIKE '%".$paBuscar."%')
           AND estado = 'ACTIVO' ";
        return $Cadena; 
    }

    public function CantTotalRegistros( $paBuscar ) {
        $Cadena = "SELECT COUNT(id_proveedor) FROM proveedores WHERE
        (nombre_comercial_proveedor LIKE '%".$paBuscar."%' OR direccion_proveedor LIKE '%".$paBuscar."%')
           AND estado = 'ACTIVO' ";
        return mysqli_fetch_row($this->EjecutarQuery( $Cadena ));
    } //Retorna el número de filas que tiene la consulta

    public function ListarTodoReporte() {
        $Cadena = "SELECT * FROM proveedores WHERE
         estado = 'ACTIVO' ";
        return $this->EjecutarQuery( $Cadena );
    }
    public function BuscarPorId( $paId ) {
        $Cadena = "SELECT * FROM proveedores WHERE id_proveedor = '".$paId."' ";
        return $this->EjecutarQuery( $Cadena );
    }

    public function Agregar() {
        $Cadena = "INSERT INTO proveedores (
                nombre_comercial_proveedor,
                nombre_propietario_proveedor,
                giro_proveedor,
                DUI_proveedor,
                NIT_proveedor,
                direccion_proveedor,
                telefono1_proveedor,
                telefono2_proveedor,
                telefono3_proveedor,
                estado )
         VALUES (
            '".addslashes($this->NombreComercial)."',
            '".addslashes($this->NombreProveedor)."',
            '".addslashes($this->Giro)."',
            '".addslashes($this->DUI)."',
            '".addslashes($this->NIT)."',
            '".addslashes($this->Direccion)."',
            '".addslashes($this->Telefono1)."',
            '".addslashes($this->Telefono2)."',
            '".addslashes($this->Telefono3)."',
            'ACTIVO')";
         return $this->EjecutarQuery( $Cadena );
    }

    public function Actualizar( $paId ) {
        $Cadena = "UPDATE proveedores SET
        nombre_comercial_proveedor  = '".addslashes($this->NombreComercial)."',
        nombre_propietario_proveedor = '".addslashes($this->NombreProveedor)."',
        giro_proveedor = '".addslashes($this->Giro)."',
        DUI_proveedor = '".addslashes($this->DUI)."',
        NIT_proveedor = '".addslashes($this->NIT)."',
        direccion_proveedor = '".addslashes($this->Direccion)."',
        telefono1_proveedor = '".addslashes($this->Telefono1)."',
        telefono2_proveedor = '".addslashes($this->Telefono2)."',
        telefono3_proveedor = '".addslashes($this->Telefono3)."'
        WHERE id_proveedor = '".$paId."' ";
        return $this->EjecutarQuery( $Cadena );
    }
      public function Eliminar( $paId ) {
        $Cadena = "UPDATE proveedores SET estado = 'INACTIVO' WHERE id_proveedor =
        '".$paId."' ";
        return $this->EjecutarQuery( $Cadena );
    }
    public function ListarTodoCombos() {
        $Cadena = "SELECT * FROM proveedores
        WHERE
        estado = 'ACTIVO'
        ORDER BY nombre_comercial_proveedor ASC";
        return $this->EjecutarQuery( $Cadena );
    }
 }
 ?>
