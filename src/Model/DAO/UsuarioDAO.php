<?php
namespace src\Model\DAO {
	/**
	 * This class contain all methods to interact with the data base
	 * @author lHersey
	 * @GitHub http://github.com/lHersey
	 */
	use lib\Model\Databases\MySQL;
	use src\Model\Domain\Usuario;
	use src\Model\Domain\Cliente;
	use src\Model\DAO\ClienteDAO;
	use src\Model\Domain\Proveedor;
	use src\Model\DAO\ProveedorDAO;

	class UsuarioDAO extends MySQL
	{

		//Add a Usuario
		public function Add(Usuario $oUsuario)
		{
			$STMT = parent::PREPARE('INSERT INTO Usuario(Correo, Contrasena, Salt, FechaRegistro, Activo, IDRol) VALUES (?, ?, ?, ?, ?, ?);');

			$Params = parent::TypeParam($oUsuario->getCorreo()) . parent::TypeParam($oUsuario->getContrasena()) . parent::TypeParam($oUsuario->getSalt()) . parent::TypeParam($oUsuario->getFechaRegistro()) . parent::TypeParam($oUsuario->getActivo()) . parent::TypeParam($oUsuario->getIDRol());

			$Correo = $oUsuario->getCorreo();
			$Contrasena = $oUsuario->getContrasena();
			$Salt = $oUsuario->getSalt();
			$FechaRegistro = $oUsuario->getFechaRegistro();
			$Activo = $oUsuario->getActivo();
			$IDRol = $oUsuario->getIDRol();

			$STMT->bind_param($Params, $Correo, $Contrasena, $Salt, $FechaRegistro, $Activo, $IDRol);

			return parent::CMD($STMT);
		}

		//Update a Usuario
		public function Update(Usuario $oUsuario)
		{
			$STMT = parent::PREPARE('UPDATE Usuario SET Correo = ?, Contrasena = ?, Salt = ?, FechaRegistro = ?, Activo = ?, IDRol = ? WHERE PK_IDUsuario = ?;');

			$Params = parent::TypeParam($oUsuario->getCorreo()) . parent::TypeParam($oUsuario->getContrasena()) . parent::TypeParam($oUsuario->getSalt()) . parent::TypeParam($oUsuario->getFechaRegistro()) . parent::TypeParam($oUsuario->getActivo()) . parent::TypeParam($oUsuario->getIDRol()) . parent::TypeParam($oUsuario->getPK_IDUsuario());

			$Correo = $oUsuario->getCorreo();
			$Contrasena = $oUsuario->getContrasena();
			$Salt = $oUsuario->getSalt();
			$FechaRegistro = $oUsuario->getFechaRegistro();
			$Activo = $oUsuario->getActivo();
			$IDRol = $oUsuario->getIDRol();
			$PK_IDUsuario = $oUsuario->getPK_IDUsuario();

			$STMT->bind_param($Params, $Correo, $Contrasena, $Salt, $FechaRegistro, $Activo, $IDRol, $PK_IDUsuario);

			return parent::CMD($STMT);
		}

		//Delete a Usuario
		public function Delete(Usuario $oUsuario)
		{
			$STMT = parent::PREPARE('DELETE FROM Usuario WHERE PK_IDUsuario = ?;');

			$Params = parent::TypeParam($oUsuario->getPK_IDUsuario());

			$PK_IDUsuario = $oUsuario->getPK_IDUsuario();

			$STMT->bind_param($Params, $PK_IDUsuario);

			return parent::CMD($STMT);
		}

		//Select one Usuario
		public function SelectByPrimaryKey(Usuario $oUsuario)
		{
			$STMT = parent::PREPARE('SELECT * FROM Usuario WHERE PK_IDUsuario = ?;');

			$Params = parent::TypeParam($oUsuario->getPK_IDUsuario());

			$PK_IDUsuario = $oUsuario->getPK_IDUsuario();

			$STMT->bind_param($Params, $PK_IDUsuario);

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
			$STMT = parent::PREPARE('SELECT 1 FROM Usuario WHERE PK_IDUsuario = ? LIMIT 1;');

			$Params = parent::TypeParam($oUsuario->getPK_IDUsuario());

			$PK_IDUsuario = $oUsuario->getPK_IDUsuario();

			$STMT->bind_param($Params, $PK_IDUsuario);

			return Count(parent::FirstOrDefault($STMT)) > 0;
		}

		public function ExistsCorreo(Usuario $oUsuario)
		{
			$STMT = parent::PREPARE('SELECT 1 FROM Usuario WHERE Correo = ? LIMIT 1;');

			$Params = parent::TypeParam($oUsuario->getCorreo());

			$Correo = $oUsuario->getCorreo();

			$STMT->bind_param($Params, $Correo);

			return Count(parent::FirstOrDefault($STMT)) > 0;
		}


		public function SelectSaltByPrimaryKey(Usuario $oUsuario)
		{
			$STMT = parent::PREPARE('SELECT Salt FROM Usuario WHERE Correo = ?;');

			$Params = parent::TypeParam($oUsuario->getCorreo());

			$Correo = $oUsuario->getCorreo();


			$STMT->bind_param($Params, $Correo);
			return parent::FirstOrDefault($STMT)['Salt'];
		}

		public function Login(Usuario $oUsuario)
		{
			$STMT = parent::PREPARE('SELECT a.PK_IDUsuario PK_IDUsuario, a.Correo Correo, b.DescripcionRol DescripcionRol FROM Usuario a JOIN Rol b ON a.IDRol = b.PK_IDROL  WHERE a.Correo = ? AND a.Contrasena = ? LIMIT 1;');
			$Params = parent::TypeParam($oUsuario->getCorreo()) . parent::TypeParam($oUsuario->getContrasena());
			$Correo = $oUsuario->getCorreo();
			$Contraseña = $oUsuario->getContrasena();
			$STMT->bind_param($Params, $Correo, $Contraseña);


			return parent::FirstOrDefault($STMT);
		}
	}
}
?>