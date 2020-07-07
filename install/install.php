<?php

require "vendor/autoload.php";

use TexLab\MyDB\Runner;
use TexLab\MyDB\DB;
use core\Config;


class MyRunner extends Runner
{
    protected function errorHandler(array $error)
    {
        echo $error["error"] . "\n";
        echo $error["sql"] . "\n";
    }
}

$runner = new MyRunner(DB::Link([
    'host' => Config::MYSQL_HOST,
    'username' => Config::MYSQL_USER_NAME,
    'dbname' => Config::MYSQL_DATABASE
]));

foreach (explode(";", file_get_contents('install/feedbackform.sql')) as $value) {
    $runner->runSQL($value . ";");
}