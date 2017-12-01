<?php
namespace Asphyo\src\Model\DAO {
	/**
	 * This class contain all methods to interact with the data base
	 * @author lHersey
	 * @GitHub http://Github.com/lHersey
	 */
	use Asphyo\bin\Model\Databases\MySQL;
	use Asphyo\src\Model\Domain\Usuario;

	class UsuarioDAO extends MySQL
	{

		//Add a Usuario
		public function Add(Usuario $oUsuario)
		{
			$STMT = parent::PREPARE('INSERT INTO Usuario(NombreUsuario, Nombre, Apellido, FechaNacimiento, Contrasena, Salt, Activo, IDRol, PK_Correo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);');

			$Params = parent::TypeParam($oUsuario->getNombreUsuario()) . parent::TypeParam($oUsuario->getNombre()) . parent::TypeParam($oUsuario->getApellido()) . parent::TypeParam($oUsuario->getFechaNacimiento()) . parent::TypeParam($oUsuario->getContrasena()) . parent::TypeParam($oUsuario->getSalt()) . parent::TypeParam($oUsuario->getActivo()) . parent::TypeParam($oUsuario->getIDRol()) . parent::TypeParam($oUsuario->getPK_Correo());

			$NombreUsuario = $oUsuario->getNombreUsuario();
			$Nombre = $oUsuario->getNombre();
			$Apellido = $oUsuario->getApellido();
			$FechaNacimiento = $oUsuario->getFechaNacimiento();
			$Contrasena = $oUsuario->getContrasena();
			$Salt = $oUsuario->getSalt();
			$Activo = $oUsuario->getActivo();
			$IDRol = $oUsuario->getIDRol();
			$PK_Correo = $oUsuario->getPK_Correo();

			$STMT->bind_param($Params, $NombreUsuario, $Nombre, $Apellido, $FechaNacimiento, $Contrasena, $Salt, $Activo, $IDRol, $PK_Correo);

			return parent::CMD($STMT);
		}

		//Update a Usuario
		public function Update(Usuario $oUsuario)
		{
			$STMT = parent::PREPARE('UPDATE Usuario SET NombreUsuario = ?, Nombre = ?, Apellido = ?, FechaNacimiento = ?, Contrasena = ?, Salt = ?, Activo = ?, IDRol = ? WHERE PK_Correo = ?;');

			$Params = parent::TypeParam($oUsuario->getNombreUsuario()) . parent::TypeParam($oUsuario->getNombre()) . parent::TypeParam($oUsuario->getApellido()) . parent::TypeParam($oUsuario->getFechaNacimiento()) . parent::TypeParam($oUsuario->getContrasena()) . parent::TypeParam($oUsuario->getSalt()) . parent::TypeParam($oUsuario->getActivo()) . parent::TypeParam($oUsuario->getIDRol()) . parent::TypeParam($oUsuario->getPK_Correo());

			$NombreUsuario = $oUsuario->getNombreUsuario();
			$Nombre = $oUsuario->getNombre();
			$Apellido = $oUsuario->getApellido();
			$FechaNacimiento = $oUsuario->getFechaNacimiento();
			$Contrasena = $oUsuario->getContrasena();
			$Salt = $oUsuario->getSalt();
			$Activo = $oUsuario->getActivo();
			$IDRol = $oUsuario->getIDRol();
			$PK_Correo = $oUsuario->getPK_Correo();

			$STMT->bind_param($Params, $NombreUsuario, $Nombre, $Apellido, $FechaNacimiento, $Contrasena, $Salt, $Activo, $IDRol, $PK_Correo);

			return parent::CMD($STMT);
		}

		//Delete a Usuario
		public function Delete(Usuario $oUsuario)
		{
			$STMT = parent::PREPARE('DELETE FROM Usuario WHERE PK_Correo = ?;');

			$Params = parent::TypeParam($oUsuario->getPK_Correo());

			$PK_Correo = $oUsuario->getPK_Correo();

			$STMT->bind_param($Params, $PK_Correo);

			return parent::CMD($STMT);
		}

		//Select one Usuario
		public function SelectByPrimaryKey(Usuario $oUsuario)
		{
			$STMT = parent::PREPARE('SELECT * FROM Usuario WHERE PK_Correo = ?;');

			$Params = parent::TypeParam($oUsuario->getPK_Correo());

			$PK_Correo = $oUsuario->getPK_Correo();

			$STMT->bind_param($Params, $PK_Correo);

			return parent::FirstOrDefault($STMT);
		}

		//Select all Usuario
		public function SelectAll()
		{
			$STMT = parent::PREPARE('SELECT * FROM Usuario;');
			return parent::SELECT($STMT);
		}

		//Varify if a Usuario exist
		public function Exists(Usuario $oUsuario)
		{
			$STMT = parent::PREPARE('SELECT 1 FROM Usuario WHERE PK_Correo = ? LIMIT 1;');

			$Params = parent::TypeParam($oUsuario->getPK_Correo());

			$PK_Correo = $oUsuario->getPK_Correo();

			$STMT->bind_param($Params, $PK_Correo);

			return Count(parent::FirstOrDefault($STMT)) > 0;
		}
	}
}
?>