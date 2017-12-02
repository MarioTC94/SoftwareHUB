<?php
namespace src\Controller;

use lib\Controller\BaseController;
use Asphyo\src\Model\Domain\Usuario;
use Asphyo\src\Model\DAO\UsuarioDAO;

class ProveedorController extends BaseController
{
   public function Index()
   {
      \session_start();
      if (isset($_SESSION['UsuarioLogueado'])) {
         parent::View();
      } else {
         parent::toView('Home', 'Index');
      }
   }

   public function LogOut()
   {
      \session_start();
      \session_destroy();
      parent::toView("Home", "Index");
   }
}
?>