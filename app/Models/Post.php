<?php

namespace App\Models;

use Framework\Models\Model;

class Post extends Model
{
    protected string $table = 'posts';

    /** @return list of posts for home page: 3 per category, newest first (publication_date desc, then id desc) */
    public function getByCategoryId(int $categoryId, int $limit = 3): array
    {
        $stmt = $this->connection->getPdo()->prepare(
            "SELECT * FROM {$this->table} WHERE category_id = :category_id ORDER BY publication_date DESC, id DESC LIMIT :limit"
        );

        $stmt->bindValue('category_id', $categoryId, \PDO::PARAM_INT);
        $stmt->bindValue('limit', $limit, \PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function find(int $id): ?array
    {
        $stmt = $this->connection->getPdo()->prepare("SELECT * FROM {$this->table} WHERE id = :id");
        $stmt->execute(['id' => $id]);

        $row = $stmt->fetch(\PDO::FETCH_ASSOC);

        return $row ?: null;
    }

    public function incrementViews(int $id): void
    {
        $stmt = $this->connection->getPdo()->prepare(
            "UPDATE {$this->table} SET count_views = count_views + 1 WHERE id = :id"
        );

        $stmt->execute(['id' => $id]);
    }

    private const ALLOWED_ORDER = ['publication_date', 'count_views'];

    public function getByCategoryIdPaginated(int $categoryId, string $orderBy, string $dir, int $limit, int $offset): array
    {
        $orderBy = in_array($orderBy, self::ALLOWED_ORDER, true) ? $orderBy : 'publication_date';

        $dir = strtoupper($dir) === 'ASC' ? 'ASC' : 'DESC';

        $stmt = $this->connection->getPdo()->prepare(
            "SELECT * FROM {$this->table} WHERE category_id = :category_id ORDER BY {$orderBy} {$dir} LIMIT :limit OFFSET :offset"
        );

        $stmt->bindValue('category_id', $categoryId, \PDO::PARAM_INT);
        $stmt->bindValue('limit', $limit, \PDO::PARAM_INT);
        $stmt->bindValue('offset', $offset, \PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function countByCategoryId(int $categoryId): int
    {
        $stmt = $this->connection->getPdo()->prepare("SELECT COUNT(*) FROM {$this->table} WHERE category_id = :category_id");
        $stmt->execute(['category_id' => $categoryId]);

        return (int) $stmt->fetchColumn();
    }

    public function getRandomByCategoryId(int $categoryId, int $excludeId, int $limit = 3): array
    {
        $stmt = $this->connection->getPdo()->prepare(
            "SELECT * FROM {$this->table} WHERE category_id = :category_id AND id != :exclude_id ORDER BY RAND() LIMIT :limit"
        );

        $stmt->bindValue('category_id', $categoryId, \PDO::PARAM_INT);
        $stmt->bindValue('exclude_id', $excludeId, \PDO::PARAM_INT);
        $stmt->bindValue('limit', $limit, \PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}
