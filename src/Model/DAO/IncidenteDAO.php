<?php
namespace src\Model\DAO{
		/**
		* This class contain all methods to interact with the data base
		* @author lHersey
		* @GitHub http://github.com/lHersey
		*/
	use lib\Model\Databases\MySQL;
	use src\Model\Domain\Incidente;
	class IncidenteDAO extends MySQL{

		//Add a Incidente
		public function Add(Incidente $oIncidente){
			$STMT = parent::PREPARE('INSERT INTO Incidente(NombreIncidente, DescripcionIncidente, EstadoIncidente, TipoIncidente, Cliente, Proveedor, Activo) VALUES (?, ?, ?, ?, ?, ?, ?);');
			
			$Params = parent::TypeParam($oIncidente->getNombreIncidente()) . parent::TypeParam($oIncidente->getDescripcionIncidente()) . parent::TypeParam($oIncidente->getEstadoIncidente()) . parent::TypeParam($oIncidente->getTipoIncidente()) . parent::TypeParam($oIncidente->getCliente()) . parent::TypeParam($oIncidente->getProveedor()) . parent::TypeParam($oIncidente->getActivo());
			
			$NombreIncidente = $oIncidente->getNombreIncidente();
			$DescripcionIncidente = $oIncidente->getDescripcionIncidente();
			$EstadoIncidente = $oIncidente->getEstadoIncidente();
			$TipoIncidente = $oIncidente->getTipoIncidente();
			$Cliente = $oIncidente->getCliente();
			$Proveedor = $oIncidente->getProveedor();
			$Activo = $oIncidente->getActivo();
			
			$STMT->bind_param($Params, $NombreIncidente,  $DescripcionIncidente,  $EstadoIncidente,  $TipoIncidente,  $Cliente,  $Proveedor,  $Activo);
			
			return parent::CMD($STMT);
		}

		//Update a Incidente
		public function Update(Incidente $oIncidente){
			$STMT = parent::PREPARE('UPDATE Incidente SET NombreIncidente = ?, DescripcionIncidente = ?, EstadoIncidente = ?, TipoIncidente = ?, Cliente = ?, Proveedor = ?, Activo = ? WHERE PK_IDIncidente = ?;');
			
			$Params = parent::TypeParam($oIncidente->getNombreIncidente()) . parent::TypeParam($oIncidente->getDescripcionIncidente()) . parent::TypeParam($oIncidente->getEstadoIncidente()) . parent::TypeParam($oIncidente->getTipoIncidente()) . parent::TypeParam($oIncidente->getCliente()) . parent::TypeParam($oIncidente->getProveedor()) . parent::TypeParam($oIncidente->getActivo()) . parent::TypeParam($oIncidente->getPK_IDIncidente());
			
			$NombreIncidente = $oIncidente->getNombreIncidente();
			$DescripcionIncidente = $oIncidente->getDescripcionIncidente();
			$EstadoIncidente = $oIncidente->getEstadoIncidente();
			$TipoIncidente = $oIncidente->getTipoIncidente();
			$Cliente = $oIncidente->getCliente();
			$Proveedor = $oIncidente->getProveedor();
			$Activo = $oIncidente->getActivo();
			$PK_IDIncidente = $oIncidente->getPK_IDIncidente();
			
			$STMT->bind_param($Params, $NombreIncidente,  $DescripcionIncidente,  $EstadoIncidente,  $TipoIncidente,  $Cliente,  $Proveedor,  $Activo,  $PK_IDIncidente);
			
			return parent::CMD($STMT);
		}

		//Delete a Incidente
		public function Delete(Incidente $oIncidente){
			$STMT = parent::PREPARE('DELETE FROM Incidente WHERE PK_IDIncidente = ?;');
			
			$Params = parent::TypeParam($oIncidente->getPK_IDIncidente());
			
			$PK_IDIncidente = $oIncidente->getPK_IDIncidente();
			
			$STMT->bind_param($Params, $PK_IDIncidente);
			
			return parent::CMD($STMT);
		}

		//Select one Incidente
		public function SelectByPrimaryKey(Incidente $oIncidente){
			$STMT = parent::PREPARE('SELECT * FROM Incidente WHERE PK_IDIncidente = ?;');
			
			$Params = parent::TypeParam($oIncidente->getPK_IDIncidente());
			
			$PK_IDIncidente = $oIncidente->getPK_IDIncidente();
			
			$STMT->bind_param($Params, $PK_IDIncidente);
			
			return parent::FirstOrDefault($STMT);
		}

		//Select all Incidente
		public function SelectAll(){
			$STMT = parent::PREPARE('SELECT * FROM Incidente;');
			return parent::SELECT($STMT);
		}

		//Varify if a Incidente exist
		public function Exists(Incidente $oIncidente){
			$STMT = parent::PREPARE('SELECT 1 FROM Incidente WHERE PK_IDIncidente = ? LIMIT 1;');
			
			$Params = parent::TypeParam($oIncidente->getPK_IDIncidente());
			
			$PK_IDIncidente = $oIncidente->getPK_IDIncidente();
			
			$STMT->bind_param($Params, $PK_IDIncidente);
			
			return Count(parent::FirstOrDefault($STMT)) > 0;
		}
	}
}
?>