<?php
namespace src\Model\Domain{
		/**
		* This class contain all attributes for the model of the table Software
		* @author lHersey
		* @GitHub http://github.com/lHersey
		*/
	class Software{
		//Attributes
		private $PK_IDSoftware;
		private $NombreSoftware;
		private $DescripcionSoftware;
		private $Activo;
		private $TipoSoftware;
		private $IDProveedor;
		

		//Constructors
		public static function createNullSoftware(){
			$instance = new self();
			return $instance;
		}


		public static function createSoftware($PK_IDSoftware, $NombreSoftware, $DescripcionSoftware, $Activo, $TipoSoftware, $IDProveedor){
			$instance = new self();
            $instance->PK_IDSoftware=$PK_IDSoftware;
			$instance->NombreSoftware=$NombreSoftware;
			$instance->DescripcionSoftware=$DescripcionSoftware;
			$instance->Activo=$Activo;
			$instance->TipoSoftware=$TipoSoftware;
			$instance->IDProveedor=$IDProveedor;
			
			return $instance;
		}

		
		public function getPK_IDSoftware(){
			return $this->PK_IDSoftware;
		}

		public function setPK_IDSoftware($PK_IDSoftware) {
			$this->PK_IDSoftware = $PK_IDSoftware;
		}

					
		public function getNombreSoftware(){
			return $this->NombreSoftware;
		}

		public function setNombreSoftware($NombreSoftware) {
			$this->NombreSoftware = $NombreSoftware;
		}

					
		public function getDescripcionSoftware(){
			return $this->DescripcionSoftware;
		}

		public function setDescripcionSoftware($DescripcionSoftware) {
			$this->DescripcionSoftware = $DescripcionSoftware;
		}

					
		public function getActivo(){
			return $this->Activo;
		}

		public function setActivo($Activo) {
			$this->Activo = $Activo;
		}

					
		public function getTipoSoftware(){
			return $this->TipoSoftware;
		}

		public function setTipoSoftware($TipoSoftware) {
			$this->TipoSoftware = $TipoSoftware;
		}

					
		public function getIDProveedor(){
			return $this->IDProveedor;
		}

		public function setIDProveedor($IDProveedor) {
			$this->IDProveedor = $IDProveedor;
		}

					

		public function toJSON(){
			$arraySoftware = array();
			$arraySoftware[PK_IDSoftware] = $this->FK_[PK_IDSoftware];
			$arraySoftware[NombreSoftware] = $this->FK_[NombreSoftware];
			$arraySoftware[DescripcionSoftware] = $this->FK_[DescripcionSoftware];
			$arraySoftware[Activo] = $this->FK_[Activo];
			$arraySoftware[TipoSoftware] = $this->FK_[TipoSoftware];
			$arraySoftware[IDProveedor] = $this->FK_[IDProveedor];
			
			return json_encode($arraySoftware);
		}
	}
}
?>