<?php

namespace App\Services\Contracts;

use App\Models\Category;

interface CategoryServiceInterface
{
    /**
     * Store a new notice.
     *
     * @return Category
     */
    public function store(array $data);

    /**
     * Get all notices.
     *
     * @return mixed
     */
    public function getAll();

    /**
     * Get a notice by its ID.
     *
     * @return Category
     */
    public function getById(int $id);
}
