<?php

 class Database
 {
    private static $dbhost = "localhost";
    private static $dbName = "magazin_code";
    private static $dbUser = "root";
    private static $dbUserPassword = "salgend10";
    private static $connection = null;
 
     public static function connect()
     {
        try
        {
            self::$connection = new PDO("mysql:host=" . self::$dbhost . ";dbname=" . self::$dbName,self::$dbUser,self::$dbUserPassword);
        }
        catch(PDOException $e)
        {
            die($e->getMessage());
        }
        return self::$connection;
     }

     function disconnect()
     {
         self::$connection = null;
     }
 }

 Database::connect();

?>