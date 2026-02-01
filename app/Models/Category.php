<?php

namespace App\Models;

use Framework\Models\Model;

class Category extends Model
{
    protected string $table = 'category';

    public function find(int $id): ?array
    {
        $stmt = $this->connection->getPdo()->prepare("SELECT * FROM {$this->table} WHERE id = :id");
        $stmt->execute(['id' => $id]);

        $row = $stmt->fetch(\PDO::FETCH_ASSOC);

        return $row ?: null;
    }
}
