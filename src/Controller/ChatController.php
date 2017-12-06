<?php
namespace src\Controller;

use lib\Controller\BaseController;
use src\Model\Domain\Comentarios;
use src\Model\DAO\ComentariosDAO;
use lib\Helper\Html;

class ChatController extends BaseController
{

   public function Comment()
   {
      if (!isset($_POST["DatosSoftware"])) {
         \json_encode(array('Codigo' => 3, 'Mensaje' => 'Lo sentimos no se pudo completar su solicitud'));
      }

      \session_start();

      $DataChat = \json_decode($_POST["DatosChat"], true);
      $Comentarios = new Comentarios();
      $oComentariosDAO = new ComentariosDAO();

      $Comentarios->setActivo(1);
      $Comentarios->setDescripcionComentario($DataChat["Comentario"]);
      $Comentarios->setFechaComentario(\date('Y-m-d H:i:s'));
      $Comentarios->setUsuario($_SESSION["UsuarioLogueado"]["ID"]);
      $Comentarios->setIncidente($DataChat['IDIncidente']);

      if ($oComentariosDAO->Add($Comentarios)) {

         $img = Html::img("user.png", "User Avatar", ["class" => ["img-circle"]]);

         echo \json_encode(array('Codigo' => 1, 'Mensaje' => 'Comentario insertado incorrectamente', 'Comentario' => $Comentarios->getDescripcionComentario(), 'Nombre' => $_SESSION['UsuarioLogueado']['Nombre'], 'Img' => $img));
      } else {
         echo \json_encode(array('Codigo' => 2, 'Mensaje' => 'Error al insertar el comentario'));
      }
   }
}
?>