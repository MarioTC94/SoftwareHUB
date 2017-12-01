<?php
namespace Asphyo\src\Model\DAO{
		/**
		* This class contain all methods to interact with the data base
		* @author lHersey
		* @GitHub http://Github.com/lHersey
		*/
	use Asphyo\bin\Model\Databases\MySQL;
	use Asphyo\src\Model\Domain\Usuario;
	class UsuarioDAO extends MySQL{

		//Add a Usuario
		public function Add(Usuario $oUsuario){
			$STMT = parent::PREPARE('INSERT INTO Usuario(NombreUsuario, Apellido, FechaNacimiento, Contrasena, Salt, Activo, ImagenUsuario, IDRol, Bitacora) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);');
			
			$Params = parent::TypeParam($oUsuario->getNombreUsuario()) . parent::TypeParam($oUsuario->getApellido()) . parent::TypeParam($oUsuario->getFechaNacimiento()) . parent::TypeParam($oUsuario->getContrasena()) . parent::TypeParam($oUsuario->getSalt()) . parent::TypeParam($oUsuario->getActivo()) . parent::TypeParam($oUsuario->getImagenUsuario()) . parent::TypeParam($oUsuario->getIDRol()) . parent::TypeParam($oUsuario->getBitacora());
			
			$NombreUsuario = $oUsuario->getNombreUsuario();
			$Apellido = $oUsuario->getApellido();
			$FechaNacimiento = $oUsuario->getFechaNacimiento();
			$Contrasena = $oUsuario->getContrasena();
			$Salt = $oUsuario->getSalt();
			$Activo = $oUsuario->getActivo();
			$ImagenUsuario = $oUsuario->getImagenUsuario();
			$IDRol = $oUsuario->getIDRol();
			$Bitacora = $oUsuario->getBitacora();
			
			$STMT->bind_param($Params, $NombreUsuario,  $Apellido,  $FechaNacimiento,  $Contrasena,  $Salt,  $Activo,  $ImagenUsuario,  $IDRol,  $Bitacora);
			
			return parent::CMD($STMT);
		}

		//Update a Usuario
		public function Update(Usuario $oUsuario){
			$STMT = parent::PREPARE('UPDATE Usuario SET NombreUsuario = ?, Apellido = ?, FechaNacimiento = ?, Contrasena = ?, Salt = ?, Activo = ?, ImagenUsuario = ?, IDRol = ?, Bitacora = ? WHERE PK_Correo = ?;');
			
			$Params = parent::TypeParam($oUsuario->getNombreUsuario()) . parent::TypeParam($oUsuario->getApellido()) . parent::TypeParam($oUsuario->getFechaNacimiento()) . parent::TypeParam($oUsuario->getContrasena()) . parent::TypeParam($oUsuario->getSalt()) . parent::TypeParam($oUsuario->getActivo()) . parent::TypeParam($oUsuario->getImagenUsuario()) . parent::TypeParam($oUsuario->getIDRol()) . parent::TypeParam($oUsuario->getBitacora()) . parent::TypeParam($oUsuario->getPK_Correo());
			
			$NombreUsuario = $oUsuario->getNombreUsuario();
			$Apellido = $oUsuario->getApellido();
			$FechaNacimiento = $oUsuario->getFechaNacimiento();
			$Contrasena = $oUsuario->getContrasena();
			$Salt = $oUsuario->getSalt();
			$Activo = $oUsuario->getActivo();
			$ImagenUsuario = $oUsuario->getImagenUsuario();
			$IDRol = $oUsuario->getIDRol();
			$Bitacora = $oUsuario->getBitacora();
			$PK_Correo = $oUsuario->getPK_Correo();
			
			$STMT->bind_param($Params, $NombreUsuario,  $Apellido,  $FechaNacimiento,  $Contrasena,  $Salt,  $Activo,  $ImagenUsuario,  $IDRol,  $Bitacora,  $PK_Correo);
			
			return parent::CMD($STMT);
		}

		//Delete a Usuario
		public function Delete(Usuario $oUsuario){
			$STMT = parent::PREPARE('DELETE FROM Usuario WHERE PK_Correo = ?;');
			
			$Params = parent::TypeParam($oUsuario->getPK_Correo());
			
			$PK_Correo = $oUsuario->getPK_Correo();
			
			$STMT->bind_param($Params, $PK_Correo);
			
			return parent::CMD($STMT);
		}

		//Select one Usuario
		public function SelectByPrimaryKey(Usuario $oUsuario){
			$STMT = parent::PREPARE('SELECT * FROM Usuario WHERE PK_Correo = ?;');
			
			$Params = parent::TypeParam($oUsuario->getPK_Correo());
			
			$PK_Correo = $oUsuario->getPK_Correo();
			
			$STMT->bind_param($Params, $PK_Correo);
			
			return parent::FirstOrDefault($STMT);
		}

		//Select all Usuario
		public function SelectAll(){
			$STMT = parent::PREPARE('SELECT * FROM Usuario;');
			return parent::SELECT($STMT);
		}

		//Varify if a Usuario exist
		public function Exists(Usuario $oUsuario){
			$STMT = parent::PREPARE('SELECT EXISTS(SELECT 1 FROM Usuario WHERE PK_Correo = ? LIMIT 1);');
			
			$Params = parent::TypeParam($oUsuario->getPK_Correo());
			
			$PK_Correo = $oUsuario->getPK_Correo();
			
			$STMT->bind_param($Params, $PK_Correo);
			
			return parent::FirstOrDefault($STMT)->Count() > 0;
		}
	}
}
?>