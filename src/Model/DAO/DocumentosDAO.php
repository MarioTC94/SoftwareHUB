<?php
namespace Asphyo\src\Model\DAO{
		/**
		* This class contain all methods to interact with the data base
		* @author lHersey
		* @GitHub http://Github.com/lHersey
		*/
	use Asphyo\bin\Model\Databases\MySQL;
	use Asphyo\src\Model\Domain\Documentos;
	class DocumentosDAO extends MySQL{

		//Add a Documentos
		public function Add(Documentos $oDocumentos){
			$STMT = parent::PREPARE('INSERT INTO Documentos(DescripcionDocumentos, Documento, Incidente, Activo) VALUES (?, ?, ?, ?);');
			
			$Params = parent::TypeParam($oDocumentos->getDescripcionDocumentos()) . parent::TypeParam($oDocumentos->getDocumento()) . parent::TypeParam($oDocumentos->getIncidente()) . parent::TypeParam($oDocumentos->getActivo());
			
			$DescripcionDocumentos = $oDocumentos->getDescripcionDocumentos();
			$Documento = $oDocumentos->getDocumento();
			$Incidente = $oDocumentos->getIncidente();
			$Activo = $oDocumentos->getActivo();
			
			$STMT->bind_param($Params, $DescripcionDocumentos,  $Documento,  $Incidente,  $Activo);
			
			return parent::CMD($STMT);
		}

		//Update a Documentos
		public function Update(Documentos $oDocumentos){
			$STMT = parent::PREPARE('UPDATE Documentos SET DescripcionDocumentos = ?, Documento = ?, Incidente = ?, Activo = ? WHERE PK_IDDocumentos = ?;');
			
			$Params = parent::TypeParam($oDocumentos->getDescripcionDocumentos()) . parent::TypeParam($oDocumentos->getDocumento()) . parent::TypeParam($oDocumentos->getIncidente()) . parent::TypeParam($oDocumentos->getActivo()) . parent::TypeParam($oDocumentos->getPK_IDDocumentos());
			
			$DescripcionDocumentos = $oDocumentos->getDescripcionDocumentos();
			$Documento = $oDocumentos->getDocumento();
			$Incidente = $oDocumentos->getIncidente();
			$Activo = $oDocumentos->getActivo();
			$PK_IDDocumentos = $oDocumentos->getPK_IDDocumentos();
			
			$STMT->bind_param($Params, $DescripcionDocumentos,  $Documento,  $Incidente,  $Activo,  $PK_IDDocumentos);
			
			return parent::CMD($STMT);
		}

		//Delete a Documentos
		public function Delete(Documentos $oDocumentos){
			$STMT = parent::PREPARE('DELETE FROM Documentos WHERE PK_IDDocumentos = ?;');
			
			$Params = parent::TypeParam($oDocumentos->getPK_IDDocumentos());
			
			$PK_IDDocumentos = $oDocumentos->getPK_IDDocumentos();
			
			$STMT->bind_param($Params, $PK_IDDocumentos);
			
			return parent::CMD($STMT);
		}

		//Select one Documentos
		public function SelectByPrimaryKey(Documentos $oDocumentos){
			$STMT = parent::PREPARE('SELECT * FROM Documentos WHERE PK_IDDocumentos = ?;');
			
			$Params = parent::TypeParam($oDocumentos->getPK_IDDocumentos());
			
			$PK_IDDocumentos = $oDocumentos->getPK_IDDocumentos();
			
			$STMT->bind_param($Params, $PK_IDDocumentos);
			
			return parent::FirstOrDefault($STMT);
		}

		//Select all Documentos
		public function SelectAll(){
			$STMT = parent::PREPARE('SELECT * FROM Documentos;');
			return parent::SELECT($STMT);
		}

		//Varify if a Documentos exist
		public function Exists(Documentos $oDocumentos){
			$STMT = parent::PREPARE('SELECT EXISTS(SELECT 1 FROM Documentos WHERE PK_IDDocumentos = ? LIMIT 1);');
			
			$Params = parent::TypeParam($oDocumentos->getPK_IDDocumentos());
			
			$PK_IDDocumentos = $oDocumentos->getPK_IDDocumentos();
			
			$STMT->bind_param($Params, $PK_IDDocumentos);
			
			return parent::FirstOrDefault($STMT)->Count() > 0;
		}
	}
}
?>