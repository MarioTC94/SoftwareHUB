<?php
namespace src\Controller;

use lib\Controller\BaseController;
use src\Model\DAO\UsuarioDAO;
use src\Controller\Validaciones;
use src\Model\Domain\Usuario;
use src\Model\DAO\RolDAO;
use src\Model\Domain\Rol;

class HomeController extends BaseController
{
    public function Index()
    {
        if (self::validate()) {
            $rol = new RolDAO();
            parent::View($rol->SelectAll());
        }
    }

    public function Registro()
    {//Metodo que se va llamar al JS por medio de Ajax
            
        //Registro Cliente o Proveedor
        if (!isset($_POST["DatosRegistro"])) {
            parent::toView('Error', 'PageNotFound');
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
            $Respuesta = array('Codigo' => 3, 'Mensaje' => 'Error, El Usuario ya esta registrado');
            echo \json_encode($Respuesta);
            exit();
        }

        if ($oUsuarioDao->Add($oUsuario)) {
            $oRolDAO = new RolDAO();
            $oRol = new Rol();
            $oRol->setPK_IDROL($oUsuario->getIDRol());
            $oDescripcionRol = $oRolDAO->SelectByPrimaryKey($oRol)['DescripcionRol'];
            $Respuesta = array('Codigo' => 1, 'Mensaje' => 'Exito', 'Rol' => $oDescripcionRol);

            \session_start();
            $_SESSION['UsuarioLogueado'] = array('Nombre' => $oUsuario->getNombre(), 'PK_Correo' => $oUsuario->getPK_Correo(), 'Rol' => $oDescripcionRol);

            echo \json_encode($Respuesta);
        } else {
            $Respuesta = array('Codigo' => 4, 'Mensaje' => 'Error, No se pudo registrar');
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
            $Respuesta = array('Codigo' => 3, 'Mensaje' => 'Error, No se completó su solicitud');
            echo \json_encode($Respuesta);
        } else {

            $Salt = $oUsuarioDAO->SelectSaltByPrimaryKey($oUsuario);
            $oUsuario->setContrasena(\hash('sha256', $DataLogin['Contraseña'] . $Salt));
            $Logued = $oUsuarioDAO->Login($oUsuario);
            if (Count($Logued) <> 0) {
                $Respuesta = array('Codigo' => 1, 'Mensaje' => 'Exito', 'Rol' => $Logued['DescripcionRol']);
                \session_start();
                $_SESSION['UsuarioLogueado'] = array('Nombre' => $Logued['Nombre'], 'PK_Correo' => $Logued['PK_Correo'], 'Rol' => $Logued['DescripcionRol']);
                echo \json_encode($Respuesta);
            } else {
                echo \json_encode(array('Codigo' => 3, 'Mensaje' => 'Error, Correo o Contraseña Incorrectos'));
            }
        }
    }

    public function validate()
    {
        \session_start();
        if (isset($_SESSION['UsuarioLogueado'])) {
            parent::toView($_SESSION['UsuarioLogueado']['Rol'], '');
        } else {
            return true;
        }
    }
}
  