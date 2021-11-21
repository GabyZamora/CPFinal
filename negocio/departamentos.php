<?php
	class Departamentos extends Datos {
		//Atributos
		public $NombreDepartamento;

		//Métodos
		public function ListarTodos( $paBuscar ) {
		$Cadena = "SELECT * FROM departamentos WHERE
		 (nombre_departamento LIKE '%".$paBuscar."%' OR Departamento LIKE
		'%".$paBuscar."%')";
		return $Cadena; 
		}

		 public function CantTotalRegistros( $paBuscar ) {
		$Cadena = "SELECT COUNT(id_departamento) FROM departamentos WHERE
		 (nombre_departamento LIKE '%".$paBuscar."%' OR Departamento LIKE
		'%".$paBuscar."%')";
		return mysqli_fetch_row($this->EjecutarQuery( $Cadena ));
		//Retorna el número de filas que tiene la consulta
		}

		public function BuscarPorId( $paId ) {
		$Cadena = "SELECT * FROM departamentos WHERE id_departamento =
		'".$paId."' ";
		return $this->EjecutarQuery( $Cadena );
		}

		public function Agregar() {
		$Cadena = "INSERT INTO departamentos (
		nombre_departamento)
		VALUES (
		'".addslashes($this->NombreDepartamento)."' ) ";
		return $this->EjecutarQuery( $Cadena );
		}

		public function Actualizar( $paId ) {
		$Cadena = "UPDATE departamentos SET
		nombre_departamento = '".addslashes($this->NombreDepartamento)."',
		WHERE id_departamento = '".$paId."' ";
		return $this->EjecutarQuery( $Cadena );
		}

		public function Eliminar( $paId ) {
		$Cadena = "UPDATE departamentos WHERE
		id_departamento = '".$paId."' ";
		return $this->EjecutarQuery( $Cadena );
		}

        public function ListarTodoCombos() {
            $Cadena = "SELECT * FROM departamentos
            ORDER BY nombre_departamento ASC";
            return $this->EjecutarQuery( $Cadena );
          }
    }
?>
