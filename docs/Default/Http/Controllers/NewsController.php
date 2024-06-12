<?php

namespace Docs\Default\Http\Controllers;

use OpenApi\Annotations as OA;

class NewsController
{
    /**
     * @OA\Get(
     *      path="/api/news",
     *      summary="Get all news items",
     *      tags={"News"},
     *
     *      @OA\Parameter(
     *          in="query",
     *          name="filter[search]",
     *          required=false,
     *          description="Filter news by name, content, or category",
     *
     *          @OA\Schema(type="string")
     *      ),
     *
     *      @OA\Response(
     *          response=200,
     *          description="List of news items",
     *
     *          @OA\JsonContent(
     *              type="array",
     *
     *              @OA\Items(ref="#/components/schemas/NewsResponse")
     *          )
     *      ),
     *
     *      @OA\Response(
     *          response=404,
     *          description="News not found",
     *
     *          @OA\JsonContent(ref="#/components/schemas/NotFoundError")
     *      )
     * )
     */
    public function index()
    {
    }

    /**
     * @OA\Get(
     *      path="/api/news/{id}",
     *      summary="Get a specific news item",
     *      tags={"News"},
     *
     *      @OA\Parameter(
     *          in="path",
     *          name="id",
     *          required=true,
     *          description="News ID",
     *
     *          @OA\Schema(type="integer")
     *      ),
     *
     *      @OA\Response(
     *          response=200,
     *          description="News details",
     *
     *          @OA\JsonContent(ref="#/components/schemas/NewsResponse")
     *      ),
     *
     *      @OA\Response(
     *          response=404,
     *          description="News not found",
     *
     *          @OA\JsonContent(ref="#/components/schemas/NotFoundError")
     *      )
     * )
     */
    public function show($id)
    {
    }

    /**
     * @OA\Post(
     *      path="/api/news",
     *      summary="Create a new news item",
     *      tags={"News"},
     *
     *      @OA\RequestBody(
     *          description="News data",
     *          required=true,
     *
     *          @OA\JsonContent(ref="#/components/schemas/NewsCreate")
     *      ),
     *
     *      @OA\Response(
     *          response=201,
     *          description="News created successfully",
     *
     *          @OA\JsonContent(ref="#/components/schemas/NewsResponse")
     *      ),
     *
     *      @OA\Response(
     *          response=422,
     *          description="Validation error",
     *
     *          @OA\JsonContent(ref="#/components/schemas/ValidationError")
     *      )
     * )
     */
    public function store()
    {
    }
}
