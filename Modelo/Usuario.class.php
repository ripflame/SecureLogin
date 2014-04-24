<?php
	class Usuario{
		private $username, $apellido1, $apellido2, $nombres, $email, $edad, $genero, $password, $privilegio;
		
		public function __construct($usr,$ape1,$ape2,$nom,$mail,$age,$gen,$pass,$priv){
			$this->username=$usr;
			$this->apellido1 = $ape1;
			$this->apellido2 = $ape2;
			$this->nombres = $nom;
			$this->email = $mail;
			$this->edad = $age;
			$this->genero = $gen;
			$this->password = $pass;
			$this->privilegio = $priv;
		}
		
		public function getUsername(){
			return $this->username;
		}
		
		public function getApellido1(){
			return $this->apellido1;
		}
		
		public function getApellido2(){
			return $this->apellido2;
		}
		
		public function getNombres(){
			return $this->nombres;
		}
		
		public function getEmail(){
			return $this->email;
		}
		
		public function getEdad(){
			return $this->edad;
		}
		
		public function getGenero(){
			return $this->genero;
		}
		
		public function getPassword(){
			return $this->password;
		}
		
		public function getPrivilegio(){
			return $this->privilegio;
		}
		
		public function setUsername($value){
			$v = trim($value);
			$this->username = empty($v) ? null : $v;
			return $this;
		}
		
		public function setApellido1($value){
			$v = trim($value);
			$this->apellido1 = empty($v) ? null : $v;
			return $this;
		}
		
		public function setApellido2($value){
			$v = trim($value);
			$this->apellido2 = empty($v) ? null : $v;
			return $this;
		}
		
		public function setNombres($value){
			$v = trim($value);
			$this->nombres = empty($v) ? null : $v;
			return $this;
		}
		
		public function setEmail($value){
			$v = trim($value);
			$this->email = empty($v) ? null : $v;
			return $this;
		}
		
		public function setEdad($value){
			$v = trim($value);
			$this->edad = empty($v) ? null : $v;
			return $this;
		}
		
		public function setGenero($value){
			$v = trim($value);
			$this->genero = empty($v) ? null : $v;
			return $this;
		}
		
		public function setPassword($value){
			$v = trim($value);
			$this->password = empty($v) ? null : $v;
			return $this;
		}
		
		public function setPrivilegio($value){
			$v = trim($value);
			$this->privilegio = empty($v) ? null : $v;
			return $this;
		}
		
		public function esPasswordCorrecta($pwd){
			$respuesta = false;
			if($this->password == $pwd){
				$respuesta = true;
			}
			return $respuesta;
		}
	
	}
?>