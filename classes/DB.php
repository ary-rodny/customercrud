<?php
namespace Classes;

use Classes\Config;
use PDO;
use PDOException;
class DB
{

    private static $instance = null;

    /**
     *
     */
    private function __construct()
    {  
        
            $host = Config::get('db.host');
            $user = Config::get('db.user');
            $pass = Config::get('db.password');
            $dbname = Config::get('db.dbname');
            $dsn = "mysql:host={$host};dbname={$dbname}";
        try{
            $pdo = new PDO($dsn,$user,$pass,[PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
            $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return $pdo;
        }
        catch( PDOException $ex){
            die('Error: '.$ex->getMessage());
        }


    }

    /**
     * 
     * @return PDO
     * 
     */
    public static function connect()
    {
        if(self::$instance == null){
            self::$instance = new static;
        }
        return self::$instance;
    }
}