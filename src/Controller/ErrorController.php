<?php
namespace src\Controller;

use lib\Controller\BaseController;

class ErrorController extends BaseController
{

   public function PageNotFound()
   {
      \session_start();
      parent::View();
   }

}