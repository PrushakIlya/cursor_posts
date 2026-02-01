<?php

namespace Framework\Console;

class CommandRunner
{
    /** @var array<string, callable> */
    private array $commands = [];

    public function register(string $name, callable $handler): void
    {
        $this->commands[$name] = $handler;
    }

    public function run(string $name, array $config): int
    {
        if (!isset($this->commands[$name])) {
            $this->printUsage();

            return 1;
        }

        return $this->commands[$name]($config);
    }

    public function printUsage(): void
    {
        echo "Usage:\n";

        foreach (array_keys($this->commands) as $cmd) {
            $desc = $this->getDescription($cmd);

            echo "  php console.php {$cmd}   - {$desc}\n";
        }
    }

    private function getDescription(string $cmd): string
    {
        $descriptions = [
            'migrate' => 'Run migrations (creates database and tables)',
            'seed'    => 'Run seeders',
        ];

        return $descriptions[$cmd] ?? '';
    }
}
