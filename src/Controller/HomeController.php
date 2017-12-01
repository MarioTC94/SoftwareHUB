<?php
namespace src\Controller;

use lib\Controller\BaseController;
use src\Model\DAO\UsuarioDAO;
use src\Controller\Validaciones;
use src\Model\Domain\Usuario;

class HomeController extends BaseController
{
    public function Index()
    {
        if (isset($_POST["DatosRegistro"])) {

            $Data = \json_decode($_POST["DatosRegistro"]);
            $oUsuarioDao = new UsuarioDAO();
            $oUsuario = new Usuario();
            $oUsuario->setActivo(1);
            $oUsuario->setNombre($Data["Nombre"]);
            $oUsuario->setApellido($Data["Apellido"]);
            $oUsuario->setNombreUsuario($Data["NombreUsuario"]);
            $oUsuario->getNombreUsuario();
            $oUsuario->setFechaNacimiento($Data["FechaNacimiento"]);
            $oUsuario->setIDRol($Data["IDRol"]);
            $oUsuario->setPK_Correo($Data["PK_Correo"]);
            $oUsuario->setContrasena(hash('sha256', $Data["Contraseña"]));
            $oUsuario->setSalt(hash('sha256', $Data["Contraseña"]));

            if ($oUsuarioDao->Add($oUsuario)) {
                echo 1;
            } else {
                echo 0;
            }
        } else {
            parent::View();
        }
    }
}
