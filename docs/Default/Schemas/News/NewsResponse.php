<?php

namespace Docs\Default\Schemas\News;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema()
 */
class NewsResponse
{
    /**
     * @OA\Property()
     */
    public int $id;

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
     *     @OA\Items(ref="#/components/schemas/CategoryResponse")
     * )
     */
    public array $categories;
}
