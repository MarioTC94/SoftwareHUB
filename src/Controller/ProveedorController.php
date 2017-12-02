<?php
namespace src\Controller;

use lib\Controller\BaseController;
use Asphyo\src\Model\Domain\Usuario;
use Asphyo\src\Model\DAO\UsuarioDAO;

class ProveedorController extends BaseController
{
   public function Index()
   {
      parent::View();
   }

   public function LogOut()
   {
      \session_start();
      \session_destroy();
      parent::toView("Home", "Index");
   }
}
?>