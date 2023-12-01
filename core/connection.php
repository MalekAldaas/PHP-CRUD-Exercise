<?php

require_once("config.php");

class Connection
{
    private static ?mysqli $connection = null;

    private function __construct()
    {
        // private construct to prevent instation
    }

    public static function getInstance(): mysqli
    {
        if (self::$connection === null) {
            // If not, create a new connection
            self::$connection = new mysqli(
                DATABASE_CONFIG['host'],
                DATABASE_CONFIG['username'],
                DATABASE_CONFIG['password'],
                DATABASE_CONFIG['database']
            );

            // Check if the connection was successful
            if (self::$connection->connect_error) {
                die("Connection failed: " . self::$connection->connect_error);
            }
        }
        return self::$connection;
    }

}


