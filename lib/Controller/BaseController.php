<?php

/**
 * Controller file
 *
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * 
 * @author        Hersey Aguilar
 * @copyright     Copyright (c) Hersey Aguilar. (https://github.com/lHersey)
 * @link          https://github.com/lHersey/AsphyoPHP/ AsphyoPHP Project
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */


namespace lib\Controller;

use lib\Route\Url;
use lib\Helper\Html;

class BaseController
{
    protected function View($model = null)
    {
        $trace = debug_backtrace();

        $controller = new \ReflectionClass($trace[1]['class']);
        $controller = substr($controller->getShortName(), 0, strlen($controller->getShortName()) - strlen('Controller'));
        $action = $trace[1]['function'];

        if (!file_exists(HTML_DIR . $controller . '/' . $action . '.php')) {
            throw new \Exception("Parametros de View() incorrectos: URL_NOT_EXISTS: " . HTML_DIR . $controller . '/' . $action . '.php', 1);
        }

        $file = HTML_DIR . $controller . '/' . $action . '.php';

        if (file_exists($file)) {

            $Url = new Url();
            $Html = new Html();

            include_once($file);
        } else {
            throw new \Exception('Error, Controller or action not found');
        }
    }

    protected function toView($controller, $action, $id = null)
    {
        if ($id == null) {
            $urlString = "Location: " . APP_URL . "{$controller}/{$action}";
        } else {
            $urlString = "Location: " . APP_URL . "{$controller}/{$action}/{$id}";
        }
        header($urlString);
    }
}
