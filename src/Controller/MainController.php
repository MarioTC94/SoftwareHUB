<?php
use src\Model\DAO\SoftwareDAO;
use src\Model\Domain\Software;
use lib\Controller\BaseController;

class MainController extends BaseController
{

   public function RegistroSoftware()
   {

      $DataRegister = \json_decode($_POST["DatosRegistroSoftware"], true);
      $Software = new Software();
      $SoftwareDao = new SoftwareDAO();
      $Software->setActivo(1);
      $Software->setNombreSoftware($DataRegister["NombreSoftware"]);
      $Software->setDescripcionSoftware($DataRegister["DescripcionSoftware"]);
      $Software->
   }

}




?>