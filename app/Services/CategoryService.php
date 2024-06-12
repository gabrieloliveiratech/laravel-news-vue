<?php

namespace App\Services;

use App\Models\Category;
use App\Repositories\Contracts\CategoryRepository;
use App\Services\Contracts\CategoryServiceInterface;

class CategoryService implements CategoryServiceInterface
{
    public function __construct(protected CategoryRepository $categorysRepository)
    {
    }

    public function store(array $data): Category
    {
        return $this->categorysRepository->create($data);
    }

    public function getAll()
    {
        return $this->categorysRepository->getAll();
    }

    public function getById(int $id): Category
    {
        return $this->categorysRepository->find($id);
    }
}
