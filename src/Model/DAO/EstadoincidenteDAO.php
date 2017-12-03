<?php
namespace src\Model\DAO{
		/**
		* This class contain all methods to interact with the data base
		* @author lHersey
		* @GitHub http://github.com/lHersey
		*/
	use lib\Model\Databases\MySQL;
	use src\Model\Domain\Estadoincidente;
	class EstadoincidenteDAO extends MySQL{

		//Add a Estadoincidente
		public function Add(Estadoincidente $oEstadoincidente){
			$STMT = parent::PREPARE('INSERT INTO Estadoincidente(DescripcionEstadoIncidente) VALUES (?);');
			
			$Params = parent::TypeParam($oEstadoincidente->getDescripcionEstadoIncidente());
			
			$DescripcionEstadoIncidente = $oEstadoincidente->getDescripcionEstadoIncidente();
			
			$STMT->bind_param($Params, $DescripcionEstadoIncidente);
			
			return parent::CMD($STMT);
		}

		//Update a Estadoincidente
		public function Update(Estadoincidente $oEstadoincidente){
			$STMT = parent::PREPARE('UPDATE Estadoincidente SET DescripcionEstadoIncidente = ? WHERE PK_IDEstadoIncidente = ?;');
			
			$Params = parent::TypeParam($oEstadoincidente->getDescripcionEstadoIncidente()) . parent::TypeParam($oEstadoincidente->getPK_IDEstadoIncidente());
			
			$DescripcionEstadoIncidente = $oEstadoincidente->getDescripcionEstadoIncidente();
			$PK_IDEstadoIncidente = $oEstadoincidente->getPK_IDEstadoIncidente();
			
			$STMT->bind_param($Params, $DescripcionEstadoIncidente,  $PK_IDEstadoIncidente);
			
			return parent::CMD($STMT);
		}

		//Delete a Estadoincidente
		public function Delete(Estadoincidente $oEstadoincidente){
			$STMT = parent::PREPARE('DELETE FROM Estadoincidente WHERE PK_IDEstadoIncidente = ?;');
			
			$Params = parent::TypeParam($oEstadoincidente->getPK_IDEstadoIncidente());
			
			$PK_IDEstadoIncidente = $oEstadoincidente->getPK_IDEstadoIncidente();
			
			$STMT->bind_param($Params, $PK_IDEstadoIncidente);
			
			return parent::CMD($STMT);
		}

		//Select one Estadoincidente
		public function SelectByPrimaryKey(Estadoincidente $oEstadoincidente){
			$STMT = parent::PREPARE('SELECT * FROM Estadoincidente WHERE PK_IDEstadoIncidente = ?;');
			
			$Params = parent::TypeParam($oEstadoincidente->getPK_IDEstadoIncidente());
			
			$PK_IDEstadoIncidente = $oEstadoincidente->getPK_IDEstadoIncidente();
			
			$STMT->bind_param($Params, $PK_IDEstadoIncidente);
			
			return parent::FirstOrDefault($STMT);
		}

		//Select all Estadoincidente
		public function SelectAll(){
			$STMT = parent::PREPARE('SELECT * FROM Estadoincidente;');
			return parent::SELECT($STMT);
		}

		//Varify if a Estadoincidente exist
		public function Exists(Estadoincidente $oEstadoincidente){
			$STMT = parent::PREPARE('SELECT 1 FROM Estadoincidente WHERE PK_IDEstadoIncidente = ? LIMIT 1;');
			
			$Params = parent::TypeParam($oEstadoincidente->getPK_IDEstadoIncidente());
			
			$PK_IDEstadoIncidente = $oEstadoincidente->getPK_IDEstadoIncidente();
			
			$STMT->bind_param($Params, $PK_IDEstadoIncidente);
			
			return Count(parent::FirstOrDefault($STMT)) > 0;
		}
	}
}
?>