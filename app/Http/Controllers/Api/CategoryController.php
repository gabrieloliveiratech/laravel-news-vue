<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Resources\CategoryResource;
use App\Services\Contracts\CategoryServiceInterface;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct(private CategoryServiceInterface $categoryService)
    {
    }

    public function index(Request $request)
    {
        $categories = $this->categoryService->getAll();

        return CategoryResource::collection($categories);
    }

    public function show($id)
    {
        $category = $this->categoryService->getById($id);

        return new CategoryResource($category);
    }

    public function store(CategoryStoreRequest $request)
    {
        $category = $this->categoryService->store($request->validated());

        return new CategoryResource($category);
    }
}
