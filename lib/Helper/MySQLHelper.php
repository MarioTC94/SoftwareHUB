<?php

/**
 * Helper file
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

namespace lib\Helper {

   use lib\Core\Core;
   use lib\Model\Databases\MySQL;

   class MySQLHelper extends MySQL
   {

      public static function begin()
      {
         parent::START_TRANSACTION();
      }

      public static function commit()
      {
         parent::COMMIT_TRANSACTION();
      }

      public static function rollback()
      {
         parent::ROLLBACK_TRANSACTION();
      }

      public static function close()
      {
         parent::CLOSE_CONNECTION();
      }

      public static function getLastID()
      {
         return parent::GET_ID();
      }
   }
}
