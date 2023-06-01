<?php
namespace NW\Dao;

use NW\Exceptions\NoInstanceException;

class Conn
{
    private static $conn = null;
    private function __construct()
    {
        throw new NoInstanceException("No Instance Allowed");
    }
    private function __clone()
    {
        throw new NoInstanceException("No Instance Allowed");
    }
    public static function getConn()
    {
        if (self::$conn == null) {
            self::$conn = new \PDO('sqlite::memory:');
        }
        return self::$conn;
    }
}
