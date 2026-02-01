<?php

namespace Database\Seeders;

use Framework\Database\Connection;


class CategorySeeder
{
    public function run(Connection $connection): void
    {
        $categories = [
            ['name' => 'Electronics', 'description' => 'Electronic devices and gadgets'],
            ['name' => 'Books', 'description' => 'Books and publications'],
            ['name' => 'Clothing', 'description' => 'Apparel and fashion'],
        ];

        $stmt = $connection->getPdo()->prepare(
            'INSERT INTO category (name, description) VALUES (:name, :description)'
        );

        foreach ($categories as $row) {
            $stmt->execute($row);
        }
    }
}

return new CategorySeeder();
