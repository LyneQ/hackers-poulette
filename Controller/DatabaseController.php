<?php
namespace Controller;

use Config;
use Exception;
use PDO;
use PDOException;
// global $config;
// $config = include_once 'Config/config.php';
require 'Config/config.php';

class DatabaseController
{
    private PDO $pdo;

    public function __construct()
    {
        global $config; // Éviter si possible !

        if (!class_exists('Config')) {
            throw new Exception('Configuration de base de données manquante.');
        }

        $PDO_Link = 'mysql:host='.Config::HOST.';dbname='.Config::DBNAME.';charset='.Config::CHARSET;

        try {
            $this->pdo = new PDO($PDO_Link, Config::USERNAME, Config::PASSWORD, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ]);
        } catch (PDOException $e) {
            die('Database connection failed: ' . $e->getMessage());
        }
    }

    public function verifyConnection(): void
    {
        print_r( $this->pdo ? 'Connection OK' : 'Connection failed' );
    }

    public function getConnection()
    {
        return $this->pdo;
    }
}
