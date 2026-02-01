<?php

namespace App\Controllers;

use App\Models\Category;
use App\Models\Post;
use Framework\Controllers\Controller;

class HomeController extends Controller
{
    public function index(): string
    {
        $connection = $this->container->make(\Framework\Database\Connection::class);
        $categoryModel = new Category($connection);
        $postModel = new Post($connection);

        $categories = $categoryModel->all();
        $sections = [];

        foreach ($categories as $category) {
            $posts = $postModel->getByCategoryId($category['id'], 3);

            if (count($posts) > 0) {
                $sections[] = [
                    'category' => $category,
                    'posts'    => $posts,
                ];
            }
        }

        return $this->view('home', [
            'title'     => 'Home',
            'sections'  => $sections,
        ]);
    }
}
