<?php

/**
 * Console commands:
 *   php console.php migrate   - Run migrations
 *   php console.php seed      - Run seeders
 */

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/framework/bootstrap.php';

$config = require ROOT_PATH . '/config/database.php';
$commandName = $argv[1] ?? null;

$runner = new Framework\Console\CommandRunner();
$runner->register('migrate', new Framework\Console\MigrateCommand());
$runner->register('seed', new Framework\Console\SeedCommand());

if ($commandName === null) {
    $runner->printUsage();
    exit(1);
}

exit($runner->run($commandName, $config));
