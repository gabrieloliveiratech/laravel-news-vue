<?php

namespace Docs\Default\Schemas\Category;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema()
 */
class CategoryResponse
{
    /**
     * @OA\Property(description="The ID of the category", example=1)
     */
    public int $id;

    /**
     * @OA\Property(description="The name of the category", example="Category 1")
     */
    public string $name;
}
