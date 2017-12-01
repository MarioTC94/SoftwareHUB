<?php
namespace Asphyo\src\Model\Domain{
		/**
		* This class contain all attributes for the model of the table Usuario
		* @author lHersey
		* @GitHub http://Github.com/lHersey
		*/
	class Usuario{
		//Attributes
		private $NombreUsuario;
		private $Nombre;
		private $Apellido;
		private $FechaNacimiento;
		private $PK_Correo;
		private $Contrasena;
		private $Salt;
		private $Activo;
		private $IDRol;
		

		//Constructors
		public static function createNullUsuario(){
			$instance = new self();
			return $instance;
		}


		public static function createUsuario($NombreUsuario, $Nombre, $Apellido, $FechaNacimiento, $PK_Correo, $Contrasena, $Salt, $Activo, $IDRol){
			$instance = new self();
            $instance->NombreUsuario=$NombreUsuario;
			$instance->Nombre=$Nombre;
			$instance->Apellido=$Apellido;
			$instance->FechaNacimiento=$FechaNacimiento;
			$instance->PK_Correo=$PK_Correo;
			$instance->Contrasena=$Contrasena;
			$instance->Salt=$Salt;
			$instance->Activo=$Activo;
			$instance->IDRol=$IDRol;
			
			return $instance;
		}

		
		public function getNombreUsuario(){
			return $this->NombreUsuario;
		}

		public function setNombreUsuario($NombreUsuario) {
			$this->NombreUsuario = $NombreUsuario;
		}

					
		public function getNombre(){
			return $this->Nombre;
		}

		public function setNombre($Nombre) {
			$this->Nombre = $Nombre;
		}

					
		public function getApellido(){
			return $this->Apellido;
		}

		public function setApellido($Apellido) {
			$this->Apellido = $Apellido;
		}

					
		public function getFechaNacimiento(){
			return $this->FechaNacimiento;
		}

		public function setFechaNacimiento($FechaNacimiento) {
			$this->FechaNacimiento = $FechaNacimiento;
		}

					
		public function getPK_Correo(){
			return $this->PK_Correo;
		}

		public function setPK_Correo($PK_Correo) {
			$this->PK_Correo = $PK_Correo;
		}

					
		public function getContrasena(){
			return $this->Contrasena;
		}

		public function setContrasena($Contrasena) {
			$this->Contrasena = $Contrasena;
		}

					
		public function getSalt(){
			return $this->Salt;
		}

		public function setSalt($Salt) {
			$this->Salt = $Salt;
		}

					
		public function getActivo(){
			return $this->Activo;
		}

		public function setActivo($Activo) {
			$this->Activo = $Activo;
		}

					
		public function getIDRol(){
			return $this->IDRol;
		}

		public function setIDRol($IDRol) {
			$this->IDRol = $IDRol;
		}

					

		public function toJSON(){
			$arrayUsuario = array();
			$arrayUsuario[NombreUsuario] = $this->FK_[NombreUsuario];
			$arrayUsuario[Nombre] = $this->FK_[Nombre];
			$arrayUsuario[Apellido] = $this->FK_[Apellido];
			$arrayUsuario[FechaNacimiento] = $this->FK_[FechaNacimiento];
			$arrayUsuario[PK_Correo] = $this->FK_[PK_Correo];
			$arrayUsuario[Contrasena] = $this->FK_[Contrasena];
			$arrayUsuario[Salt] = $this->FK_[Salt];
			$arrayUsuario[Activo] = $this->FK_[Activo];
			$arrayUsuario[IDRol] = $this->FK_[IDRol];
			
			return json_encode($arrayUsuario);
		}
	}
}
?>