<?php
	class Servicios extends Datos {
		//Atributos
		public $NombreServicio;
		public $Detalles;
		public $NombreCategoria;
		public $FechaIngreso;
		public $FechaModificacion;
		public $id_categoria;

		//Métodos
		public function ListarTodos( $paBuscar ) {
		$Cadena = "SELECT
		servicios.nombre_servicio AS NombreServicio,
		servicios.detalles AS Detalles,
		servicios.id_categoria,
		categorias_serv.nombre_categoria AS NombreCategoria,
		servicios.estado 
		FROM servicios 
		INNER JOIN categorias_serv ON servicios.id_categoria = categorias_serv.id_categoria
		WHERE (servicios.nombre_servicio LIKE '%".$paBuscar."%')
		AND servicios.estado='N' ";
		return $Cadena; 
		}

		 public function CantTotalRegistros( $paBuscar ) {
		$Cadena = "SELECT COUNT(id_servicio) FROM servicios WHERE
		 nombre_servicio LIKE '%".$paBuscar."%' 
		 AND estado = 'N'";
		return mysqli_fetch_row($this->EjecutarQuery( $Cadena ));
		//Retorna el número de filas que tiene la consulta
		}

		public function BuscarPorId( $paId ) {
			$Cadena = "SELECT
			servicios.nombre_servicio AS NombreServicio,
			servicios.detalles AS Detalles,
			servicios.id_categoria,
			categorias_serv.nombre_categoria AS NombreCategoria,
			servicios.estado 
			FROM servicios 
			INNER JOIN categorias_serv ON servicios.id_categoria = categorias_serv.id_categoria WHERE id_servicio =
		'".$paId."' ";
		return $this->EjecutarQuery( $Cadena );
		}

		public function Agregar() {
		$Cadena = "INSERT INTO servicios (
		nombre_servicio,
		detalles,
		id_categoria,
		estado )
		VALUES (
		'".addslashes($this->NombreServicio)."',
		'".addslashes($this->Detalles)."',
		'".addslashes($this->NombreCategoria)."',
		'N' ) ";
		return $this->EjecutarQuery( $Cadena );
		}

		public function Actualizar( $paId ) {
		$Cadena = "UPDATE servicios SET
		nombre_servicio = '".addslashes($this->NombreServicio)."',
		detalles = '".addslashes($this->Detalles)."',
		WHERE id_usuario = '".$paId."'";
		return $this->EjecutarQuery( $Cadena );
		}

		public function Eliminar( $paId ) {
		$Cadena = "UPDATE servicios SET estado = 'S' WHERE
		id_usuario = '".$paId."' ";
		return $this->EjecutarQuery( $Cadena );
		}

		public function ListarTodoCombos() {
        $Cadena = "SELECT * FROM servicios
        WHERE
        estado = 'N'
        ORDER BY nombre_servicio ASC";
        return $this->EjecutarQuery( $Cadena );
    }
	}
?>
