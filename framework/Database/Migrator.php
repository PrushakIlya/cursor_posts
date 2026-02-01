<?php

namespace Framework\Database;

use PDO;

class Migrator
{
    private array $config;
    private string $migrationsPath;
    private string $table = 'migrations';

    public function __construct(array $config, string $migrationsPath)
    {
        $this->config = $config;
        $this->migrationsPath = $migrationsPath;
    }

    private function connectWithoutDatabase(): PDO
    {
        $dsn = sprintf(
            '%s:host=%s;port=%s;charset=%s',
            $this->config['driver'],
            $this->config['host'],
            $this->config['port'],
            $this->config['charset']
        );
        return new PDO(
            $dsn,
            $this->config['username'],
            $this->config['password'],
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );
    }

    private function getConnection(): PDO
    {
        $dsn = sprintf(
            '%s:host=%s;port=%s;dbname=%s;charset=%s',
            $this->config['driver'],
            $this->config['host'],
            $this->config['port'],
            $this->config['database'],
            $this->config['charset']
        );
        return new PDO(
            $dsn,
            $this->config['username'],
            $this->config['password'],
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );
    }

    public function createDatabase(): void
    {
        $pdo = $this->connectWithoutDatabase();
        $name = $this->config['database'];
        $pdo->exec("CREATE DATABASE IF NOT EXISTS `{$name}` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
    }

    public function run(): void
    {
        $this->createDatabase();
        $pdo = $this->getConnection();
        $this->ensureMigrationsTable($pdo);

        $ran = $this->getRanMigrations($pdo);
        $files = $this->getMigrationFiles();

        foreach ($files as $file) {
            $name = basename($file, '.php');

            if (in_array($name, $ran, true)) {
                continue;
            }

            $migration = require $file;

            $pdo->exec($migration['up']);

            $stmt = $pdo->prepare("INSERT INTO {$this->table} (migration) VALUES (?)");
            $stmt->execute([$name]);

            echo "Ran: {$name}\n";
        }
    }

    private function ensureMigrationsTable(PDO $pdo): void
    {
        $pdo->exec("CREATE TABLE IF NOT EXISTS {$this->table} (
            id INT AUTO_INCREMENT PRIMARY KEY,
            migration VARCHAR(255) NOT NULL,
            run_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )");
    }

    private function getRanMigrations(PDO $pdo): array
    {
        $stmt = $pdo->query("SELECT migration FROM {$this->table} ORDER BY id");

        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    private function getMigrationFiles(): array
    {
        $files = glob($this->migrationsPath . '/*.php');

        sort($files);

        return $files;
    }
}
