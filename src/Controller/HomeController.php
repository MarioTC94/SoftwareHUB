<?php
namespace src\Controller;

use lib\Controller\BaseController;
use src\Model\DAO\UsuarioDAO;
use src\Controller\Validaciones;
use src\Model\Domain\Usuario;
use src\Model\DAO\RolDAO;
use src\Model\Domain\Rol;
use src\Model\Domain\Cliente;
use src\Model\DAO\ClienteDAO;
use src\Model\Domain\Proveedor;
use src\Model\DAO\ProveedorDAO;
use lib\Helper\MySQLHelper;

class HomeController extends BaseController
{
    public function Index()
    {
        if (self::validate()) {
            parent::View();
        }
    }

    public function RegistroCliente()
    {//Metodo que se va llamar al JS por medio de Ajax

        if (!isset($_POST["DatosRegistro"])) {
            parent::toView('Error', 'PageNotFound');
        }

        $DataRegister = \json_decode($_POST["DatosRegistro"], true);
        $oUsuarioDao = new UsuarioDAO();
        $oUsuario = new Usuario();
        $oCliente = new Cliente();
        $oCliente->setActivo(1);
        $oCliente->setNombre($DataRegister["Nombre"]);
        $oCliente->setApellido($DataRegister["Apellido"]);
        $oCliente->setFechaNacimiento($DataRegister["FechaNacimiento"]);

        $oUsuario->setActivo(1);
        $oUsuario->setIDRol(1);
        $oUsuario->setFechaRegistro(\date('Y-m-d H:i:s'));
        $oUsuario->setCorreo($DataRegister["Correo"]);
        $oUsuario->setSalt(\mcrypt_create_iv(32));
        $oUsuario->setContrasena(\hex2bin(\hash('sha256', $DataRegister['Contrasena'] . $oUsuario->getSalt())));


        if ($oUsuarioDao->ExistsCorreo($oUsuario)) {
            $Respuesta = array('Codigo' => 3, 'Mensaje' => 'Error, El Usuario ya esta registrado');
            echo \json_encode($Respuesta);
            exit();
        }


        if (!$oUsuarioDao->Add($oUsuario)) {
            $Respuesta = array('Codigo' => 3, 'Mensaje' => 'Error, No se pudo insertar el Usuario');
            echo \json_encode($Respuesta);
            exit();
        }

        $oCliente->setPK_IDCliente(MySQLHelper::getLastID());
        $oClienteDAO = new ClienteDAO();
        if (!$oClienteDAO->Add($oCliente)) {

            $Respuesta = array('Codigo' => 3, 'Mensaje' => 'Error, No se pudo insertar el Usuario');
            echo \json_encode($Respuesta);
            exit();
        }

        $Respuesta = array('Codigo' => 1, 'Mensaje' => 'Exito', 'Rol' => 'Cliente');
        \session_start();
        $_SESSION['UsuarioLogueado'] = array('Nombre' => $oCliente->getNombre(), 'Correo' => $oUsuario->getCorreo(), 'Rol' => 'Cliente');
        echo \json_encode($Respuesta);
    }


    public function RegistroProveedor()
    {//Metodo que se va llamar al JS por medio de Ajax
            
        //Registro Cliente o Proveedor
        if (!isset($_POST["DatosRegistro"])) {
            parent::toView('Error', 'PageNotFound');
        }

        $DataRegister = \json_decode($_POST["DatosRegistro"], true);

        $oUsuario = new Usuario();
        $oUsuario->setActivo(1);
        $oUsuario->setIDRol(2);
        $oUsuario->setFechaRegistro(\date('Y-m-d H:i:s'));
        $oUsuario->setCorreo($DataRegister["Correo"]);
        $oUsuario->setSalt(\mcrypt_create_iv(32));
        $oUsuario->setContrasena(\hex2bin(\hash('sha256', $DataRegister['Contrasena'] . $oUsuario->getSalt())));
        $oProveedor = new Proveedor();
        $oProveedor->setActivo(1);
        $oProveedor->setNombreEmpresa($DataRegister['NombreEmpresa']);
        $oProveedor->setNombrePersonaConacto($DataRegister['NombrePersonaContacto']);
        $oProveedor->setURL($DataRegister['URL']);
        $oProveedor->setEmailPersonaContacto($DataRegister['EmailPersonaContacto']);

        $oUsuarioDao = new UsuarioDAO();

        if ($oUsuarioDao->ExistsCorreo($oUsuario)) {
            $Respuesta = array('Codigo' => 3, 'Mensaje' => 'Error, El Usuario ya esta registrado');
            echo \json_encode($Respuesta);
            exit();
        }

        if (!$oUsuarioDao->Add($oUsuario)) {
            $Respuesta = array('Codigo' => 3, 'Mensaje' => 'Error, No se pudo insertar el Usuario');
            echo \json_encode($Respuesta);
            exit();
        }

        $oProveedor->setPK_IDProveedor(MySQLHelper::getLastID());
        $oProveedorDAO = new ProveedorDAO();

        if (!$oProveedorDAO->Add($oProveedor)) {
            $Respuesta = array('Codigo' => 3, 'Mensaje' => 'Error, No se pudo insertar el Usuario');
            echo \json_encode($Respuesta);
            exit();
        }


        $Respuesta = array('Codigo' => 1, 'Mensaje' => 'Exito', 'Rol' => 'Proveedor');
        \session_start();
        $_SESSION['UsuarioLogueado'] = array('Nombre' => $oProveedor->getNombreEmpresa(), 'PK_Correo' => $oUsuario->getCorreo(), 'Rol' => 'Proveedor');
        echo \json_encode($Respuesta);

    }



    public function Login()
    { //Metodo que se va llamar al JS por medio de Ajax
         
        //Login Cliente - Proveedor
        if (!isset($_POST["DatosLogin"])) {
            parent::toView('', '');
        }

        $DataLogin = \json_decode($_POST["DatosLogin"], true);
        $oUsuarioDAO = new UsuarioDAO();
        $oUsuario = new Usuario();
        $oUsuario->setCorreo($DataLogin["PK_Correo"]);

        if (!$oUsuarioDAO->ExistsCorreo($oUsuario)) {
            $Respuesta = array('Codigo' => 3, 'Mensaje' => 'Error, Usuario no registrado');
            echo \json_encode($Respuesta);
            exit();
        }

        $Salt = $oUsuarioDAO->SelectSaltByPrimaryKey($oUsuario);
        $oUsuario->setContrasena(\hex2bin(\hash('sha256', $DataLogin['Contrasena'] . $Salt)));

        $Logued = $oUsuarioDAO->Login($oUsuario);

        if (Count($Logued) <> 0) {
            $Nombre;
            switch ($Logued['DescripcionRol']) {
                case 'Cliente':
                    $oClienteDAO = new ClienteDAO();
                    $oCliente = new Cliente();
                    $oCliente->setPK_IDCliente($Logued['PK_IDUsuario']);
                    $oCliente = $oClienteDAO->SelectByPrimaryKey($oCliente);
                    $Nombre = $oCliente['Nombre'];
                    break;
                case 'Proveedor':
                    $oProveedorDAO = new ProveedorDAO();
                    $oProveedor = new Proveedor();
                    $oProveedor->setPK_IDProveedor($Logued['PK_IDUsuario']);
                    $oProveedor = $oProveedorDAO->SelectByPrimaryKey($oProveedor);
                    $Nombre = $oProveedor['NombreEmpresa'];
                    break;
                default:
                    $Respuesta = array('Codigo' => 3, 'Mensaje' => 'Error procesando la solicitud');
                    echo \json_encode($Respuesta);
                    exit();
                    break;
            }

            $Respuesta = array('Codigo' => 1, 'Mensaje' => 'Exito', 'Rol' => $Logued['DescripcionRol']);
            \session_start();
            $_SESSION['UsuarioLogueado'] = array('Nombre' => $Nombre, 'Correo' => $Logued['Correo'], 'Rol' => $Logued['DescripcionRol']);
            echo \json_encode($Respuesta);
        } else {
            echo \json_encode(array('Codigo' => 3, 'Mensaje' => 'Error, Correo o Contraseña Incorrectos'));
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
  