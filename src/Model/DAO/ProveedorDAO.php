<?php
namespace src\Model\DAO {
	/**
	 * This class contain all methods to interact with the data base
	 * @author lHersey
	 * @GitHub http://github.com/lHersey
	 */
	use lib\Model\Databases\MySQL;
	use src\Model\Domain\Proveedor;

	class ProveedorDAO extends MySQL
	{

		//Add a Proveedor
		public function Add(Proveedor $oProveedor)
		{
			$STMT = parent::PREPARE('INSERT INTO Proveedor(NombreEmpresa, Activo, URL, NombrePersonaConacto, EmailPersonaContacto, PK_IDProveedor) VALUES (?, ?, ?, ?, ?, ?);');

			$Params = parent::TypeParam($oProveedor->getNombreEmpresa()) . parent::TypeParam($oProveedor->getActivo()) . parent::TypeParam($oProveedor->getURL()) . parent::TypeParam($oProveedor->getNombrePersonaConacto()) . parent::TypeParam($oProveedor->getEmailPersonaContacto()) . parent::TypeParam($oProveedor->getPK_IDProveedor());

			$NombreEmpresa = $oProveedor->getNombreEmpresa();
			$Activo = $oProveedor->getActivo();
			$URL = $oProveedor->getURL();
			$NombrePersonaConacto = $oProveedor->getNombrePersonaConacto();
			$EmailPersonaContacto = $oProveedor->getEmailPersonaContacto();
			$PK_IDProveedor = $oProveedor->getPK_IDProveedor();

			$STMT->bind_param($Params, $NombreEmpresa, $Activo, $URL, $NombrePersonaConacto, $EmailPersonaContacto, $PK_IDProveedor);

			return parent::CMD($STMT);
		}

		//Update a Proveedor
		public function Update(Proveedor $oProveedor)
		{
			$STMT = parent::PREPARE('UPDATE Proveedor SET NombreEmpresa = ?, Activo = ?, URL = ?, NombrePersonaConacto = ?, EmailPersonaContacto = ? WHERE PK_IDProveedor = ?;');

			$Params = parent::TypeParam($oProveedor->getNombreEmpresa()) . parent::TypeParam($oProveedor->getActivo()) . parent::TypeParam($oProveedor->getURL()) . parent::TypeParam($oProveedor->getNombrePersonaConacto()) . parent::TypeParam($oProveedor->getEmailPersonaContacto()) . parent::TypeParam($oProveedor->getPK_IDProveedor());

			$NombreEmpresa = $oProveedor->getNombreEmpresa();
			$Activo = $oProveedor->getActivo();
			$URL = $oProveedor->getURL();
			$NombrePersonaConacto = $oProveedor->getNombrePersonaConacto();
			$EmailPersonaContacto = $oProveedor->getEmailPersonaContacto();
			$PK_IDProveedor = $oProveedor->getPK_IDProveedor();

			$STMT->bind_param($Params, $NombreEmpresa, $Activo, $URL, $NombrePersonaConacto, $EmailPersonaContacto, $PK_IDProveedor);

			return parent::CMD($STMT);
		}

		//Delete a Proveedor
		public function Delete(Proveedor $oProveedor)
		{
			$STMT = parent::PREPARE('DELETE FROM Proveedor WHERE PK_IDProveedor = ?;');

			$Params = parent::TypeParam($oProveedor->getPK_IDProveedor());

			$PK_IDProveedor = $oProveedor->getPK_IDProveedor();

			$STMT->bind_param($Params, $PK_IDProveedor);

			return parent::CMD($STMT);
		}

		//Select one Proveedor
		public function SelectByPrimaryKey(Proveedor $oProveedor)
		{
			$STMT = parent::PREPARE('SELECT * FROM Proveedor WHERE PK_IDProveedor = ?;');

			$Params = parent::TypeParam($oProveedor->getPK_IDProveedor());

			$PK_IDProveedor = $oProveedor->getPK_IDProveedor();

			$STMT->bind_param($Params, $PK_IDProveedor);

			return parent::FirstOrDefault($STMT);
		}

		//Select all Proveedor
		public function SelectAll()
		{
			$STMT = parent::PREPARE('SELECT * FROM Proveedor;');
			return parent::SELECT($STMT);
		}

		//Varify if a Proveedor exist
		public function Exists(Proveedor $oProveedor)
		{
			$STMT = parent::PREPARE('SELECT 1 FROM Proveedor WHERE PK_IDProveedor = ? LIMIT 1;');

			$Params = parent::TypeParam($oProveedor->getPK_IDProveedor());

			$PK_IDProveedor = $oProveedor->getPK_IDProveedor();

			$STMT->bind_param($Params, $PK_IDProveedor);

			return Count(parent::FirstOrDefault($STMT)) > 0;
		}

		public function SelectAllWithInfo()
		{
			$STMT = parent::PREPARE('SELECT b.Nombre, b.Apellido, b.PK_IDCorreo b.FechaNacimiento, FROM Proveedor a INNER JOIN Usuario b ON a.PK_IDCorreo = b.PK_IDCorreo;');
			return parent::SELECT($STMT);
		}
	}
}
?>