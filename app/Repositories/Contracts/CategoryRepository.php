<?php

namespace App\Repositories\Contracts;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface CategoryRepository.
 */
interface CategoryRepository extends RepositoryInterface
{
    public function getAll();
}
