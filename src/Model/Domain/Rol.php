<?php
namespace src\Model\Domain{
		/**
		* This class contain all attributes for the model of the table Rol
		* @author lHersey
		* @GitHub http://github.com/lHersey
		*/
	class Rol{
		//Attributes
		private $PK_IDROL;
		private $DescripcionRol;
		

		//Constructors
		public static function createNullRol(){
			$instance = new self();
			return $instance;
		}


		public static function createRol($PK_IDROL, $DescripcionRol){
			$instance = new self();
            $instance->PK_IDROL=$PK_IDROL;
			$instance->DescripcionRol=$DescripcionRol;
			
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

					

		public function toJSON(){
			$arrayRol = array();
			$arrayRol[PK_IDROL] = $this->FK_[PK_IDROL];
			$arrayRol[DescripcionRol] = $this->FK_[DescripcionRol];
			
			return json_encode($arrayRol);
		}
	}
}
?>