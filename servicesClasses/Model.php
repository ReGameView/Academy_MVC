<?php
include_once __DIR__ . '/traits/TModel.php';


class Model
{
    public PDO $dsh;

    public function __construct()
    {
        $configDB = require __DIR__ .'/../config/db.php';
        $this->dsh = new PDO($configDB['driver'], $configDB['user'], $configDB['password']);
    }
}
