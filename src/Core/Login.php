<?php

namespace Core;

use Core\Config;
use TexLab\MyDB\DB;
use TexLab\MyDB\DbEntity;
use TexLab\MyDB\QueryBuilderTrait;

class Login
{
    private $table;

    public function __construct()
    {
        $this->table = new DbEntity(
            Config::MYSQL_TABLE,
            DB::Link([
                'host' => Config::MYSQL_HOST,
                'username' => Config::MYSQL_USER_NAME,
                'password' => Config::MYSQL_PASSWORD,
                'dbname' => Config::MYSQL_DATABASE
            ])
        );
    }

    public function userCheck2(string $login, string $password): bool
    {
        return !empty($this
            ->table
            ->setWhere('login="' . $login . '" AND password="' . $password . '"')
            ->get()
        );
    }

}