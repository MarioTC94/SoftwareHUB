<?php

/**
 * Autoloader file
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
spl_autoload_register(function ($class) {
   $path = str_replace('\\', '/', $class) . '.php';
   if (is_file($path)) {
      include_once($path);
      return true;
   }
   return false;
});
?>