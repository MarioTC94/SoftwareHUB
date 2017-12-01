<?php
namespace Asphyo\src\Model\Domain{
		/**
		* This class contain all attributes for the model of the table Estadoincidente
		* @author lHersey
		* @GitHub http://Github.com/lHersey
		*/
	class Estadoincidente{
		//Attributes
		private $PK_IDEstadoIncidente;
		private $DescripcionEstadoIncidente;
		private $Activo;
		

		//Constructors
		public static function createNullEstadoincidente(){
			$instance = new self();
			return $instance;
		}


		public static function createEstadoincidente($PK_IDEstadoIncidente, $DescripcionEstadoIncidente, $Activo){
			$instance = new self();
            $instance->PK_IDEstadoIncidente=$PK_IDEstadoIncidente;
			$instance->DescripcionEstadoIncidente=$DescripcionEstadoIncidente;
			$instance->Activo=$Activo;
			
			return $instance;
		}

		
		public function getPK_IDEstadoIncidente(){
			return $this->PK_IDEstadoIncidente;
		}

		public function setPK_IDEstadoIncidente($PK_IDEstadoIncidente) {
			$this->PK_IDEstadoIncidente = $PK_IDEstadoIncidente;
		}

					
		public function getDescripcionEstadoIncidente(){
			return $this->DescripcionEstadoIncidente;
		}

		public function setDescripcionEstadoIncidente($DescripcionEstadoIncidente) {
			$this->DescripcionEstadoIncidente = $DescripcionEstadoIncidente;
		}

					
		public function getActivo(){
			return $this->Activo;
		}

		public function setActivo($Activo) {
			$this->Activo = $Activo;
		}

					

		public function toJSON(){
			$arrayEstadoincidente = array();
			$arrayEstadoincidente[PK_IDEstadoIncidente] = $this->FK_[PK_IDEstadoIncidente];
			$arrayEstadoincidente[DescripcionEstadoIncidente] = $this->FK_[DescripcionEstadoIncidente];
			$arrayEstadoincidente[Activo] = $this->FK_[Activo];
			
			return json_encode($arrayEstadoincidente);
		}
	}
}
?>