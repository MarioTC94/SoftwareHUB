<?php
namespace src\Model\DAO{
		/**
		* This class contain all methods to interact with the data base
		* @author lHersey
		* @GitHub http://github.com/lHersey
		*/
	use lib\Model\Databases\MySQL;
	use src\Model\Domain\Comentarios;
	class ComentariosDAO extends MySQL{

		//Add a Comentarios
		public function Add(Comentarios $oComentarios){
			$STMT = parent::PREPARE('INSERT INTO Comentarios(DescripcionComentario, Incidente, Usuario, Activo, FechaComentario) VALUES (?, ?, ?, ?, ?);');
			
			$Params = parent::TypeParam($oComentarios->getDescripcionComentario()) . parent::TypeParam($oComentarios->getIncidente()) . parent::TypeParam($oComentarios->getUsuario()) . parent::TypeParam($oComentarios->getActivo()) . parent::TypeParam($oComentarios->getFechaComentario());
			
			$DescripcionComentario = $oComentarios->getDescripcionComentario();
			$Incidente = $oComentarios->getIncidente();
			$Usuario = $oComentarios->getUsuario();
			$Activo = $oComentarios->getActivo();
			$FechaComentario = $oComentarios->getFechaComentario();
			
			$STMT->bind_param($Params, $DescripcionComentario,  $Incidente,  $Usuario,  $Activo,  $FechaComentario);
			
			return parent::CMD($STMT);
		}

		//Update a Comentarios
		public function Update(Comentarios $oComentarios){
			$STMT = parent::PREPARE('UPDATE Comentarios SET DescripcionComentario = ?, Incidente = ?, Usuario = ?, Activo = ?, FechaComentario = ? WHERE PK_IDComentarios = ?;');
			
			$Params = parent::TypeParam($oComentarios->getDescripcionComentario()) . parent::TypeParam($oComentarios->getIncidente()) . parent::TypeParam($oComentarios->getUsuario()) . parent::TypeParam($oComentarios->getActivo()) . parent::TypeParam($oComentarios->getFechaComentario()) . parent::TypeParam($oComentarios->getPK_IDComentarios());
			
			$DescripcionComentario = $oComentarios->getDescripcionComentario();
			$Incidente = $oComentarios->getIncidente();
			$Usuario = $oComentarios->getUsuario();
			$Activo = $oComentarios->getActivo();
			$FechaComentario = $oComentarios->getFechaComentario();
			$PK_IDComentarios = $oComentarios->getPK_IDComentarios();
			
			$STMT->bind_param($Params, $DescripcionComentario,  $Incidente,  $Usuario,  $Activo,  $FechaComentario,  $PK_IDComentarios);
			
			return parent::CMD($STMT);
		}

		//Delete a Comentarios
		public function Delete(Comentarios $oComentarios){
			$STMT = parent::PREPARE('DELETE FROM Comentarios WHERE PK_IDComentarios = ?;');
			
			$Params = parent::TypeParam($oComentarios->getPK_IDComentarios());
			
			$PK_IDComentarios = $oComentarios->getPK_IDComentarios();
			
			$STMT->bind_param($Params, $PK_IDComentarios);
			
			return parent::CMD($STMT);
		}

		//Select one Comentarios
		public function SelectByPrimaryKey(Comentarios $oComentarios){
			$STMT = parent::PREPARE('SELECT * FROM Comentarios WHERE PK_IDComentarios = ?;');
			
			$Params = parent::TypeParam($oComentarios->getPK_IDComentarios());
			
			$PK_IDComentarios = $oComentarios->getPK_IDComentarios();
			
			$STMT->bind_param($Params, $PK_IDComentarios);
			
			return parent::FirstOrDefault($STMT);
		}

		//Select all Comentarios
		public function SelectAll(){
			$STMT = parent::PREPARE('SELECT * FROM Comentarios;');
			return parent::SELECT($STMT);
		}

		//Varify if a Comentarios exist
		public function Exists(Comentarios $oComentarios){
			$STMT = parent::PREPARE('SELECT 1 FROM Comentarios WHERE PK_IDComentarios = ? LIMIT 1;');
			
			$Params = parent::TypeParam($oComentarios->getPK_IDComentarios());
			
			$PK_IDComentarios = $oComentarios->getPK_IDComentarios();
			
			$STMT->bind_param($Params, $PK_IDComentarios);
			
			return Count(parent::FirstOrDefault($STMT)) > 0;
		}
	}
}
?>