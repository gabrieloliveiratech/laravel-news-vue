<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\Contracts\CategoryServiceInterface;

class CategoryController extends Controller
{
    public function __construct(private CategoryServiceInterface $categoryService)
    {
    }

    public function index()
    {
        return view('components.category.index');
    }

    public function show($id)
    {
        $category = $this->categoryService->getById($id);

        return view('components.category.show', ['category' => $category]);
    }

    public function create()
    {
        return view('components.category.create');
    }
}
