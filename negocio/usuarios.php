<?php
	class Usuarios extends Datos {
		//Atributos
		public $NombreCompleto;
		public $Usuario;
		public $Password;
		 public $TipoCuenta;

		//Métodos
		public function ListarTodos( $paBuscar ) {
		$Cadena = "SELECT * FROM usuarios WHERE
		 (nombre_usuario LIKE '%".$paBuscar."%' OR Usuario LIKE
		'%".$paBuscar."%')
		 AND Estado = '1'";
		return $Cadena; 
		}

		 public function CantTotalRegistros( $paBuscar ) {
		$Cadena = "SELECT COUNT(id_usuario) FROM usuarios WHERE
		 (nombre_usuario LIKE '%".$paBuscar."%' OR Usuario LIKE
		'%".$paBuscar."%')
		 AND estado = '1'";
		return mysqli_fetch_row($this->EjecutarQuery( $Cadena ));
		//Retorna el número de filas que tiene la consulta
		}

		public function BuscarPorId( $paId ) {
		$Cadena = "SELECT * FROM usuarios WHERE id_usuario =
		'".$paId."' ";
		return $this->EjecutarQuery( $Cadena );
		}

		public function Agregar() {
		$Cadena = "INSERT INTO usuarios (
		nombre_usuario,
		Usuario,
		Password,
		Estado )
		VALUES (
		'".addslashes($this->NombreUsuario)."',
		'".addslashes($this->Usuario)."',
		'".addslashes(md5($this->Password))."',
		'1' ) ";
		return $this->EjecutarQuery( $Cadena );
		}

		public function Actualizar( $paId ) {
		$Cadena = "UPDATE usuarios SET
		nombre_usuario = '".addslashes($this->NombreUsuario)."',
		WHERE id_usuario = '".$paId."' ";
		return $this->EjecutarQuery( $Cadena );
		}

		 public function ReestablecerPassword( $paId ) {
		$Cadena = "UPDATE usuarios SET
		Password = '".addslashes(md5('admin'))."'
		WHERE id_usuario = '".$paId."' ";
		return $this->EjecutarQuery( $Cadena );
		}

		public function Eliminar( $paId ) {
		$Cadena = "UPDATE usuarios SET Estado = '0' WHERE
		id_usuario = '".$paId."' ";
		return $this->EjecutarQuery( $Cadena );
		}

		 public function ValidarLogin( $paUsua, $paPass ) {
		$Cadena = "SELECT * FROM usuarios WHERE Usuario =
		'".$paUsua."' AND Password = '".$paPass."' ";
		return $this->EjecutarQuery( $Cadena );
		}
		
		 public function ObtenerPasswordActual( $paIdUsua ) {
		$Cadena = "SELECT * FROM usuarios WHERE id_usuario =
		'".$paIdUsua."' ";
		return $this->EjecutarQuery( $Cadena );
		}
		 public function CambiarPassword( $paId ) {
		$Cadena = "UPDATE usuarios SET
		Password = '".addslashes(md5($this->Password))."'
		WHERE id_usuario = '".$paId."' ";
		return $this->EjecutarQuery( $Cadena );
		}
	}
?>
