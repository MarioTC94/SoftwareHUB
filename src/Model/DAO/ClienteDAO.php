<?php
namespace Asphyo\src\Model\DAO{
		/**
		* This class contain all methods to interact with the data base
		* @author lHersey
		* @GitHub http://Github.com/lHersey
		*/
	use Asphyo\bin\Model\Databases\MySQL;
	use Asphyo\src\Model\Domain\Cliente;
	class ClienteDAO extends MySQL{

		//Add a Cliente
		public function Add(Cliente $oCliente){
			$STMT = parent::PREPARE('INSERT INTO Cliente(Activo) VALUES (?);');
			
			$Params = parent::TypeParam($oCliente->getActivo());
			
			$Activo = $oCliente->getActivo();
			
			$STMT->bind_param($Params, $Activo);
			
			return parent::CMD($STMT);
		}

		//Update a Cliente
		public function Update(Cliente $oCliente){
			$STMT = parent::PREPARE('UPDATE Cliente SET Activo = ? WHERE PK_IDCorreo = ?;');
			
			$Params = parent::TypeParam($oCliente->getActivo()) . parent::TypeParam($oCliente->getPK_IDCorreo());
			
			$Activo = $oCliente->getActivo();
			$PK_IDCorreo = $oCliente->getPK_IDCorreo();
			
			$STMT->bind_param($Params, $Activo,  $PK_IDCorreo);
			
			return parent::CMD($STMT);
		}

		//Delete a Cliente
		public function Delete(Cliente $oCliente){
			$STMT = parent::PREPARE('DELETE FROM Cliente WHERE PK_IDCorreo = ?;');
			
			$Params = parent::TypeParam($oCliente->getPK_IDCorreo());
			
			$PK_IDCorreo = $oCliente->getPK_IDCorreo();
			
			$STMT->bind_param($Params, $PK_IDCorreo);
			
			return parent::CMD($STMT);
		}

		//Select one Cliente
		public function SelectByPrimaryKey(Cliente $oCliente){
			$STMT = parent::PREPARE('SELECT * FROM Cliente WHERE PK_IDCorreo = ?;');
			
			$Params = parent::TypeParam($oCliente->getPK_IDCorreo());
			
			$PK_IDCorreo = $oCliente->getPK_IDCorreo();
			
			$STMT->bind_param($Params, $PK_IDCorreo);
			
			return parent::FirstOrDefault($STMT);
		}

		//Select all Cliente
		public function SelectAll(){
			$STMT = parent::PREPARE('SELECT * FROM Cliente;');
			return parent::SELECT($STMT);
		}

		//Varify if a Cliente exist
		public function Exists(Cliente $oCliente){
			$STMT = parent::PREPARE('SELECT EXISTS(SELECT 1 FROM Cliente WHERE PK_IDCorreo = ? LIMIT 1);');
			
			$Params = parent::TypeParam($oCliente->getPK_IDCorreo());
			
			$PK_IDCorreo = $oCliente->getPK_IDCorreo();
			
			$STMT->bind_param($Params, $PK_IDCorreo);
			
			return parent::FirstOrDefault($STMT)->Count() > 0;
		}
	}
}
?>