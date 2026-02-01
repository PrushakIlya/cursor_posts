<?php

namespace Framework\Console;

use Framework\Database\Connection;
use Framework\Database\SeederRunner;

class SeedCommand
{
    public function __invoke(array $config): int
    {
        $connection = new Connection($config);

        $runner = new SeederRunner(
            $connection,
            ROOT_PATH . '/database/seeders'
        );

        echo "Running seeders...\n";

        $runner->run();

        echo "Seeders completed.\n";

        return 0;
    }
}
