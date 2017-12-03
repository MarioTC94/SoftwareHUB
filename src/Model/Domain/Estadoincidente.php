<?php
namespace src\Model\Domain{
		/**
		* This class contain all attributes for the model of the table Estadoincidente
		* @author lHersey
		* @GitHub http://github.com/lHersey
		*/
	class Estadoincidente{
		//Attributes
		private $PK_IDEstadoIncidente;
		private $DescripcionEstadoIncidente;
		

		//Constructors
		public static function createNullEstadoincidente(){
			$instance = new self();
			return $instance;
		}


		public static function createEstadoincidente($PK_IDEstadoIncidente, $DescripcionEstadoIncidente){
			$instance = new self();
            $instance->PK_IDEstadoIncidente=$PK_IDEstadoIncidente;
			$instance->DescripcionEstadoIncidente=$DescripcionEstadoIncidente;
			
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

					

		public function toJSON(){
			$arrayEstadoincidente = array();
			$arrayEstadoincidente[PK_IDEstadoIncidente] = $this->FK_[PK_IDEstadoIncidente];
			$arrayEstadoincidente[DescripcionEstadoIncidente] = $this->FK_[DescripcionEstadoIncidente];
			
			return json_encode($arrayEstadoincidente);
		}
	}
}
?>