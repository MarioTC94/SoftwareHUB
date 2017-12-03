<?php
namespace src\Model\Domain{
		/**
		* This class contain all attributes for the model of the table Cliente
		* @author lHersey
		* @GitHub http://github.com/lHersey
		*/
	class Cliente{
		//Attributes
		private $Nombre;
		private $Apellido;
		private $FechaNacimiento;
		private $PK_IDCliente;
		private $Activo;
		

		//Constructors
		public static function createNullCliente(){
			$instance = new self();
			return $instance;
		}


		public static function createCliente($Nombre, $Apellido, $FechaNacimiento, $PK_IDCliente, $Activo){
			$instance = new self();
            $instance->Nombre=$Nombre;
			$instance->Apellido=$Apellido;
			$instance->FechaNacimiento=$FechaNacimiento;
			$instance->PK_IDCliente=$PK_IDCliente;
			$instance->Activo=$Activo;
			
			return $instance;
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

					
		public function getPK_IDCliente(){
			return $this->PK_IDCliente;
		}

		public function setPK_IDCliente($PK_IDCliente) {
			$this->PK_IDCliente = $PK_IDCliente;
		}

					
		public function getActivo(){
			return $this->Activo;
		}

		public function setActivo($Activo) {
			$this->Activo = $Activo;
		}

					

		public function toJSON(){
			$arrayCliente = array();
			$arrayCliente[Nombre] = $this->FK_[Nombre];
			$arrayCliente[Apellido] = $this->FK_[Apellido];
			$arrayCliente[FechaNacimiento] = $this->FK_[FechaNacimiento];
			$arrayCliente[PK_IDCliente] = $this->FK_[PK_IDCliente];
			$arrayCliente[Activo] = $this->FK_[Activo];
			
			return json_encode($arrayCliente);
		}
	}
}
?>