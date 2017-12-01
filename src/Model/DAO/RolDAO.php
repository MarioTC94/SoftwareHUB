<?php
namespace Asphyo\src\Model\DAO{
		/**
		* This class contain all methods to interact with the data base
		* @author lHersey
		* @GitHub http://Github.com/lHersey
		*/
	use Asphyo\bin\Model\Databases\MySQL;
	use Asphyo\src\Model\Domain\Rol;
	class RolDAO extends MySQL{

		//Add a Rol
		public function Add(Rol $oRol){
			$STMT = parent::PREPARE('INSERT INTO Rol(DescripcionRol, Activo) VALUES (?, ?);');
			
			$Params = parent::TypeParam($oRol->getDescripcionRol()) . parent::TypeParam($oRol->getActivo());
			
			$DescripcionRol = $oRol->getDescripcionRol();
			$Activo = $oRol->getActivo();
			
			$STMT->bind_param($Params, $DescripcionRol,  $Activo);
			
			return parent::CMD($STMT);
		}

		//Update a Rol
		public function Update(Rol $oRol){
			$STMT = parent::PREPARE('UPDATE Rol SET DescripcionRol = ?, Activo = ? WHERE PK_IDROL = ?;');
			
			$Params = parent::TypeParam($oRol->getDescripcionRol()) . parent::TypeParam($oRol->getActivo()) . parent::TypeParam($oRol->getPK_IDROL());
			
			$DescripcionRol = $oRol->getDescripcionRol();
			$Activo = $oRol->getActivo();
			$PK_IDROL = $oRol->getPK_IDROL();
			
			$STMT->bind_param($Params, $DescripcionRol,  $Activo,  $PK_IDROL);
			
			return parent::CMD($STMT);
		}

		//Delete a Rol
		public function Delete(Rol $oRol){
			$STMT = parent::PREPARE('DELETE FROM Rol WHERE PK_IDROL = ?;');
			
			$Params = parent::TypeParam($oRol->getPK_IDROL());
			
			$PK_IDROL = $oRol->getPK_IDROL();
			
			$STMT->bind_param($Params, $PK_IDROL);
			
			return parent::CMD($STMT);
		}

		//Select one Rol
		public function SelectByPrimaryKey(Rol $oRol){
			$STMT = parent::PREPARE('SELECT * FROM Rol WHERE PK_IDROL = ?;');
			
			$Params = parent::TypeParam($oRol->getPK_IDROL());
			
			$PK_IDROL = $oRol->getPK_IDROL();
			
			$STMT->bind_param($Params, $PK_IDROL);
			
			return parent::FirstOrDefault($STMT);
		}

		//Select all Rol
		public function SelectAll(){
			$STMT = parent::PREPARE('SELECT * FROM Rol;');
			return parent::SELECT($STMT);
		}

		//Varify if a Rol exist
		public function Exists(Rol $oRol){
			$STMT = parent::PREPARE('SELECT EXISTS(SELECT 1 FROM Rol WHERE PK_IDROL = ? LIMIT 1);');
			
			$Params = parent::TypeParam($oRol->getPK_IDROL());
			
			$PK_IDROL = $oRol->getPK_IDROL();
			
			$STMT->bind_param($Params, $PK_IDROL);
			
			return parent::FirstOrDefault($STMT)->Count() > 0;
		}
	}
}
?>