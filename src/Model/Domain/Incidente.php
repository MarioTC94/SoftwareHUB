<?php
namespace src\Model\Domain{
		/**
		* This class contain all attributes for the model of the table Incidente
		* @author lHersey
		* @GitHub http://github.com/lHersey
		*/
	class Incidente{
		//Attributes
		private $PK_IDIncidente;
		private $NombreIncidente;
		private $DescripcionIncidente;
		private $EstadoIncidente;
		private $TipoIncidente;
		private $Cliente;
		private $Proveedor;
		private $Activo;
		

		//Constructors
		public static function createNullIncidente(){
			$instance = new self();
			return $instance;
		}


		public static function createIncidente($PK_IDIncidente, $NombreIncidente, $DescripcionIncidente, $EstadoIncidente, $TipoIncidente, $Cliente, $Proveedor, $Activo){
			$instance = new self();
            $instance->PK_IDIncidente=$PK_IDIncidente;
			$instance->NombreIncidente=$NombreIncidente;
			$instance->DescripcionIncidente=$DescripcionIncidente;
			$instance->EstadoIncidente=$EstadoIncidente;
			$instance->TipoIncidente=$TipoIncidente;
			$instance->Cliente=$Cliente;
			$instance->Proveedor=$Proveedor;
			$instance->Activo=$Activo;
			
			return $instance;
		}

		
		public function getPK_IDIncidente(){
			return $this->PK_IDIncidente;
		}

		public function setPK_IDIncidente($PK_IDIncidente) {
			$this->PK_IDIncidente = $PK_IDIncidente;
		}

					
		public function getNombreIncidente(){
			return $this->NombreIncidente;
		}

		public function setNombreIncidente($NombreIncidente) {
			$this->NombreIncidente = $NombreIncidente;
		}

					
		public function getDescripcionIncidente(){
			return $this->DescripcionIncidente;
		}

		public function setDescripcionIncidente($DescripcionIncidente) {
			$this->DescripcionIncidente = $DescripcionIncidente;
		}

					
		public function getEstadoIncidente(){
			return $this->EstadoIncidente;
		}

		public function setEstadoIncidente($EstadoIncidente) {
			$this->EstadoIncidente = $EstadoIncidente;
		}

					
		public function getTipoIncidente(){
			return $this->TipoIncidente;
		}

		public function setTipoIncidente($TipoIncidente) {
			$this->TipoIncidente = $TipoIncidente;
		}

					
		public function getCliente(){
			return $this->Cliente;
		}

		public function setCliente($Cliente) {
			$this->Cliente = $Cliente;
		}

					
		public function getProveedor(){
			return $this->Proveedor;
		}

		public function setProveedor($Proveedor) {
			$this->Proveedor = $Proveedor;
		}

					
		public function getActivo(){
			return $this->Activo;
		}

		public function setActivo($Activo) {
			$this->Activo = $Activo;
		}

					

		public function toJSON(){
			$arrayIncidente = array();
			$arrayIncidente[PK_IDIncidente] = $this->FK_[PK_IDIncidente];
			$arrayIncidente[NombreIncidente] = $this->FK_[NombreIncidente];
			$arrayIncidente[DescripcionIncidente] = $this->FK_[DescripcionIncidente];
			$arrayIncidente[EstadoIncidente] = $this->FK_[EstadoIncidente];
			$arrayIncidente[TipoIncidente] = $this->FK_[TipoIncidente];
			$arrayIncidente[Cliente] = $this->FK_[Cliente];
			$arrayIncidente[Proveedor] = $this->FK_[Proveedor];
			$arrayIncidente[Activo] = $this->FK_[Activo];
			
			return json_encode($arrayIncidente);
		}
	}
}
?>