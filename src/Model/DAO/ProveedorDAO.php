<?php
namespace src\Model\DAO{
		/**
		* This class contain all methods to interact with the data base
		* @author lHersey
		* @GitHub http://github.com/lHersey
		*/
	use lib\Model\Databases\MySQL;
	use src\Model\Domain\Proveedor;
	class ProveedorDAO extends MySQL{

		//Add a Proveedor
		public function Add(Proveedor $oProveedor){
			$STMT = parent::PREPARE('INSERT INTO Proveedor(Activo, PK_IDCorreo) VALUES (?, ?);');
			
			$Params = parent::TypeParam($oProveedor->getActivo()) . parent::TypeParam($oProveedor->getPK_IDCorreo());
			
			$Activo = $oProveedor->getActivo();
			$PK_IDCorreo = $oProveedor->getPK_IDCorreo();
			
			$STMT->bind_param($Params, $Activo,  $PK_IDCorreo);
			
			return parent::CMD($STMT);
		}

		//Update a Proveedor
		public function Update(Proveedor $oProveedor){
			$STMT = parent::PREPARE('UPDATE Proveedor SET Activo = ? WHERE PK_IDCorreo = ?;');
			
			$Params = parent::TypeParam($oProveedor->getActivo()) . parent::TypeParam($oProveedor->getPK_IDCorreo());
			
			$Activo = $oProveedor->getActivo();
			$PK_IDCorreo = $oProveedor->getPK_IDCorreo();
			
			$STMT->bind_param($Params, $Activo,  $PK_IDCorreo);
			
			return parent::CMD($STMT);
		}

		//Delete a Proveedor
		public function Delete(Proveedor $oProveedor){
			$STMT = parent::PREPARE('DELETE FROM Proveedor WHERE PK_IDCorreo = ?;');
			
			$Params = parent::TypeParam($oProveedor->getPK_IDCorreo());
			
			$PK_IDCorreo = $oProveedor->getPK_IDCorreo();
			
			$STMT->bind_param($Params, $PK_IDCorreo);
			
			return parent::CMD($STMT);
		}

		//Select one Proveedor
		public function SelectByPrimaryKey(Proveedor $oProveedor){
			$STMT = parent::PREPARE('SELECT * FROM Proveedor WHERE PK_IDCorreo = ?;');
			
			$Params = parent::TypeParam($oProveedor->getPK_IDCorreo());
			
			$PK_IDCorreo = $oProveedor->getPK_IDCorreo();
			
			$STMT->bind_param($Params, $PK_IDCorreo);
			
			return parent::FirstOrDefault($STMT);
		}

		//Select all Proveedor
		public function SelectAll(){
			$STMT = parent::PREPARE('SELECT * FROM Proveedor;');
			return parent::SELECT($STMT);
		}

		//Varify if a Proveedor exist
		public function Exists(Proveedor $oProveedor){
			$STMT = parent::PREPARE('SELECT 1 FROM Proveedor WHERE PK_IDCorreo = ? LIMIT 1;');
			
			$Params = parent::TypeParam($oProveedor->getPK_IDCorreo());
			
			$PK_IDCorreo = $oProveedor->getPK_IDCorreo();
			
			$STMT->bind_param($Params, $PK_IDCorreo);
			
			return Count(parent::FirstOrDefault($STMT)) > 0;
		}
	}
}
?>