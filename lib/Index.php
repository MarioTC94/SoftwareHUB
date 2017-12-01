<?php

/**
 * Index lib file
 *
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * 
 * @author        Hersey Aguilar
 * @copyright     Copyright (c) Hersey Aguilar. (https://github.com/lHersey)
 * @link          https://github.com/lHersey/AsphyoPHP AsphyoPHP Project
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

require_once 'Core/Core.php';
require_once 'lib/Helper/Autoloader.php';

$controller = "";
$action = "";
$id = "";

if (isset($_GET['controller'])) {
    $controller = $_GET['controller'];
    if (isset($_GET['action'])) {
        $action = $_GET['action'];
        isset($_GET['id']) ? $id = $_GET['id'] : $id = null;
    } else {
        $action = 'Index';
    }
} else {
    $controller = 'Home';
    $action = 'Index';
}

if (file_exists('src/Controller/' . $controller . 'Controller.php')) {
    $Namecontroller = "\\src\\Controller\\" . $controller . 'Controller';
    if (method_exists(new $Namecontroller, $action)) {
        call($controller, $action, $id);
    } else {
        call('Error', 'PageNotFound');
    }
} else {
    call('Error', 'PageNotFound');
}

#Funcion que se llamara despues para redireccionar
function call($controller, $action, $id = null)
{
    $Namecontroller = '\\src\\Controller\\' . $controller . 'Controller';
    $oController = new $Namecontroller;

    if ($id == null) {
        $oController->{$action}();
    } else {
        $oController->{$action}($id);
    }
}
?>