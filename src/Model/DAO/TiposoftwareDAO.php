<?php
namespace src\Model\DAO{
		/**
		* This class contain all methods to interact with the data base
		* @author lHersey
		* @GitHub http://github.com/lHersey
		*/
	use lib\Model\Databases\MySQL;
	use src\Model\Domain\Tiposoftware;
	class TiposoftwareDAO extends MySQL{

		//Add a Tiposoftware
		public function Add(Tiposoftware $oTiposoftware){
			$STMT = parent::PREPARE('INSERT INTO Tiposoftware(DescripcionTipoSoftware, Activo) VALUES (?, ?);');
			
			$Params = parent::TypeParam($oTiposoftware->getDescripcionTipoSoftware()) . parent::TypeParam($oTiposoftware->getActivo());
			
			$DescripcionTipoSoftware = $oTiposoftware->getDescripcionTipoSoftware();
			$Activo = $oTiposoftware->getActivo();
			
			$STMT->bind_param($Params, $DescripcionTipoSoftware,  $Activo);
			
			return parent::CMD($STMT);
		}

		//Update a Tiposoftware
		public function Update(Tiposoftware $oTiposoftware){
			$STMT = parent::PREPARE('UPDATE Tiposoftware SET DescripcionTipoSoftware = ?, Activo = ? WHERE PK_IDTipoSoftware = ?;');
			
			$Params = parent::TypeParam($oTiposoftware->getDescripcionTipoSoftware()) . parent::TypeParam($oTiposoftware->getActivo()) . parent::TypeParam($oTiposoftware->getPK_IDTipoSoftware());
			
			$DescripcionTipoSoftware = $oTiposoftware->getDescripcionTipoSoftware();
			$Activo = $oTiposoftware->getActivo();
			$PK_IDTipoSoftware = $oTiposoftware->getPK_IDTipoSoftware();
			
			$STMT->bind_param($Params, $DescripcionTipoSoftware,  $Activo,  $PK_IDTipoSoftware);
			
			return parent::CMD($STMT);
		}

		//Delete a Tiposoftware
		public function Delete(Tiposoftware $oTiposoftware){
			$STMT = parent::PREPARE('DELETE FROM Tiposoftware WHERE PK_IDTipoSoftware = ?;');
			
			$Params = parent::TypeParam($oTiposoftware->getPK_IDTipoSoftware());
			
			$PK_IDTipoSoftware = $oTiposoftware->getPK_IDTipoSoftware();
			
			$STMT->bind_param($Params, $PK_IDTipoSoftware);
			
			return parent::CMD($STMT);
		}

		//Select one Tiposoftware
		public function SelectByPrimaryKey(Tiposoftware $oTiposoftware){
			$STMT = parent::PREPARE('SELECT * FROM Tiposoftware WHERE PK_IDTipoSoftware = ?;');
			
			$Params = parent::TypeParam($oTiposoftware->getPK_IDTipoSoftware());
			
			$PK_IDTipoSoftware = $oTiposoftware->getPK_IDTipoSoftware();
			
			$STMT->bind_param($Params, $PK_IDTipoSoftware);
			
			return parent::FirstOrDefault($STMT);
		}

		//Select all Tiposoftware
		public function SelectAll(){
			$STMT = parent::PREPARE('SELECT * FROM Tiposoftware;');
			return parent::SELECT($STMT);
		}

		//Varify if a Tiposoftware exist
		public function Exists(Tiposoftware $oTiposoftware){
			$STMT = parent::PREPARE('SELECT 1 FROM Tiposoftware WHERE PK_IDTipoSoftware = ? LIMIT 1;');
			
			$Params = parent::TypeParam($oTiposoftware->getPK_IDTipoSoftware());
			
			$PK_IDTipoSoftware = $oTiposoftware->getPK_IDTipoSoftware();
			
			$STMT->bind_param($Params, $PK_IDTipoSoftware);
			
			return Count(parent::FirstOrDefault($STMT)) > 0;
		}
	}
}
?>