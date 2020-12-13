<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class DatabaseSingleton
{
    private static $instance = null;

    private function __construct()
    {
        $conn_string = "host=localhost port=5432 dbname=xsellco user=postgres password=123456";
        $this->connection = pg_connect($conn_string);
    }

    public static function getInstance()
    {
        if (null === self::$instance) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    private $connection = null;

    public function query($sql)
    {
//        $sql = pg_escape_string($sql);
        return pg_query($this->connection, $sql);
    }

    public function fetch_all($result)
    {
        return pg_fetch_all($result);
    }

    public function fetch_assoc($result)
    {
        return pg_fetch_assoc($result);
    }
}