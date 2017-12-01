<?php
namespace src\Model\DAO{
		/**
		* This class contain all methods to interact with the data base
		* @author lHersey
		* @GitHub http://github.com/lHersey
		*/
	use lib\Model\Databases\MySQL;
	use src\Model\Domain\Tipoincidente;
	class TipoincidenteDAO extends MySQL{

		//Add a Tipoincidente
		public function Add(Tipoincidente $oTipoincidente){
			$STMT = parent::PREPARE('INSERT INTO Tipoincidente(DescripcionTipoIncidente, Activo) VALUES (?, ?);');
			
			$Params = parent::TypeParam($oTipoincidente->getDescripcionTipoIncidente()) . parent::TypeParam($oTipoincidente->getActivo());
			
			$DescripcionTipoIncidente = $oTipoincidente->getDescripcionTipoIncidente();
			$Activo = $oTipoincidente->getActivo();
			
			$STMT->bind_param($Params, $DescripcionTipoIncidente,  $Activo);
			
			return parent::CMD($STMT);
		}

		//Update a Tipoincidente
		public function Update(Tipoincidente $oTipoincidente){
			$STMT = parent::PREPARE('UPDATE Tipoincidente SET DescripcionTipoIncidente = ?, Activo = ? WHERE PK_IDTipoIncidente = ?;');
			
			$Params = parent::TypeParam($oTipoincidente->getDescripcionTipoIncidente()) . parent::TypeParam($oTipoincidente->getActivo()) . parent::TypeParam($oTipoincidente->getPK_IDTipoIncidente());
			
			$DescripcionTipoIncidente = $oTipoincidente->getDescripcionTipoIncidente();
			$Activo = $oTipoincidente->getActivo();
			$PK_IDTipoIncidente = $oTipoincidente->getPK_IDTipoIncidente();
			
			$STMT->bind_param($Params, $DescripcionTipoIncidente,  $Activo,  $PK_IDTipoIncidente);
			
			return parent::CMD($STMT);
		}

		//Delete a Tipoincidente
		public function Delete(Tipoincidente $oTipoincidente){
			$STMT = parent::PREPARE('DELETE FROM Tipoincidente WHERE PK_IDTipoIncidente = ?;');
			
			$Params = parent::TypeParam($oTipoincidente->getPK_IDTipoIncidente());
			
			$PK_IDTipoIncidente = $oTipoincidente->getPK_IDTipoIncidente();
			
			$STMT->bind_param($Params, $PK_IDTipoIncidente);
			
			return parent::CMD($STMT);
		}

		//Select one Tipoincidente
		public function SelectByPrimaryKey(Tipoincidente $oTipoincidente){
			$STMT = parent::PREPARE('SELECT * FROM Tipoincidente WHERE PK_IDTipoIncidente = ?;');
			
			$Params = parent::TypeParam($oTipoincidente->getPK_IDTipoIncidente());
			
			$PK_IDTipoIncidente = $oTipoincidente->getPK_IDTipoIncidente();
			
			$STMT->bind_param($Params, $PK_IDTipoIncidente);
			
			return parent::FirstOrDefault($STMT);
		}

		//Select all Tipoincidente
		public function SelectAll(){
			$STMT = parent::PREPARE('SELECT * FROM Tipoincidente;');
			return parent::SELECT($STMT);
		}

		//Varify if a Tipoincidente exist
		public function Exists(Tipoincidente $oTipoincidente){
			$STMT = parent::PREPARE('SELECT 1 FROM Tipoincidente WHERE PK_IDTipoIncidente = ? LIMIT 1;');
			
			$Params = parent::TypeParam($oTipoincidente->getPK_IDTipoIncidente());
			
			$PK_IDTipoIncidente = $oTipoincidente->getPK_IDTipoIncidente();
			
			$STMT->bind_param($Params, $PK_IDTipoIncidente);
			
			return Count(parent::FirstOrDefault($STMT)) > 0;
		}
	}
}
?>