<?php
namespace src\Model\Domain{
		/**
		* This class contain all attributes for the model of the table Usuario
		* @author lHersey
		* @GitHub http://github.com/lHersey
		*/
	class Usuario{
		//Attributes
		private $PK_IDUsuario;
		private $Correo;
		private $Contrasena;
		private $Salt;
		private $FechaRegistro;
		private $Activo;
		private $IDRol;
		

		//Constructors
		public static function createNullUsuario(){
			$instance = new self();
			return $instance;
		}


		public static function createUsuario($PK_IDUsuario, $Correo, $Contrasena, $Salt, $FechaRegistro, $Activo, $IDRol){
			$instance = new self();
            $instance->PK_IDUsuario=$PK_IDUsuario;
			$instance->Correo=$Correo;
			$instance->Contrasena=$Contrasena;
			$instance->Salt=$Salt;
			$instance->FechaRegistro=$FechaRegistro;
			$instance->Activo=$Activo;
			$instance->IDRol=$IDRol;
			
			return $instance;
		}

		
		public function getPK_IDUsuario(){
			return $this->PK_IDUsuario;
		}

		public function setPK_IDUsuario($PK_IDUsuario) {
			$this->PK_IDUsuario = $PK_IDUsuario;
		}

					
		public function getCorreo(){
			return $this->Correo;
		}

		public function setCorreo($Correo) {
			$this->Correo = $Correo;
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

					
		public function getFechaRegistro(){
			return $this->FechaRegistro;
		}

		public function setFechaRegistro($FechaRegistro) {
			$this->FechaRegistro = $FechaRegistro;
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
			$arrayUsuario[PK_IDUsuario] = $this->FK_[PK_IDUsuario];
			$arrayUsuario[Correo] = $this->FK_[Correo];
			$arrayUsuario[Contrasena] = $this->FK_[Contrasena];
			$arrayUsuario[Salt] = $this->FK_[Salt];
			$arrayUsuario[FechaRegistro] = $this->FK_[FechaRegistro];
			$arrayUsuario[Activo] = $this->FK_[Activo];
			$arrayUsuario[IDRol] = $this->FK_[IDRol];
			
			return json_encode($arrayUsuario);
		}
	}
}
?>