<?php

namespace Framework\Console;

use Framework\Database\Migrator;

class MigrateCommand
{
    public function __invoke(array $config): int
    {
        $migrator = new Migrator(
            $config,
            ROOT_PATH . '/database/migrations'
        );

        echo "Running migrations...\n";

        $migrator->run();

        echo "Migrations completed.\n";

        return 0;
    }
}
