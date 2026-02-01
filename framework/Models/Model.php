<?php

namespace Framework\Models;

use Framework\Database\Connection;

abstract class Model
{
    protected Connection $connection;
    protected string $table = '';

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function all(): array
    {
        $stmt = $this->connection->query("SELECT * FROM {$this->table}");

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}
