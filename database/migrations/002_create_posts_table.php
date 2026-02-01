<?php

return [
    'up' => "
        CREATE TABLE IF NOT EXISTS posts (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            description VARCHAR(500) DEFAULT NULL,
            text TEXT,
            category_id INT NOT NULL,
            img_path VARCHAR(255) DEFAULT NULL,
            count_views INT UNSIGNED DEFAULT 0,
            publication_date DATE DEFAULT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            INDEX idx_category_id (category_id),
            INDEX idx_publication_date (publication_date),
            CONSTRAINT fk_posts_category FOREIGN KEY (category_id) REFERENCES category(id) ON DELETE CASCADE
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
    ",
    'down' => 'DROP TABLE IF EXISTS posts',
];
