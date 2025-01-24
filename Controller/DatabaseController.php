<?php
namespace Controller;


use Exception;
use PDO;
use PDOException;
global $config;
$config = include_once 'Config/config.php';

class DatabaseController
{
    private PDO $pdo;

    public function __construct()
    {
        global $config; // Éviter si possible !

        if (!isset($config['database'])) {
            throw new Exception('Configuration de base de données manquante.');
        }

        $databaseConfig = $config['database'];

        $PDO_Link = "mysql:host={$databaseConfig['host']};dbname={$databaseConfig['dbname']};charset={$databaseConfig['charset']}";

        try {
            $this->pdo = new PDO($PDO_Link, $databaseConfig['username'], $databaseConfig['password'], [
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