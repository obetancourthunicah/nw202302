<?php
require_once __DIR__ . '/vendor/autoload.php';

use \NW\Dao\Entity;



class Implementation
{
    public function run():void
    {
        //$createTableResp = Entity::createTable();
        //$createRowResp = Entity::create("prueba 2", "ACT");
        $rows = Entity::findAll();
        print_r($rows);
        echo '<hr/>';
        $oneRow = Entity::findById(2);
        print_r($oneRow);
    }
}

$imp = new Implementation();
$imp->run();
