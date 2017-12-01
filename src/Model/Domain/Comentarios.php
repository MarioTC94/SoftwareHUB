<?php
namespace src\Model\Domain{
		/**
		* This class contain all attributes for the model of the table Comentarios
		* @author lHersey
		* @GitHub http://github.com/lHersey
		*/
	class Comentarios{
		//Attributes
		private $PK_IDComentarios;
		private $DescripcionComentario;
		private $Incidente;
		private $Usuario;
		private $Activo;
		

		//Constructors
		public static function createNullComentarios(){
			$instance = new self();
			return $instance;
		}


		public static function createComentarios($PK_IDComentarios, $DescripcionComentario, $Incidente, $Usuario, $Activo){
			$instance = new self();
            $instance->PK_IDComentarios=$PK_IDComentarios;
			$instance->DescripcionComentario=$DescripcionComentario;
			$instance->Incidente=$Incidente;
			$instance->Usuario=$Usuario;
			$instance->Activo=$Activo;
			
			return $instance;
		}

		
		public function getPK_IDComentarios(){
			return $this->PK_IDComentarios;
		}

		public function setPK_IDComentarios($PK_IDComentarios) {
			$this->PK_IDComentarios = $PK_IDComentarios;
		}

					
		public function getDescripcionComentario(){
			return $this->DescripcionComentario;
		}

		public function setDescripcionComentario($DescripcionComentario) {
			$this->DescripcionComentario = $DescripcionComentario;
		}

					
		public function getIncidente(){
			return $this->Incidente;
		}

		public function setIncidente($Incidente) {
			$this->Incidente = $Incidente;
		}

					
		public function getUsuario(){
			return $this->Usuario;
		}

		public function setUsuario($Usuario) {
			$this->Usuario = $Usuario;
		}

					
		public function getActivo(){
			return $this->Activo;
		}

		public function setActivo($Activo) {
			$this->Activo = $Activo;
		}

					

		public function toJSON(){
			$arrayComentarios = array();
			$arrayComentarios[PK_IDComentarios] = $this->FK_[PK_IDComentarios];
			$arrayComentarios[DescripcionComentario] = $this->FK_[DescripcionComentario];
			$arrayComentarios[Incidente] = $this->FK_[Incidente];
			$arrayComentarios[Usuario] = $this->FK_[Usuario];
			$arrayComentarios[Activo] = $this->FK_[Activo];
			
			return json_encode($arrayComentarios);
		}
	}
}
?>