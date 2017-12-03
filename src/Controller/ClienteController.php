<?php
namespace src\Controller;

use lib\Controller\BaseController;
use src\Model\Domain\Usuario;
use src\Model\DAO\SoftwareDAO;
use src\Model\DAO\ProveedorDAO;
use src\Model\DAO\TipoincidenteDAO;

class ClienteController extends BaseController
{
      public function Index()
      {
            if (self::validate()) {
                  $model = array();
                  $oSoftwareDAO = new SoftwareDAO();
                  $oTipoIncidente = new TipoincidenteDAO();

                  $model['Software'] = $oSoftwareDAO->SelectAll();
                  $model['TipoIncidente'] = $oTipoIncidente->SelectAll();

                  parent::View($model);
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
                  if ($_SESSION['UsuarioLogueado']['Rol'] == 'Cliente') {
                        return true;
                  } else {
                        parent::toView('Proveedor', 'Index');
                  }
            } else
                  parent::toView('Home', 'Index');
      }
}
?>
