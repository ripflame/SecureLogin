<?php
/*
	Author: Amado Canté Cauich
	Email: amado.cante@uady.mx
	Fecha de Creación: Mayo 20 de 2012
	Modificado: Junio 13 de 2013
*/
	class SMBD{
		private $servidor, $base, $usuario, $contrasenia,$conexion;
		private $errorT,$errorDesc;
		private $resultados,$filasAfectadas,$filaResultado;
		private $numFilasResultado;
		
		public function __construct($server,$bd,$usr,$pass){
			$this->servidor = $server;
			$this->usuario = $usr;
			$this->base = $bd;
			$this->contrasenia = $pass;
		}
		
		public function conectar(){
			if(!isset($this->conexion)){
				$this->conexion = @mysql_pconnect($this->servidor,$this->usuario,$this->contrasenia);				
				if(!$this->conexion){
					$this->errorT="Error de conexión";
					$this->errorDesc="Imposible conectar al servidor.";
					return false;
				}else{					
					if(!@mysql_select_db($this->base,$this->conexion)){
						$this->errorT="Error de conexión";
						$this->errorDesc="Imposible conectar con la base de datos. Base de datos inexistente.";
						return false;
					}else{
						return true;
					}
				}
			}else{
				return true;
			}
		}
		
		public function query($query){
			$resultado = @mysql_query($query,$this->conexion);
			if(!$resultado){
				$this->errorT = "Error de ejecución de consulta";
				$this->errorDesc = "MYSQL ha dicho : ".mysql_error();
				return false;
			}else{
				$this->resultados = $resultado;
				$this->numFilasResultado = @mysql_num_rows($this->resultados);
				return true;
			}
		}
		
		public function insert($tabla,$campos,$valores){
			$consulta = "INSERT INTO ".$tabla." (".$campos.") VALUES (".$valores.")";
			$terminado = @mysql_query($consulta,$this->conexion);
			$this->filasAfectadas = @mysql_affected_rows($this->conexion);
			if(!$terminado){
				$this->errorT = "Error de ejecución de consulta";
				$this->errorDesc = "MYSQL ha dicho : ".mysql_error();
				return false;
			}else{
				return $terminado;
			}
		}
		
		public function insertAssoc($tabla,$datos){
			$campos = array();
			$valores = array();
			for($i=0;$i<count($datos);$i++){
				$par=each($datos);
				$campo=$par[0];
				$valor=$par[1];
				array_push($campos,$campo);
				array_push($valores,$valor);
			}
			$camposA=implode(",",$campos);
			$valoresA=implode(",",$valores);
			$correcto = $this->insert($tabla,$camposA,$valoresA);
			return $correcto;
		}
		
		public function select($campos,$fuente,$condicion){
			$consulta = "SELECT ".$campos." FROM ".$fuente;
			if($condicion!=""){
				$consulta=$consulta." WHERE ".$condicion;
			}
			return $this->query($consulta);
		}
		
		public function update($tabla,$valores,$condicion){
			$consulta = "UPDATE ".$tabla." SET ".$valores." WHERE ".$condicion;
			$terminado = @mysql_query($consulta,$this->conexion);
			$this->filasAfectadas = @mysql_affected_rows($this->conexion);
			if(!$terminado){
				$this->errorT = "Error de ejecución de consulta";
				$this->errorDesc = "MYSQL ha dicho : ".mysql_error();
				return false;
			}else{
				return $terminado;
			}
		}
		
		public function delete($tabla,$condicion){
			$consulta = "DELETE FROM ".$tabla." WHERE ".$condicion;
			$terminado = @mysql_query($consulta,$this->conexion);
			$this->filasAfectadas = @mysql_affected_rows($this->conexion);
			if(!$terminado){
				$this->errorT = "Error de ejecución de consulta";
				$this->errorDesc = "MYSQL ha dicho : ".mysql_error();
				return false;
			}else{
				return $terminado;
			}
		}
		
		public function querySingleRow($query){
			$resultado = @mysql_query($query,$this->conexion);
			if(!$resultado){
				$this->errorT = "Error de ejecución de consulta";
				$this->errorDesc = "MYSQL ha dicho : ".mysql_error();
				return false;
			}else{
				$this->resultados = $resultado;
				$this->numFilasResultado = @mysql_num_rows($this->resultados);
				$this->filaResultado = @mysql_fetch_array($this->resultados);
				return ($this->filaResultado);
			}
		}
		
		public function selectSingleField($query){
			$resultado = @mysql_query($query,$this->conexion);
			if(!$resultado){
				$this->errorT = "Error de ejecución de consulta";
				$this->errorDesc = "MYSQL ha dicho : ".mysql_error();
				return false;
			}else{
				$this->resultados = $resultado;
				$this->numFilasResultado = @mysql_num_rows($this->resultados);
				$this->filaResultado = @mysql_fetch_array($this->resultados);
				return ($this->filaResultado[0]);
			}
		}
		
		public function fetchNextRow(){
  			return @mysql_fetch_array($this->resultados);
  		}
		
		public function fetchNextAssoc(){
			return @mysql_fetch_assoc($this->resultados);
		}

		public function getNumRows(){
			return mysql_num_rows($this->resultados);
		}
		
		
		public function close(){
			if(isset($this->conexion)){
				mysql_close($this->conexion);
			}
		}		
		
		public function getErrorT(){
			return $this->errorT;
		}
		
		public function getErrorDesc(){
			return $this->errorDesc;
		}
	}
?>