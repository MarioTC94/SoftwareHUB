<?php
namespace src\Controller;

use lib\Controller\BaseController;
use src\Model\DAO\UsuarioDAO;
use src\Controller\Validaciones;
use src\Model\Domain\Usuario;
use src\Model\DAO\RolDAO;

class HomeController extends BaseController
{
    public function Index()
    {
        $rol = new RolDAO();
        parent::View($rol->SelectAll());
    }

    public function Registro()
    {//Metodo que se va llamar al JS por medio de Ajax
            
        //Registro Cliente o Proveedor
        if (!isset($_POST["DatosRegistro"])) {
            $Respuesta = array('Codigo' => '5', 'Mensaje' => 'Error, No se completo su solicitud');
            echo \json_encode($Respuesta);
        }

        $DataRegister = \json_decode($_POST["DatosRegistro"], true);
        $oUsuarioDao = new UsuarioDAO();
        $oUsuario = new Usuario();
        $oUsuario->setActivo(1);
        $oUsuario->setNombre($DataRegister["Nombre"]);
        $oUsuario->setApellido($DataRegister["Apellido"]);
        $oUsuario->setNombreUsuario($DataRegister["NombreUsuario"]);
        $oUsuario->setFechaNacimiento($DataRegister["FechaNacimiento"]);
        $oUsuario->setIDRol($DataRegister["IDRol"]);
        $oUsuario->setPK_Correo($DataRegister["PK_Correo"]);
        $oUsuario->setSalt(\bin2hex(\mcrypt_create_iv(32)));
        $oUsuario->setContrasena(\hash('sha256', $DataRegister['Contraseña'] . $oUsuario->getSalt()));

        if ($oUsuarioDao->Exists($oUsuario)) {
            $Respuesta = array('Codigo' => '3', 'Mensaje' => 'Error, El Usuario ya esta registrado');
            echo \json_encode($Respuesta);
        }

        if ($oUsuarioDao->Add($oUsuario)) {
            $oRolDAO = new RolDAO();
            $oROl = $oRolDAO->SelectByPrimaryKey($oUsuario->getIDRol())['DescripcionRol'];
            $Respuesta = array('Codigo' => '1', 'Mensaje' => 'Exito', 'Rol' => $oRol);
            echo \json_encode($Respuesta);
        } else {
            $Respuesta = array('Codigo' => '4', 'Mensaje' => 'Error, No se pudo registrar');
            echo \json_encode($Respuesta);
        }
    }




    public function Login()
    { //Metodo que se va llamar al JS por medio de Ajax
         
        //Login Cliente - Proveedor
        if (!isset($_POST["DatosLogin"])) {
            parent::View();
        }

        $DataLogin = \json_decode($_POST["DatosLogin"], true);
        $oUsuarioDAO = new UsuarioDAO();
        $oUsuario = new Usuario();
        $oUsuario->setPK_Correo($DataLogin["PK_Correo"]);

        if (!$oUsuarioDAO->Exists($oUsuario)) {
            $Respuesta = array('Codigo' => '3', 'Mensaje' => 'Error, No se completó su solicitud');
            echo \json_encode($Respuesta);
        }

        $Salt = $oUsuarioDAO->SelectSaltByPrimaryKey($oUsuario);
        $oUsuario->setContrasena(\hash('sha256', $DataLogin['Contraseña'] . $Salt));

        if ($oClienteLoginDao->Add($oClienteLogin)) {
            $Respuesta = array('Codigo' => '1', 'Mensaje' => 'Exito');
            echo \json_encode($Respuesta);
        }
    }
}
