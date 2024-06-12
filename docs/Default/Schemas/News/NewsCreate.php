<?php

namespace Docs\Default\Schemas\News;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(required={"title", "content", "categories"})
 */
class NewsCreate
{
    /**
     * @OA\Property(maximum="255")
     */
    public string $title;

    /**
     * @OA\Property()
     */
    public string $content;

    /**
     * @OA\Property(
     *     type="array",
     *
     *     @OA\Items(type="integer"),
     *   description="Category IDs",
     *  example={1, 2, 3}
     * )
     */
    public array $categories;
}
