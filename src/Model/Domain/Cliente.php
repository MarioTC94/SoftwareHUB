<?php
namespace Asphyo\src\Model\Domain{
		/**
		* This class contain all attributes for the model of the table Cliente
		* @author lHersey
		* @GitHub http://Github.com/lHersey
		*/
	class Cliente{
		//Attributes
		private $PK_IDCorreo;
		private $Activo;
		

		//Constructors
		public static function createNullCliente(){
			$instance = new self();
			return $instance;
		}


		public static function createCliente($PK_IDCorreo, $Activo){
			$instance = new self();
            $instance->PK_IDCorreo=$PK_IDCorreo;
			$instance->Activo=$Activo;
			
			return $instance;
		}

		
		public function getPK_IDCorreo(){
			return $this->PK_IDCorreo;
		}

		public function setPK_IDCorreo($PK_IDCorreo) {
			$this->PK_IDCorreo = $PK_IDCorreo;
		}

					
		public function getActivo(){
			return $this->Activo;
		}

		public function setActivo($Activo) {
			$this->Activo = $Activo;
		}

					

		public function toJSON(){
			$arrayCliente = array();
			$arrayCliente[PK_IDCorreo] = $this->FK_[PK_IDCorreo];
			$arrayCliente[Activo] = $this->FK_[Activo];
			
			return json_encode($arrayCliente);
		}
	}
}
?>