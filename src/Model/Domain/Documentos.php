<?php
namespace src\Model\Domain{
		/**
		* This class contain all attributes for the model of the table Documentos
		* @author lHersey
		* @GitHub http://github.com/lHersey
		*/
	class Documentos{
		//Attributes
		private $PK_IDDocumentos;
		private $DescripcionDocumentos;
		private $Documento;
		private $Incidente;
		private $Activo;
		

		//Constructors
		public static function createNullDocumentos(){
			$instance = new self();
			return $instance;
		}


		public static function createDocumentos($PK_IDDocumentos, $DescripcionDocumentos, $Documento, $Incidente, $Activo){
			$instance = new self();
            $instance->PK_IDDocumentos=$PK_IDDocumentos;
			$instance->DescripcionDocumentos=$DescripcionDocumentos;
			$instance->Documento=$Documento;
			$instance->Incidente=$Incidente;
			$instance->Activo=$Activo;
			
			return $instance;
		}

		
		public function getPK_IDDocumentos(){
			return $this->PK_IDDocumentos;
		}

		public function setPK_IDDocumentos($PK_IDDocumentos) {
			$this->PK_IDDocumentos = $PK_IDDocumentos;
		}

					
		public function getDescripcionDocumentos(){
			return $this->DescripcionDocumentos;
		}

		public function setDescripcionDocumentos($DescripcionDocumentos) {
			$this->DescripcionDocumentos = $DescripcionDocumentos;
		}

					
		public function getDocumento(){
			return $this->Documento;
		}

		public function setDocumento($Documento) {
			$this->Documento = $Documento;
		}

					
		public function getIncidente(){
			return $this->Incidente;
		}

		public function setIncidente($Incidente) {
			$this->Incidente = $Incidente;
		}

					
		public function getActivo(){
			return $this->Activo;
		}

		public function setActivo($Activo) {
			$this->Activo = $Activo;
		}

					

		public function toJSON(){
			$arrayDocumentos = array();
			$arrayDocumentos[PK_IDDocumentos] = $this->FK_[PK_IDDocumentos];
			$arrayDocumentos[DescripcionDocumentos] = $this->FK_[DescripcionDocumentos];
			$arrayDocumentos[Documento] = $this->FK_[Documento];
			$arrayDocumentos[Incidente] = $this->FK_[Incidente];
			$arrayDocumentos[Activo] = $this->FK_[Activo];
			
			return json_encode($arrayDocumentos);
		}
	}
}
?>