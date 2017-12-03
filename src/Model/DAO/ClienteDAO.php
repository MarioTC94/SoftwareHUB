<?php
namespace src\Model\DAO{
		/**
		* This class contain all methods to interact with the data base
		* @author lHersey
		* @GitHub http://github.com/lHersey
		*/
	use lib\Model\Databases\MySQL;
	use src\Model\Domain\Cliente;
	class ClienteDAO extends MySQL{

		//Add a Cliente
		public function Add(Cliente $oCliente){
			$STMT = parent::PREPARE('INSERT INTO Cliente(Nombre, Apellido, FechaNacimiento, Activo, PK_IDCliente) VALUES (?, ?, ?, ?, ?);');
			
			$Params = parent::TypeParam($oCliente->getNombre()) . parent::TypeParam($oCliente->getApellido()) . parent::TypeParam($oCliente->getFechaNacimiento()) . parent::TypeParam($oCliente->getActivo()) . parent::TypeParam($oCliente->getPK_IDCliente());
			
			$Nombre = $oCliente->getNombre();
			$Apellido = $oCliente->getApellido();
			$FechaNacimiento = $oCliente->getFechaNacimiento();
			$Activo = $oCliente->getActivo();
			$PK_IDCliente = $oCliente->getPK_IDCliente();
			
			$STMT->bind_param($Params, $Nombre,  $Apellido,  $FechaNacimiento,  $Activo,  $PK_IDCliente);
			
			return parent::CMD($STMT);
		}

		//Update a Cliente
		public function Update(Cliente $oCliente){
			$STMT = parent::PREPARE('UPDATE Cliente SET Nombre = ?, Apellido = ?, FechaNacimiento = ?, Activo = ? WHERE PK_IDCliente = ?;');
			
			$Params = parent::TypeParam($oCliente->getNombre()) . parent::TypeParam($oCliente->getApellido()) . parent::TypeParam($oCliente->getFechaNacimiento()) . parent::TypeParam($oCliente->getActivo()) . parent::TypeParam($oCliente->getPK_IDCliente());
			
			$Nombre = $oCliente->getNombre();
			$Apellido = $oCliente->getApellido();
			$FechaNacimiento = $oCliente->getFechaNacimiento();
			$Activo = $oCliente->getActivo();
			$PK_IDCliente = $oCliente->getPK_IDCliente();
			
			$STMT->bind_param($Params, $Nombre,  $Apellido,  $FechaNacimiento,  $Activo,  $PK_IDCliente);
			
			return parent::CMD($STMT);
		}

		//Delete a Cliente
		public function Delete(Cliente $oCliente){
			$STMT = parent::PREPARE('DELETE FROM Cliente WHERE PK_IDCliente = ?;');
			
			$Params = parent::TypeParam($oCliente->getPK_IDCliente());
			
			$PK_IDCliente = $oCliente->getPK_IDCliente();
			
			$STMT->bind_param($Params, $PK_IDCliente);
			
			return parent::CMD($STMT);
		}

		//Select one Cliente
		public function SelectByPrimaryKey(Cliente $oCliente){
			$STMT = parent::PREPARE('SELECT * FROM Cliente WHERE PK_IDCliente = ?;');
			
			$Params = parent::TypeParam($oCliente->getPK_IDCliente());
			
			$PK_IDCliente = $oCliente->getPK_IDCliente();
			
			$STMT->bind_param($Params, $PK_IDCliente);
			
			return parent::FirstOrDefault($STMT);
		}

		//Select all Cliente
		public function SelectAll(){
			$STMT = parent::PREPARE('SELECT * FROM Cliente;');
			return parent::SELECT($STMT);
		}

		//Varify if a Cliente exist
		public function Exists(Cliente $oCliente){
			$STMT = parent::PREPARE('SELECT 1 FROM Cliente WHERE PK_IDCliente = ? LIMIT 1;');
			
			$Params = parent::TypeParam($oCliente->getPK_IDCliente());
			
			$PK_IDCliente = $oCliente->getPK_IDCliente();
			
			$STMT->bind_param($Params, $PK_IDCliente);
			
			return Count(parent::FirstOrDefault($STMT)) > 0;
		}
	}
}
?>