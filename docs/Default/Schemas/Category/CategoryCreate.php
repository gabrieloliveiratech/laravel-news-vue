<?php

namespace Docs\Default\Schemas\Category;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(required={"name"})
 */
class CategoryCreate
{
    /**
     * @OA\Property(description="The name of the category", example="Category 1")
     */
    public string $name;
}
