<?php
require_once __DIR__ . '/vendor/autoload.php';

use \NW\Dao\Conn;



class Implementation
{
    public function run():void
    {
        Conn::getConn();
    }
}

$imp = new Implementation();
$imp->run();
