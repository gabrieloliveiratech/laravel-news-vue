<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsStoreRequest;
use App\Http\Resources\NewsResource;
use App\Services\Contracts\NewsServiceInterface;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function __construct(private NewsServiceInterface $newsService)
    {
    }

    public function index(Request $request)
    {
        $news = $this->newsService->getAll();

        return NewsResource::collection($news);
    }

    public function show($id)
    {
        $news = $this->newsService->getById($id);

        return new NewsResource($news);
    }

    public function store(NewsStoreRequest $request)
    {
        $news = $this->newsService->store($request->validated());

        return new NewsResource($news);
    }
}
