<?php

namespace App\Core;

use PDO;

abstract class Database {

    private static $_db;

    private static function setDb()
    {
        $host = $_ENV['DB_HOST'];
        $port = $_ENV['DB_PORT'];
        $dbName = $_ENV['DB_NAME'];
        $sqlUser = $_ENV['DB_USER'];
        $sqlPassword = $_ENV['DB_PASSWORD'];

        try {
            self::$_db = new \PDO(
                "mysql:host=$host;port=$port;dbname=$dbName;charset=utf8",
                $sqlUser,
                $sqlPassword,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false
                ]
            );
        } catch (\PDOException $e) {

            throw new \RuntimeException(
                "Erreur de connexion à la base de données : " . $e->getMessage()
            );
        }
    }

    protected function getDb()
    {

        if(self::$_db == null)
        {
            self::setDb();
        }

        return self::$_db;
    }
}