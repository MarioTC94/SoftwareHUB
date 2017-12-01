<?php

/**
 * MySQL lib file
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

namespace lib\Model\Databases;

use mysqli;

class MySQL
{

    private static $connection;

    protected final function getDataSource()
    {
        if (!isset(self::$connection)) {
            $CONF = \parse_ini_file('config/config.ini');
            self::$connection = new \mysqli($CONF['DB_HOST'], $CONF['DB_USER'], $CONF['DB_PASS'], $CONF['DB_NAME']);
        }
        if (self::$connection->connect_error) {
            throw new \Exception("Cannot connect to DB, please verify values", 1);
        }
        self::$connection->set_charset("utf8");
        return self::$connection;

    }

    protected final function CLOSE_CONNECTION()
    {
        if (self::$connection) {
            self::$connection->close();
        }
    }

    protected final function START_TRANSACTION()
    {
        if (!self::$connection->begin_transaction()) {
            throw new \Exception(self::$connection->error, 1);
        }
    }

    protected final function COMMIT_TRANSACTION()
    {
        self::$connection->commit();
    }

    protected final function ROLLBACK_TRANSACTION()
    {
        self::$connection->rollback();
    }

    /***********************************************/

    protected final function PREPARE($query)
    {
        $STMT = self::getDataSource()->prepare($query);
        if ($STMT === false) {
            throw new \Exception(self::$connection->error, 1);
        }
        return $STMT;
    }

    protected final function SELECT($STMT)
    {
        if ($STMT->execute()) {
            $result = $STMT->get_result();
            $rows = array();
            while ($row = $result->fetch_array()) {
                $rows[] = $row;
            }
            return $rows;
        } else {
            return false;
        }
    }

    protected final function FirstOrDefault($STMT)
    {
        if ($STMT->execute()) {
            $result = $STMT->get_result();
            $row = $result->fetch_array();
            return $row;
        } else {
            return false;
        }
    }

    protected final function CMD($STMT)
    {
        if ($STMT->execute()) {
            return true;
        } else {
            return false;
        }
    }

    protected final function TypeParam($param)
    {
        if (ctype_digit((string)$param)) {
            if ($param <= PHP_INT_MAX) {
                return 'i';
            } else {
                return 's';
            }
        }
        if (is_numeric($param)) {
            return 'd';
        }
        return 's';
    }
}