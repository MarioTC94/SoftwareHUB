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
            $model = array();
            $oSoftwareDAO = new SoftwareDAO();
            $oTipoIncidente = new TipoincidenteDAO();

            $model['Software'] = $oSoftwareDAO->SelectAll();
            //$model['TipoIncidente'] = $oTipoIncidente->SelectAll();

            parent::View($model);

      }


      public function LogOut()
      {
            \session_start();
            \session_destroy();
            parent::toView("Home", "Index");
      }

      public function validate()
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

      public function AddIncident()
      {

            if (!isset($_POST["DatosIncidente"])) {
                  parent::toView('Error', 'PageNotFound');
            }

            \session_start();

            $DataIncidente = \json_decode($_POST["DatosIncidente"], true);

            $oIncidenteDAO = new IncidenteDAO();
            $oIncidente = new Incidente();

            $oIncidente->setActivo(1);
            $oIncidente->setNombreIncidente($DataIncidente["NombreIncidente"]);
            $oIncidente->setTipoIncidente($DataIncidente["TipoIncidente"]);
            $oIncidente->setDescripcionIncidente( ($DataIncidente["DescripcionIncidente"]));


            $oSoftware->setIDProveedor($_SESSION['UsuarioLogueado']['ID']);

            if ($oSoftwareDAO->Add($oSoftware)) {
                  echo \json_encode(array('Codigo' => 1, 'Mensaje' => 'Exito, Software Creado'));
            } else {
                  echo \json_encode(array('Codigo' => 2, 'Mensaje' => 'Error al insertar Software'));
            }
      }

      public function Detalles()
      {
            self::validate();
            parent::View();
      }
}
?>
