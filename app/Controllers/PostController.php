<?php

namespace App\Controllers;

use App\Models\Post;
use Framework\Controllers\Controller;

class PostController extends Controller
{
    public function show(int $id): string
    {
        $connection = $this->container->make(\Framework\Database\Connection::class);
        $postModel = new Post($connection);
        $post = $postModel->find($id);

        if ($post === null) {
            return $this->view('errors.404');
        }

        $postModel->incrementViews($id);
        $post['count_views'] = ($post['count_views'] ?? 0) + 1;
        $recommendedPosts = $postModel->getRandomByCategoryId($post['category_id'], $id, 3);

        return $this->view('posts.show', [
            'post' => $post,
            'recommendedPosts' => $recommendedPosts,
        ]);
    }
}
