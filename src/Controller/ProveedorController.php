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
            self::validate();;
            $model = array();
            $oTipoSoftwareDAO = new TiposoftwareDAO();
            $model['TipoSoftware'] = $oTipoSoftwareDAO->SelectAll();

            parent::View($model);

      }

      public function AddSoftware()
      {
            if (!isset($_POST["DatosSoftware"])) {
                  parent::toView('Error', 'PageNotFound');
            }

            self::validate();

            $DataSoftware = \json_decode($_POST["DatosSoftware"], true);
            $Software = new Software();
            $SoftwareDao = new SoftwareDAO();
            $Software->setActivo(1);
            $Software->setNombreSoftware($DataSoftware["NombreSoftware"]);
            $Software->setDescripcionSoftware($DataSoftware["DescripcionSoftware"]);
            $Software->setIDProveedor($_SESSION['UsuarioLogueado']['ID']);
            $Software->setTipoSoftware($DataSoftware['TipoSoftware']);

            if ($SoftwareDao->Add($Software)) {
                  echo \json_encode(array('Codigo' => 1, 'Mensaje' => 'Software insertado correctamente'));
            } else {
                  echo \json_encode(array('Codigo' => 2, 'Mensaje' => 'Error al insertar software'));
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
                        exit();
                  }
            } else
                  parent::toView('Home', 'Index');
      }
}
?>