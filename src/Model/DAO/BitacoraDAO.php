<?php
namespace Asphyo\src\Model\DAO{
		/**
		* This class contain all methods to interact with the data base
		* @author lHersey
		* @GitHub http://Github.com/lHersey
		*/
	use Asphyo\bin\Model\Databases\MySQL;
	use Asphyo\src\Model\Domain\Bitacora;
	class BitacoraDAO extends MySQL{

		//Add a Bitacora
		public function Add(Bitacora $oBitacora){
			$STMT = parent::PREPARE('INSERT INTO Bitacora(DescripcionBitacora, FechaDeterminada, Activo) VALUES (?, ?, ?);');
			
			$Params = parent::TypeParam($oBitacora->getDescripcionBitacora()) . parent::TypeParam($oBitacora->getFechaDeterminada()) . parent::TypeParam($oBitacora->getActivo());
			
			$DescripcionBitacora = $oBitacora->getDescripcionBitacora();
			$FechaDeterminada = $oBitacora->getFechaDeterminada();
			$Activo = $oBitacora->getActivo();
			
			$STMT->bind_param($Params, $DescripcionBitacora,  $FechaDeterminada,  $Activo);
			
			return parent::CMD($STMT);
		}

		//Update a Bitacora
		public function Update(Bitacora $oBitacora){
			$STMT = parent::PREPARE('UPDATE Bitacora SET DescripcionBitacora = ?, FechaDeterminada = ?, Activo = ? WHERE PK_Bitacora = ?;');
			
			$Params = parent::TypeParam($oBitacora->getDescripcionBitacora()) . parent::TypeParam($oBitacora->getFechaDeterminada()) . parent::TypeParam($oBitacora->getActivo()) . parent::TypeParam($oBitacora->getPK_Bitacora());
			
			$DescripcionBitacora = $oBitacora->getDescripcionBitacora();
			$FechaDeterminada = $oBitacora->getFechaDeterminada();
			$Activo = $oBitacora->getActivo();
			$PK_Bitacora = $oBitacora->getPK_Bitacora();
			
			$STMT->bind_param($Params, $DescripcionBitacora,  $FechaDeterminada,  $Activo,  $PK_Bitacora);
			
			return parent::CMD($STMT);
		}

		//Delete a Bitacora
		public function Delete(Bitacora $oBitacora){
			$STMT = parent::PREPARE('DELETE FROM Bitacora WHERE PK_Bitacora = ?;');
			
			$Params = parent::TypeParam($oBitacora->getPK_Bitacora());
			
			$PK_Bitacora = $oBitacora->getPK_Bitacora();
			
			$STMT->bind_param($Params, $PK_Bitacora);
			
			return parent::CMD($STMT);
		}

		//Select one Bitacora
		public function SelectByPrimaryKey(Bitacora $oBitacora){
			$STMT = parent::PREPARE('SELECT * FROM Bitacora WHERE PK_Bitacora = ?;');
			
			$Params = parent::TypeParam($oBitacora->getPK_Bitacora());
			
			$PK_Bitacora = $oBitacora->getPK_Bitacora();
			
			$STMT->bind_param($Params, $PK_Bitacora);
			
			return parent::FirstOrDefault($STMT);
		}

		//Select all Bitacora
		public function SelectAll(){
			$STMT = parent::PREPARE('SELECT * FROM Bitacora;');
			return parent::SELECT($STMT);
		}

		//Varify if a Bitacora exist
		public function Exists(Bitacora $oBitacora){
			$STMT = parent::PREPARE('SELECT EXISTS(SELECT 1 FROM Bitacora WHERE PK_Bitacora = ? LIMIT 1);');
			
			$Params = parent::TypeParam($oBitacora->getPK_Bitacora());
			
			$PK_Bitacora = $oBitacora->getPK_Bitacora();
			
			$STMT->bind_param($Params, $PK_Bitacora);
			
			return parent::FirstOrDefault($STMT)->Count() > 0;
		}
	}
}
?>