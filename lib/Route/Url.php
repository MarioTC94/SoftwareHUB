<?php

/**
 * URL lib file
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


namespace lib\Route;

class Url
{

    public static function toAction($controller, $action, $id = null)
    {
        if ($id == null) {
            $urlString = APP_URL . "{$controller}/{$action}";
        } else {
            $urlString = APP_URL . "{$controller}/{$action}/{$id}";
        }
        return $urlString;
    }
}

