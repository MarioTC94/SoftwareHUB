<?php
namespace Asphyo\src\Model\Domain{
		/**
		* This class contain all attributes for the model of the table Bitacora
		* @author lHersey
		* @GitHub http://Github.com/lHersey
		*/
	class Bitacora{
		//Attributes
		private $PK_Bitacora;
		private $DescripcionBitacora;
		private $FechaDeterminada;
		private $Activo;
		

		//Constructors
		public static function createNullBitacora(){
			$instance = new self();
			return $instance;
		}


		public static function createBitacora($PK_Bitacora, $DescripcionBitacora, $FechaDeterminada, $Activo){
			$instance = new self();
            $instance->PK_Bitacora=$PK_Bitacora;
			$instance->DescripcionBitacora=$DescripcionBitacora;
			$instance->FechaDeterminada=$FechaDeterminada;
			$instance->Activo=$Activo;
			
			return $instance;
		}

		
		public function getPK_Bitacora(){
			return $this->PK_Bitacora;
		}

		public function setPK_Bitacora($PK_Bitacora) {
			$this->PK_Bitacora = $PK_Bitacora;
		}

					
		public function getDescripcionBitacora(){
			return $this->DescripcionBitacora;
		}

		public function setDescripcionBitacora($DescripcionBitacora) {
			$this->DescripcionBitacora = $DescripcionBitacora;
		}

					
		public function getFechaDeterminada(){
			return $this->FechaDeterminada;
		}

		public function setFechaDeterminada($FechaDeterminada) {
			$this->FechaDeterminada = $FechaDeterminada;
		}

					
		public function getActivo(){
			return $this->Activo;
		}

		public function setActivo($Activo) {
			$this->Activo = $Activo;
		}

					

		public function toJSON(){
			$arrayBitacora = array();
			$arrayBitacora[PK_Bitacora] = $this->FK_[PK_Bitacora];
			$arrayBitacora[DescripcionBitacora] = $this->FK_[DescripcionBitacora];
			$arrayBitacora[FechaDeterminada] = $this->FK_[FechaDeterminada];
			$arrayBitacora[Activo] = $this->FK_[Activo];
			
			return json_encode($arrayBitacora);
		}
	}
}
?>