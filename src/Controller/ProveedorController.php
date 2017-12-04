<?php
namespace src\Controller;

use lib\Controller\BaseController;
use Asphyo\src\Model\Domain\Usuario;
use Asphyo\src\Model\DAO\UsuarioDAO;
use src\Model\DAO\TiposoftwareDAO;

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
}
?>