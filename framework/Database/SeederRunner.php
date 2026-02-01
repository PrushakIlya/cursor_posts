<?php

namespace Framework\Database;

class SeederRunner
{
    private Connection $connection;
    private string $seedersPath;

    public function __construct(Connection $connection, string $seedersPath)
    {
        $this->connection = $connection;
        $this->seedersPath = $seedersPath;
    }

    public function run(): void
    {
        $files = glob($this->seedersPath . '/*.php');

        sort($files);

        foreach ($files as $file) {
            $name = basename($file, '.php');
            $class = require $file;

            if (is_object($class) && method_exists($class, 'run')) {
                $class->run($this->connection);

                echo "Seeded: {$name}\n";
            }
        }
    }
}
