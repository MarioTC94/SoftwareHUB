<?php
namespace src\Controller;

use lib\Controller\BaseController;
use src\Model\Domain\Usuario;
use src\Model\DAO\SoftwareDAO;
use src\Model\DAO\ProveedorDAO;
use src\Model\DAO\TipoincidenteDAO;
use src\Model\Domain\Incidente;
use src\Model\DAO\IncidenteDAO;

class ClienteController extends BaseController
{
      public function Index()
      {
            self::validate();
            $model = self::getData();
            parent::View($model);

      }

      public function validate() //User Logued
      {
            \session_start();
            if (isset($_SESSION['UsuarioLogueado'])) {
                  if ($_SESSION['UsuarioLogueado']['Rol'] == 'Cliente') {
                        return true;
                  } else {
                        parent::toView('Proveedor', 'Index');
                  }
            } else
                  parent::toView('Home', 'Index');
      }

      public function AddIncident() //AJAX
      {

            if (!isset($_POST["DatosIncidente"])) {
                  echo \json_encode(array('Codigo' => 3, 'Mensaje' => 'Error al crear incidente'));
                  exit();
            }

            $DataIncidente = \json_decode($_POST["DatosIncidente"], true);

            $oIncidenteDAO = new IncidenteDAO();
            $oIncidente = new Incidente();

            session_start();
            $oIncidente->setActivo(1);
            $oIncidente->setNombreIncidente($DataIncidente["NombreIncidente"]);
            $oIncidente->setTipoIncidente($DataIncidente["TipoIncidente"]);
            $oIncidente->setProveedor($DataIncidente['Proveedor']);
            $oIncidente->setIDSoftware($DataIncidente['Software']);
            $oIncidente->setDescripcionIncidente($DataIncidente["DescripcionIncidente"]);
            $oIncidente->setEstadoIncidente(1);
            $oIncidente->setCliente($_SESSION['UsuarioLogueado']['ID']);

            if ($oIncidenteDAO->Add($oIncidente)) {
                  echo \json_encode(array('Codigo' => 1, 'Mensaje' => 'Exito, Incidente Creado'));
            } else {
                  echo \json_encode(array('Codigo' => 2, 'Mensaje' => 'Error al crear incidente'));
            }
      }

      public function Detalles($IDIncidente = null)
      {

            $Incidente = new DaoIncidente();
            $Incidente->getInfoIncitenteByPrimaryKey($IDIncidente);

            if ($IDIncidente == null) {
                  parent::toView('Cliente', '');
            }

            self::validate();
            $model = self::getData();
            parent::View($model);
      }

      public function LogOut()
      {
            \session_start();
            \session_destroy();
            parent::toView("Home", "Index");
      }

      private function getData()
      {
            $model = array();
            $oSoftwareDAO = new SoftwareDAO();
            $oTipoIncidente = new TipoincidenteDAO();
            $oProveedorDAO = new ProveedorDAO();

            $model['TipoIncidente'] = $oTipoIncidente->SelectAll();
            $model['Proveedor'] = $oProveedorDAO->SelectAll();
            $model['Software'] = $oSoftwareDAO->SelectAllByProvider($model['Proveedor'][0]['PK_IDProveedor']);

            return $model;
      }

      public function getSoftwareByID()
      {
            if (!isset($_POST["IDProveedor"])) {
                  parent::toView('Error', 'PageNotFound');
            }
            $IDProveedor = $_POST["IDProveedor"];

            $oSoftwareDAO = new SoftwareDAO();
            $Data = $oSoftwareDAO->SelectAllByProvider($IDProveedor);
            echo \json_encode(array('Codigo' => 1, 'Data' => $Data));
      }
}
?>
