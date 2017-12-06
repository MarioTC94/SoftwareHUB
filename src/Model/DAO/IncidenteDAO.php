<?php
namespace src\Model\DAO {
	/**
	 * This class contain all methods to interact with the data base
	 * @author lHersey
	 * @GitHub http://github.com/lHersey
	 */
	use lib\Model\Databases\MySQL;
	use src\Model\Domain\Incidente;

	class IncidenteDAO extends MySQL
	{

		//Add a Incidente
		public function Add(Incidente $oIncidente)
		{
			$STMT = parent::PREPARE('INSERT INTO Incidente(NombreIncidente, DescripcionIncidente, EstadoIncidente, TipoIncidente, Cliente, Proveedor, IDSoftware, FechaIncidente, Activo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);');

			$Params = parent::TypeParam($oIncidente->getNombreIncidente()) . parent::TypeParam($oIncidente->getDescripcionIncidente()) . parent::TypeParam($oIncidente->getEstadoIncidente()) . parent::TypeParam($oIncidente->getTipoIncidente()) . parent::TypeParam($oIncidente->getCliente()) . parent::TypeParam($oIncidente->getProveedor()) . parent::TypeParam($oIncidente->getIDSoftware()) . parent::TypeParam($oIncidente->getFechaIncidente()) . parent::TypeParam($oIncidente->getActivo());

			$NombreIncidente = $oIncidente->getNombreIncidente();
			$DescripcionIncidente = $oIncidente->getDescripcionIncidente();
			$EstadoIncidente = $oIncidente->getEstadoIncidente();
			$TipoIncidente = $oIncidente->getTipoIncidente();
			$Cliente = $oIncidente->getCliente();
			$Proveedor = $oIncidente->getProveedor();
			$IDSoftware = $oIncidente->getIDSoftware();
			$FechaIncidente = $oIncidente->getFechaIncidente();
			$Activo = $oIncidente->getActivo();

			$STMT->bind_param($Params, $NombreIncidente, $DescripcionIncidente, $EstadoIncidente, $TipoIncidente, $Cliente, $Proveedor, $IDSoftware, $FechaIncidente, $Activo);

			return parent::CMD($STMT);
		}

		//Update a Incidente
		public function Update(Incidente $oIncidente)
		{
			$STMT = parent::PREPARE('UPDATE Incidente SET NombreIncidente = ?, DescripcionIncidente = ?, EstadoIncidente = ?, TipoIncidente = ?, Cliente = ?, Proveedor = ?, IDSoftware = ?, FechaIncidente = ?, Activo = ? WHERE PK_IDIncidente = ?;');

			$Params = parent::TypeParam($oIncidente->getNombreIncidente()) . parent::TypeParam($oIncidente->getDescripcionIncidente()) . parent::TypeParam($oIncidente->getEstadoIncidente()) . parent::TypeParam($oIncidente->getTipoIncidente()) . parent::TypeParam($oIncidente->getCliente()) . parent::TypeParam($oIncidente->getProveedor()) . parent::TypeParam($oIncidente->getIDSoftware()) . parent::TypeParam($oIncidente->getFechaIncidente()) . parent::TypeParam($oIncidente->getActivo()) . parent::TypeParam($oIncidente->getPK_IDIncidente());

			$NombreIncidente = $oIncidente->getNombreIncidente();
			$DescripcionIncidente = $oIncidente->getDescripcionIncidente();
			$EstadoIncidente = $oIncidente->getEstadoIncidente();
			$TipoIncidente = $oIncidente->getTipoIncidente();
			$Cliente = $oIncidente->getCliente();
			$Proveedor = $oIncidente->getProveedor();
			$IDSoftware = $oIncidente->getIDSoftware();
			$FechaIncidente = $oIncidente->getFechaIncidente();
			$Activo = $oIncidente->getActivo();
			$PK_IDIncidente = $oIncidente->getPK_IDIncidente();

			$STMT->bind_param($Params, $NombreIncidente, $DescripcionIncidente, $EstadoIncidente, $TipoIncidente, $Cliente, $Proveedor, $IDSoftware, $FechaIncidente, $Activo, $PK_IDIncidente);

			return parent::CMD($STMT);
		}

		//Delete a Incidente
		public function Delete(Incidente $oIncidente)
		{
			$STMT = parent::PREPARE('DELETE FROM Incidente WHERE PK_IDIncidente = ?;');

			$Params = parent::TypeParam($oIncidente->getPK_IDIncidente());

			$PK_IDIncidente = $oIncidente->getPK_IDIncidente();

			$STMT->bind_param($Params, $PK_IDIncidente);

			return parent::CMD($STMT);
		}

		//Select one Incidente
		public function SelectByPrimaryKey(Incidente $oIncidente)
		{
			$STMT = parent::PREPARE('SELECT * FROM Incidente WHERE PK_IDIncidente = ?;');

			$Params = parent::TypeParam($oIncidente->getPK_IDIncidente());

			$PK_IDIncidente = $oIncidente->getPK_IDIncidente();

			$STMT->bind_param($Params, $PK_IDIncidente);

			return parent::FirstOrDefault($STMT);
		}

		//Select all Incidente
		public function SelectAll()
		{
			$STMT = parent::PREPARE('SELECT * FROM Incidente;');
			return parent::SELECT($STMT);
		}

		//Varify if a Incidente exist
		public function Exists(Incidente $oIncidente)
		{
			$STMT = parent::PREPARE('SELECT 1 FROM Incidente WHERE PK_IDIncidente = ? LIMIT 1;');

			$Params = parent::TypeParam($oIncidente->getPK_IDIncidente());

			$PK_IDIncidente = $oIncidente->getPK_IDIncidente();

			$STMT->bind_param($Params, $PK_IDIncidente);

			return Count(parent::FirstOrDefault($STMT)) > 0;
		}

		public function UpdateTipoIncidente($IDIncidente, $IDTipoIncidente)
		{
			$STMT = parent::PREPARE('UPDATE Incidente SET EstadoIncidente = ? WHERE PK_IDIncidente = ?');
			$STMT->bind_param('ii', $IDTipoIncidente, $IDIncidente);
			return parent::CMD($STMT);
		}

		public function SelectAllByCliente($IDCliente)
		{

			$Query = 'SELECT 
							a.Cliente Cliente,
							a.Proveedor Proveedor,
							a.PK_IDIncidente PK_IDIncidente
							,a.NombreIncidente NombreIncidente
							,a.FechaIncidente FechaIncidente
							,a.DescripcionIncidente DescripcionIncidente
							,b.DescripcionTipoIncidente DescripcionTipoIncidente
							,c.DescripcionEstadoIncidente DescripcionEstadoIncidente
							,d.NombreSoftware
							,d.DescripcionSoftware
							,e.PK_IDProveedor PK_IDProveedor
							,e.NombreEmpresa NombreEmpresa
						FROM Incidente a 
						JOIN TipoIncidente b ON a.TipoIncidente = b.PK_IDTipoIncidente 
						JOIN EstadoIncidente c ON c.PK_IDEstadoIncidente = a.EstadoIncidente 
						JOIN Software d ON d.PK_IDSoftware = a.IDSoftware 
						JOIN Proveedor e ON e.PK_IDProveedor = a.Proveedor 
						WHERE a.Cliente  = ?
						ORDER BY a.FechaIncidente DESC';

			$STMT = parent::PREPARE($Query);
			$STMT->bind_param('i', $IDCliente);
			return parent::SELECT($STMT);
		}

				//Select By Cliente
		public function SelectAllByProveedor($IDProveedor)
		{
			$Query = 'SELECT 
							a.PK_IDIncidente PK_IDIncidente
							,a.NombreIncidente NombreIncidente
							,a.DescripcionIncidente DescripcionIncidente
							,a.FechaIncidente FechaIncidente
							,b.DescripcionTipoIncidente DescripcionTipoIncidente
							,c.DescripcionEstadoIncidente DescripcionEstadoIncidente
							,d.NombreSoftware NombreSoftware
							,d.DescripcionSoftware DescripcionSoftware
							,e.PK_IDCliente PK_IDCliente
							,e.Nombre Nombre 
						FROM Incidente a 
						JOIN TipoIncidente b ON a.TipoIncidente = b.PK_IDTipoIncidente 
						JOIN EstadoIncidente c ON c.PK_IDEstadoIncidente = a.EstadoIncidente 
						JOIN Software d ON d.PK_IDSoftware = a.IDSoftware 
						JOIN Cliente e ON e.PK_IDCliente = a.Cliente 
						WHERE a.Proveedor  = ?
						ORDER BY a.FechaIncidente DESC';

			$STMT = parent::PREPARE($Query);
			$STMT->bind_param('i', $IDProveedor);
			return parent::SELECT($STMT);
		}


		public function SelectAllInfoByPrimaryKey($IDPrimaryKey)
		{
			$Query = 'SELECT 
							a.PK_IDIncidente PK_IDIncidente
							,a.NombreIncidente NombreIncidente
							,a.DescripcionIncidente DescripcionIncidente
							,a.FechaIncidente FechaIncidente
							,b.DescripcionTipoIncidente DescripcionTipoIncidente
							,c.DescripcionEstadoIncidente DescripcionEstadoIncidente
							,d.NombreSoftware NombreSoftware
							,d.DescripcionSoftware DescripcionSoftware
							,e.PK_IDCliente PK_IDCliente
							,f.PK_IDProveedor PK_IDProveedor 
							,e.Nombre Nombre 
						FROM Incidente a 
						JOIN TipoIncidente b ON a.TipoIncidente = b.PK_IDTipoIncidente 
						JOIN EstadoIncidente c ON c.PK_IDEstadoIncidente = a.EstadoIncidente 
						JOIN Software d ON d.PK_IDSoftware = a.IDSoftware 
						JOIN Cliente e ON e.PK_IDCliente = a.Cliente 
						JOIN Proveedor f ON f.PK_IDProveedor = a.Proveedor 
						WHERE a.PK_IDIncidente  = ?;';

			$STMT = parent::PREPARE($Query);
			$STMT->bind_param('i', $IDPrimaryKey);
			return parent::FirstOrDefault($STMT);
		}
	}
}
?>