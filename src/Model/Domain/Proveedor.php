<?php
namespace src\Model\Domain{
		/**
		* This class contain all attributes for the model of the table Proveedor
		* @author lHersey
		* @GitHub http://github.com/lHersey
		*/
	class Proveedor{
		//Attributes
		private $NombreEmpresa;
		private $Activo;
		private $PK_IDProveedor;
		private $URL;
		private $NombrePersonaConacto;
		private $EmailPersonaContacto;
		

		//Constructors
		public static function createNullProveedor(){
			$instance = new self();
			return $instance;
		}


		public static function createProveedor($NombreEmpresa, $Activo, $PK_IDProveedor, $URL, $NombrePersonaConacto, $EmailPersonaContacto){
			$instance = new self();
            $instance->NombreEmpresa=$NombreEmpresa;
			$instance->Activo=$Activo;
			$instance->PK_IDProveedor=$PK_IDProveedor;
			$instance->URL=$URL;
			$instance->NombrePersonaConacto=$NombrePersonaConacto;
			$instance->EmailPersonaContacto=$EmailPersonaContacto;
			
			return $instance;
		}

		
		public function getNombreEmpresa(){
			return $this->NombreEmpresa;
		}

		public function setNombreEmpresa($NombreEmpresa) {
			$this->NombreEmpresa = $NombreEmpresa;
		}

					
		public function getActivo(){
			return $this->Activo;
		}

		public function setActivo($Activo) {
			$this->Activo = $Activo;
		}

					
		public function getPK_IDProveedor(){
			return $this->PK_IDProveedor;
		}

		public function setPK_IDProveedor($PK_IDProveedor) {
			$this->PK_IDProveedor = $PK_IDProveedor;
		}

					
		public function getURL(){
			return $this->URL;
		}

		public function setURL($URL) {
			$this->URL = $URL;
		}

					
		public function getNombrePersonaConacto(){
			return $this->NombrePersonaConacto;
		}

		public function setNombrePersonaConacto($NombrePersonaConacto) {
			$this->NombrePersonaConacto = $NombrePersonaConacto;
		}

					
		public function getEmailPersonaContacto(){
			return $this->EmailPersonaContacto;
		}

		public function setEmailPersonaContacto($EmailPersonaContacto) {
			$this->EmailPersonaContacto = $EmailPersonaContacto;
		}

					

		public function toJSON(){
			$arrayProveedor = array();
			$arrayProveedor[NombreEmpresa] = $this->FK_[NombreEmpresa];
			$arrayProveedor[Activo] = $this->FK_[Activo];
			$arrayProveedor[PK_IDProveedor] = $this->FK_[PK_IDProveedor];
			$arrayProveedor[URL] = $this->FK_[URL];
			$arrayProveedor[NombrePersonaConacto] = $this->FK_[NombrePersonaConacto];
			$arrayProveedor[EmailPersonaContacto] = $this->FK_[EmailPersonaContacto];
			
			return json_encode($arrayProveedor);
		}
	}
}
?>