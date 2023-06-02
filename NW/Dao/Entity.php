<?php
namespace NW\Dao;

class Entity extends BaseDao {
    public static function createTable()
    {
        $sqlQuery = "CREATE TABLE IF NOT EXISTS entity (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            name TEXT NOT NULL,
            status TEXT NOT NULL
        ); ";
        return self::executeNonQuery($sqlQuery);
    }
    public static function findAll(){
        $sqlQuery = "SELECT * from entity;";
        return self::find($sqlQuery);
    }
    public static function create($name, $status)
    {
        $sqlQuery = "INSERT INTO entity (name, status) values (:name, :status);";
        return self::executeNonQuery($sqlQuery, array("name"=>$name, "status"=>$status));
    }
    public static function findById(int $id)
    {
        $sqlQuery = "SELECT * from entity where id = :id;";
        return self::findOne($sqlQuery, array("id"=> $id));
    }

}
