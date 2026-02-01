<?php

namespace Database\Seeders;

use Framework\Database\Connection;

class PostSeeder
{
    private array $titles = ['About', 'News', 'Attention', 'Make', 'How to solve'];
    private array $topics = ['mobile phones', 'laptops', 'web', 'http'];

    private function randomSentence(int $minWords = 5, int $maxWords = 15): string
    {
        $words = ['Lorem', 'ipsum', 'dolor', 'sit', 'amet', 'consectetur', 'adipiscing', 'elit', 'sed', 'do', 'eiusmod', 'tempor', 'incididunt', 'ut', 'labore', 'et', 'dolore', 'magna', 'aliqua', 'Ut', 'enim', 'ad', 'minim', 'veniam', 'quis', 'nostrud', 'exercitation', 'ullamco', 'laboris'];

        $word = random_int($minWords, $maxWords);
        $text = [];

        for ($i = 0; $i < $word; $i++) {
            $text[] = $words[array_rand($words)];
        }

        return ucfirst(implode(' ', $text)) . '.';
    }

    private function randomParagraph(int $sentences = 3): string
    {
        $paragraph = [];

        for ($i = 0; $i < $sentences; $i++) {
            $paragraph[] = $this->randomSentence(8, 20);
        }

        return implode(' ', $paragraph);
    }

    public function run(Connection $connection): void
    {
        $sql = 'INSERT INTO posts (name, description, text, category_id, img_path, count_views, publication_date) 
                VALUES (:name, :description, :text, :category_id, :img_path, :count_views, :publication_date)';

        $stmt = $connection->getPdo()->prepare($sql);

        for ($i = 1; $i <= 100; $i++) {
            $title = $this->titles[array_rand($this->titles)] . ' ' . $this->topics[array_rand($this->topics)];
            $description = $this->randomSentence(10, 25);
            $text = $this->randomParagraph(5) . ' ' . $this->randomParagraph(4);
            $categoryId = random_int(1, 3);
            $imgPath = '/images/' . ((($i - 1) % 5) + 1) . '.jpg';
            $countViews = random_int(0, 50000);
            $publicationDate = date('Y-m-d', mt_rand(strtotime('2023-01-01'), strtotime('2025-12-31')));

            $stmt->execute([
                'name'             => $title . ' #' . $i,
                'description'      => $description,
                'text'             => $text,
                'category_id'      => $categoryId,
                'img_path'         => $imgPath,
                'count_views'      => $countViews,
                'publication_date' => $publicationDate,
            ]);
        }
    }
}

return new PostSeeder();
