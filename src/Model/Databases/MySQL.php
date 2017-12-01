<?php

class MySQL
{

    private static $connection;

	private $HOST = '';
	private $USER = '';
	private $PASS = '';
	private $DB = '';

    public final function OPEN_CONECTION(){
        if (!isset(self::$connection)) {
            self::$connection = new mysqli($this->HOST, $this->USER, $this->PASS, $this->DB);
        }
        if (self::$connection->connect_error) {
            throw new Exception("Cannot connect to DB, please verify values", 1);
        }
        self::$connection->set_charset("utf8");
        return self::$connection;
        
    }

    public final function CLOSE_CONNECTION(){
        if(self::$connection){
            self::$connection->close();
        }
    }

    public final function START_TRANSACTION(){
        if(!self::$connection->begin_transaction()){
            throw new Exception(self::$connection->error, 1);
        }
    }

    public final function COMMIT_TRANSACTION(){
        self::$connection->commit();
    }

    public final function ROLLBACK_TRANSACTION(){
        self::$connection->rollback();
    }

    /***********************************************/

    public final function PREPARE($query)
    {
        $STMT =  self::OPEN_CONECTION()->prepare($query);
        if($STMT === false){
            throw new Exception(self::$connection->error, 1);
        }
        return $STMT;
    }

    public final function SELECT($STMT)
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

    public final function FirstOrDefault($STMT)
    {
        if ($STMT->execute()) {
            $result = $STMT->get_result();
            $row = $result->fetch_array();
            return $row;
        } else {
            return false;
        }
    }

    public final function CMD($STMT)
    {
        if ($STMT->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public final function TypeParam($param){
        if (ctype_digit((string) $param)){
            if($param <= PHP_INT_MAX){
                return 'i';
            }else{
                return 's';
            }
        }
        if (is_numeric($param)){
            return 'd';
        }
        return 's';
    }
}