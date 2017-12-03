<?php
namespace src\Model\Domain{
		/**
		* This class contain all attributes for the model of the table Tipoincidente
		* @author lHersey
		* @GitHub http://github.com/lHersey
		*/
	class Tipoincidente{
		//Attributes
		private $PK_IDTipoIncidente;
		private $DescripcionTipoIncidente;
		

		//Constructors
		public static function createNullTipoincidente(){
			$instance = new self();
			return $instance;
		}


		public static function createTipoincidente($PK_IDTipoIncidente, $DescripcionTipoIncidente){
			$instance = new self();
            $instance->PK_IDTipoIncidente=$PK_IDTipoIncidente;
			$instance->DescripcionTipoIncidente=$DescripcionTipoIncidente;
			
			return $instance;
		}

		
		public function getPK_IDTipoIncidente(){
			return $this->PK_IDTipoIncidente;
		}

		public function setPK_IDTipoIncidente($PK_IDTipoIncidente) {
			$this->PK_IDTipoIncidente = $PK_IDTipoIncidente;
		}

					
		public function getDescripcionTipoIncidente(){
			return $this->DescripcionTipoIncidente;
		}

		public function setDescripcionTipoIncidente($DescripcionTipoIncidente) {
			$this->DescripcionTipoIncidente = $DescripcionTipoIncidente;
		}

					

		public function toJSON(){
			$arrayTipoincidente = array();
			$arrayTipoincidente[PK_IDTipoIncidente] = $this->FK_[PK_IDTipoIncidente];
			$arrayTipoincidente[DescripcionTipoIncidente] = $this->FK_[DescripcionTipoIncidente];
			
			return json_encode($arrayTipoincidente);
		}
	}
}
?>