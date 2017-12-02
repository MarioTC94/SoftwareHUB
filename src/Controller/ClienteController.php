<?php
namespace src\Controller;

use lib\Controller\BaseController;
use Asphyo\src\Model\Domain\Usuario;
use Asphyo\src\Model\DAO\UsuarioDAO;

class ClienteController extends BaseController
{
      public function Index()
      {
            if (self::validate()) parent::View();
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
