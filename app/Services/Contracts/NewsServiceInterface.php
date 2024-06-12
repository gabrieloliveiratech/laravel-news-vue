<?php

namespace App\Services\Contracts;

use App\Models\News;

interface NewsServiceInterface
{
    /**
     * Store a new notice.
     *
     * @return News
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
     * @return News
     */
    public function getById(int $id);
}
