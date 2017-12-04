<?php
namespace src\Controller;

use lib\Controller\BaseController;
use Asphyo\src\Model\Domain\Usuario;
use Asphyo\src\Model\DAO\UsuarioDAO;
use src\Model\DAO\TiposoftwareDAO;
use src\Model\DAO\SoftwareDAO;
use src\Model\Domain\Software;

class ProveedorController extends BaseController
{
      public function Index()
      {
            if (self::validate()) {
                  $model = array();
                  $oTipoSoftwareDAO = new TiposoftwareDAO();
                  $model['TipoSoftware'] = $oTipoSoftwareDAO->SelectAll();

                  parent::View($model);
            }
      }

      public function RegistroSoftware()
      {
            if (self::validate()) {
                  $DataRegister = \json_decode($_POST["DatosRegistroSoftware"], true);
                  $Software = new Software();
                  $SoftwareDao = new SoftwareDAO();
                  $Software->setActivo(1);
                  $Software->setNombreSoftware($DataRegister["NombreSoftware"]);
                  $Software->setDescripcionSoftware($DataRegister["DescripcionSoftware"]);
            }
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
                  if ($_SESSION['UsuarioLogueado']['Rol'] == 'Proveedor') {
                        return true;
                  } else {
                        parent::toView('Cliente', 'Index');
                  }
            } else
                  parent::toView('Home', 'Index');
      }

      public function AddSoftware()
      {

            if (!isset($_POST["DatosSoftware"])) {
                  parent::toView('Error', 'PageNotFound');
            }

            \session_start();

            $DataSoftware = \json_decode($_POST["DatosSoftware"], true);

            $oSoftwareDAO = new SoftwareDAO();
            $oSoftware = new Software();

            $oSoftware->setActivo(1);
            $oSoftware->setNombreSoftware($DataSoftware["NombreSoftware"]);
            $oSoftware->setTipoSoftware($DataSoftware["TipoSoftware"]);
            $oSoftware->setDescripcionSoftware($DataSoftware["DescripcionSoftware"]);
            $oSoftware->setIDProveedor($_SESSION['UsuarioLogueado']['ID']);

            if ($oSoftwareDAO->Add($oSoftware)) {
                  echo \json_encode(array('Codigo' => 1, 'Mensaje' => 'Exito, Software Creado'));
            } else {
                  echo \json_encode(array('Codigo' => 2, 'Mensaje' => 'Error al insertar Software'));
            }
      }
}
?>