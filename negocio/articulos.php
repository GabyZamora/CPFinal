<?php
	class Articulos extends datos {
		//Atributos
		public $nombre_articulo;
		public $id_categoria_art;
		public $id_proveedor;
		public $id_marca_art;
		public $descripcion;
		public $fechaIngreso_articulo;
		public $fechaModificacion_articulo;
		public $estado;

		//Métodos
		public function ListarTodos( $paBuscar ) {
		$Cadena = "SELECT
		articulos.id_articulo,
		articulos.nombre_articulo AS NombreArticulo,
		articulos.id_categoria_art,
		categoria_art.nombre_categoria_art AS NombreCategoriaArticulos,
		articulos.id_proveedor,
		proveedores.nombre_comercial_proveedor AS NombreProveedor,
		articulos.id_marca_art,
		marca_art.nombreMarca AS NombreMarcaArticulos,
		articulos.estado 
		FROM 
		articulos 
		INNER JOIN categoria_art ON articulos.id_categoria_art = categoria_art.id_categoria_art
		INNER JOIN proveedores ON articulos.id_proveedor = proveedores.id_proveedor
		INNER JOIN marca_art ON articulos.id_marca_art = marca_art.id_marca_art
		WHERE (articulos.id_articulo LIKE '%".$paBuscar."%')
		AND articulos.estado='ACTIVO' ";
		return $Cadena; 
		}

		 public function CantTotalRegistros( $paBuscar ) {
		$Cadena = "SELECT COUNT(id_articulo) FROM articulos WHERE
		 nombre_articulo LIKE '%".$paBuscar."%' 
		 AND estado = 'ACTIVO'";
		return mysqli_fetch_row($this->EjecutarQuery( $Cadena ));
		//Retorna el número de filas que tiene la consulta
		}

		public function BuscarPorId( $paId ) {
		$Cadena = "SELECT * FROM articulos WHERE id_articulo =
		'".$paId."' ";
		return $this->EjecutarQuery( $Cadena );
		}

		public function Agregar() {
		$Cadena = "INSERT INTO articulos (
		nombre_articulo,
		id_categoria_art,
		id_proveedor,
		id_marca_art,
		descripcion,
		estado )
		VALUES (
		'".addslashes($this->NombreArticulo)."',
		'".addslashes($this->NombreCategoriaArticulos)."',
		'".addslashes($this->NombreProveedor)."',
		'".addslashes($this->NombreMarcaArt)."',
		'".addslashes($this->Descripcion)."',
		'ACTIVO' ) ";
		return $this->EjecutarQuery( $Cadena );
		}

		public function Actualizar( $paId ) {
		$Cadena = "UPDATE articulos SET
		nombre_articulo = '".addslashes($this->NombreArticulo)."',
		descripcion = '".addslashes($this->Descripcion)."',
		WHERE id_articulo = '".$paId."' ";
		return $this->EjecutarQuery( $Cadena );
		}

		public function Eliminar( $paId ) {
		$Cadena = "UPDATE articulos SET estado = 'INACTIVO' WHERE
		id_articulos = '".$paId."' ";
		return $this->EjecutarQuery( $Cadena );
		}

		public function ListarTodoCombos() {
        $Cadena = "SELECT * FROM articulos
        WHERE
        estado = 'ACTIVO'
        ORDER BY nombre_articulo ASC";
        return $this->EjecutarQuery( $Cadena );
    }
	}
?>
