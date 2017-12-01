<?php
namespace src\Model\Domain{
		/**
		* This class contain all attributes for the model of the table Tiposoftware
		* @author lHersey
		* @GitHub http://github.com/lHersey
		*/
	class Tiposoftware{
		//Attributes
		private $PK_IDTipoSoftware;
		private $DescripcionTipoSoftware;
		private $Activo;
		

		//Constructors
		public static function createNullTiposoftware(){
			$instance = new self();
			return $instance;
		}


		public static function createTiposoftware($PK_IDTipoSoftware, $DescripcionTipoSoftware, $Activo){
			$instance = new self();
            $instance->PK_IDTipoSoftware=$PK_IDTipoSoftware;
			$instance->DescripcionTipoSoftware=$DescripcionTipoSoftware;
			$instance->Activo=$Activo;
			
			return $instance;
		}

		
		public function getPK_IDTipoSoftware(){
			return $this->PK_IDTipoSoftware;
		}

		public function setPK_IDTipoSoftware($PK_IDTipoSoftware) {
			$this->PK_IDTipoSoftware = $PK_IDTipoSoftware;
		}

					
		public function getDescripcionTipoSoftware(){
			return $this->DescripcionTipoSoftware;
		}

		public function setDescripcionTipoSoftware($DescripcionTipoSoftware) {
			$this->DescripcionTipoSoftware = $DescripcionTipoSoftware;
		}

					
		public function getActivo(){
			return $this->Activo;
		}

		public function setActivo($Activo) {
			$this->Activo = $Activo;
		}

					

		public function toJSON(){
			$arrayTiposoftware = array();
			$arrayTiposoftware[PK_IDTipoSoftware] = $this->FK_[PK_IDTipoSoftware];
			$arrayTiposoftware[DescripcionTipoSoftware] = $this->FK_[DescripcionTipoSoftware];
			$arrayTiposoftware[Activo] = $this->FK_[Activo];
			
			return json_encode($arrayTiposoftware);
		}
	}
}
?>