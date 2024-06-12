<?php

namespace App\Repositories\Contracts;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface NewsRepository.
 */
interface NewsRepository extends RepositoryInterface
{
    public function getAll();
}
