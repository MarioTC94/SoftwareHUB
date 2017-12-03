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
		

		//Constructors
		public static function createNullTiposoftware(){
			$instance = new self();
			return $instance;
		}


		public static function createTiposoftware($PK_IDTipoSoftware, $DescripcionTipoSoftware){
			$instance = new self();
            $instance->PK_IDTipoSoftware=$PK_IDTipoSoftware;
			$instance->DescripcionTipoSoftware=$DescripcionTipoSoftware;
			
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

					

		public function toJSON(){
			$arrayTiposoftware = array();
			$arrayTiposoftware[PK_IDTipoSoftware] = $this->FK_[PK_IDTipoSoftware];
			$arrayTiposoftware[DescripcionTipoSoftware] = $this->FK_[DescripcionTipoSoftware];
			
			return json_encode($arrayTiposoftware);
		}
	}
}
?>