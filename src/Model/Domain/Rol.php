<?php
namespace Asphyo\src\Model\Domain{
		/**
		* This class contain all attributes for the model of the table Rol
		* @author lHersey
		* @GitHub http://Github.com/lHersey
		*/
	class Rol{
		//Attributes
		private $PK_IDROL;
		private $DescripcionRol;
		private $Activo;
		

		//Constructors
		public static function createNullRol(){
			$instance = new self();
			return $instance;
		}


		public static function createRol($PK_IDROL, $DescripcionRol, $Activo){
			$instance = new self();
            $instance->PK_IDROL=$PK_IDROL;
			$instance->DescripcionRol=$DescripcionRol;
			$instance->Activo=$Activo;
			
			return $instance;
		}

		
		public function getPK_IDROL(){
			return $this->PK_IDROL;
		}

		public function setPK_IDROL($PK_IDROL) {
			$this->PK_IDROL = $PK_IDROL;
		}

					
		public function getDescripcionRol(){
			return $this->DescripcionRol;
		}

		public function setDescripcionRol($DescripcionRol) {
			$this->DescripcionRol = $DescripcionRol;
		}

					
		public function getActivo(){
			return $this->Activo;
		}

		public function setActivo($Activo) {
			$this->Activo = $Activo;
		}

					

		public function toJSON(){
			$arrayRol = array();
			$arrayRol[PK_IDROL] = $this->FK_[PK_IDROL];
			$arrayRol[DescripcionRol] = $this->FK_[DescripcionRol];
			$arrayRol[Activo] = $this->FK_[Activo];
			
			return json_encode($arrayRol);
		}
	}
}
?>