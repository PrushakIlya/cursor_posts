<?php

namespace App\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Services\CategoryService;
use Framework\Controllers\Controller;

class CategoryController extends Controller
{
    private const PER_PAGE = 9;

    public function index(): string
    {
        $connection = $this->container->make(\Framework\Database\Connection::class);
        $category = new Category($connection);
        $categories = $category->all();

        return $this->view('categories.index', ['categories' => $categories]);
    }

    public function posts(int $id): string
    {
        $connection = $this->container->make(\Framework\Database\Connection::class);
        $categoryModel = new Category($connection);
        $postModel = new Post($connection);

        $category = $categoryModel->find($id);

        if ($category === null) {
            return $this->view('errors.404');
        }

        $orderBy = $_GET['order'] ?? 'publication_date';
        $dir = $_GET['dir'] ?? 'desc';
        $page = max(1, (int) ($_GET['page'] ?? 1));

        $total = $postModel->countByCategoryId($id);
        $totalPages = max(1, (int) ceil($total / self::PER_PAGE));
        $page = min($page, $totalPages);
        $offset = ($page - 1) * self::PER_PAGE;

        $posts = $postModel->getByCategoryIdPaginated($id, $orderBy, $dir, self::PER_PAGE, $offset);

        $categoryService = new CategoryService();

        $activeLink = $categoryService->getFiltration($orderBy, $dir);

        return $this->view('categories.posts', [
            'categoryId'     => $id,
            'category'        => $category,
            'posts'           => $posts,
            'total'           => $total,
            'page'            => $page,
            'totalPages'      => $totalPages,
            'activeLink'      => $activeLink,
            'orderBy'         => $orderBy,
            'dir'             => $dir,
        ]);
    }
}
