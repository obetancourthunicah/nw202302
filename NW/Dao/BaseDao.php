<?php

namespace NW\Dao;

abstract class BaseDao
{
    public static function getConn()
    {
        return Conn::getConn();
    }
    protected static function find(string $sqlQuery, array $parameters = array())
    {
        // "SELECT * from USUARIOS where username='".$username."';"; SQL INJECTION
        $sqlCommand = self::getConn()->prepare($sqlQuery);
        foreach ($parameters as $parameter => &$value) {
            $sqlCommand->bindParam(":" . $parameter, $value);
        }
        $sqlCommand->execute();
        $sqlCommand->setFetchMode(\PDO::FETCH_ASSOC);
        return $sqlCommand->fetchAll();
    }
    protected static function findOne(string $sqlQuery, array $parameters = array())
    {
        // "SELECT * from USUARIOS where username='".$username."';"; SQL INJECTION
        $sqlCommand = self::getConn()->prepare($sqlQuery);
        foreach ($parameters as $parameter => &$value) {
            $sqlCommand->bindParam(":" . $parameter, $value);
        }
        $sqlCommand->execute();
        $sqlCommand->setFetchMode(\PDO::FETCH_ASSOC);
        return $sqlCommand->fetch();
    }
    protected static function executeNonQuery(string $sqlQuery, array $parameters = array())
    {
        // "SELECT * from USUARIOS where username='".$username."';"; SQL INJECTION
        $sqlCommand = self::getConn()->prepare($sqlQuery);
        foreach ($parameters as $parameter => &$value) {
            $sqlCommand->bindParam(":" . $parameter, $value);
        }
        return $sqlCommand->execute();
    }
}
