<?php

namespace Docs\Default\Http\Controllers;

use OpenApi\Annotations as OA;

class CategoryController
{
    /**
     * @OA\Get(
     *      path="/api/categories",
     *      summary="Get all categories",
     *      tags={"Categories"},
     *
     *      @OA\Parameter(
     *          in="query",
     *          name="filter[search]",
     *          required=false,
     *          description="Filter categories by name",
     *
     *          @OA\Schema(type="string")
     *      ),
     *
     *      @OA\Response(
     *          response=200,
     *          description="List of categories",
     *
     *          @OA\JsonContent(
     *              type="array",
     *
     *              @OA\Items(ref="#/components/schemas/CategoryResponse")
     *          )
     *      ),
     *
     *      @OA\Response(
     *          response=404,
     *          description="Category not found",
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
     *      path="/api/categories/{id}",
     *      summary="Get a specific category",
     *      tags={"Categories"},
     *
     *      @OA\Parameter(
     *          in="path",
     *          name="id",
     *          required=true,
     *          description="Category ID",
     *
     *          @OA\Schema(type="integer")
     *      ),
     *
     *      @OA\Response(
     *          response=200,
     *          description="Category details",
     *
     *          @OA\JsonContent(ref="#/components/schemas/CategoryResponse")
     *      ),
     *
     *      @OA\Response(
     *          response=404,
     *          description="Category not found",
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
     *      path="/api/categories",
     *      summary="Create a new category",
     *      tags={"Categories"},
     *
     *      @OA\RequestBody(
     *          description="Category data",
     *          required=true,
     *
     *          @OA\JsonContent(ref="#/components/schemas/CategoryCreate")
     *      ),
     *
     *      @OA\Response(
     *          response=201,
     *          description="Category created successfully",
     *
     *          @OA\JsonContent(ref="#/components/schemas/CategoryResponse")
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
