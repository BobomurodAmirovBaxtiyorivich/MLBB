<?php

class DB
{

    public $pdo;

    public function __construct()
    {
        $this->pdo = new PDO("mysql:host=localhost;dbname=mlbb", 'root', 'My$par0l');

        return $this->pdo;
    }
}
