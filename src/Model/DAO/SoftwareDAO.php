<?php
namespace src\Model\DAO{
		/**
		* This class contain all methods to interact with the data base
		* @author lHersey
		* @GitHub http://github.com/lHersey
		*/
	use lib\Model\Databases\MySQL;
	use src\Model\Domain\Software;
	class SoftwareDAO extends MySQL{

		//Add a Software
		public function Add(Software $oSoftware){
			$STMT = parent::PREPARE('INSERT INTO Software(NombreSoftware, DescripcionSoftware, Activo, TipoSoftware, IDProveedor) VALUES (?, ?, ?, ?, ?);');
			
			$Params = parent::TypeParam($oSoftware->getNombreSoftware()) . parent::TypeParam($oSoftware->getDescripcionSoftware()) . parent::TypeParam($oSoftware->getActivo()) . parent::TypeParam($oSoftware->getTipoSoftware()) . parent::TypeParam($oSoftware->getIDProveedor());
			
			$NombreSoftware = $oSoftware->getNombreSoftware();
			$DescripcionSoftware = $oSoftware->getDescripcionSoftware();
			$Activo = $oSoftware->getActivo();
			$TipoSoftware = $oSoftware->getTipoSoftware();
			$IDProveedor = $oSoftware->getIDProveedor();
			
			$STMT->bind_param($Params, $NombreSoftware,  $DescripcionSoftware,  $Activo,  $TipoSoftware,  $IDProveedor);
			
			return parent::CMD($STMT);
		}

		//Update a Software
		public function Update(Software $oSoftware){
			$STMT = parent::PREPARE('UPDATE Software SET NombreSoftware = ?, DescripcionSoftware = ?, Activo = ?, TipoSoftware = ?, IDProveedor = ? WHERE PK_IDSoftware = ?;');
			
			$Params = parent::TypeParam($oSoftware->getNombreSoftware()) . parent::TypeParam($oSoftware->getDescripcionSoftware()) . parent::TypeParam($oSoftware->getActivo()) . parent::TypeParam($oSoftware->getTipoSoftware()) . parent::TypeParam($oSoftware->getIDProveedor()) . parent::TypeParam($oSoftware->getPK_IDSoftware());
			
			$NombreSoftware = $oSoftware->getNombreSoftware();
			$DescripcionSoftware = $oSoftware->getDescripcionSoftware();
			$Activo = $oSoftware->getActivo();
			$TipoSoftware = $oSoftware->getTipoSoftware();
			$IDProveedor = $oSoftware->getIDProveedor();
			$PK_IDSoftware = $oSoftware->getPK_IDSoftware();
			
			$STMT->bind_param($Params, $NombreSoftware,  $DescripcionSoftware,  $Activo,  $TipoSoftware,  $IDProveedor,  $PK_IDSoftware);
			
			return parent::CMD($STMT);
		}

		//Delete a Software
		public function Delete(Software $oSoftware){
			$STMT = parent::PREPARE('DELETE FROM Software WHERE PK_IDSoftware = ?;');
			
			$Params = parent::TypeParam($oSoftware->getPK_IDSoftware());
			
			$PK_IDSoftware = $oSoftware->getPK_IDSoftware();
			
			$STMT->bind_param($Params, $PK_IDSoftware);
			
			return parent::CMD($STMT);
		}

		//Select one Software
		public function SelectByPrimaryKey(Software $oSoftware){
			$STMT = parent::PREPARE('SELECT * FROM Software WHERE PK_IDSoftware = ?;');
			
			$Params = parent::TypeParam($oSoftware->getPK_IDSoftware());
			
			$PK_IDSoftware = $oSoftware->getPK_IDSoftware();
			
			$STMT->bind_param($Params, $PK_IDSoftware);
			
			return parent::FirstOrDefault($STMT);
		}

		//Select all Software
		public function SelectAll(){
			$STMT = parent::PREPARE('SELECT * FROM Software;');
			return parent::SELECT($STMT);
		}

		//Varify if a Software exist
		public function Exists(Software $oSoftware){
			$STMT = parent::PREPARE('SELECT 1 FROM Software WHERE PK_IDSoftware = ? LIMIT 1;');
			
			$Params = parent::TypeParam($oSoftware->getPK_IDSoftware());
			
			$PK_IDSoftware = $oSoftware->getPK_IDSoftware();
			
			$STMT->bind_param($Params, $PK_IDSoftware);
			
			return Count(parent::FirstOrDefault($STMT)) > 0;
		}
	}
}
?>