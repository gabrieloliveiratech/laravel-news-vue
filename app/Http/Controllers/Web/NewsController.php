<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Services\Contracts\NewsServiceInterface;

class NewsController extends Controller
{
    public function __construct(private NewsServiceInterface $newsService)
    {
    }

    public function index()
    {
        return view('components.news.index');
    }

    public function show($id)
    {
        $news = $this->newsService->getById($id);

        return view('components.news.show', ['news' => $news]);
    }

    public function create()
    {
        return view('components.news.create');
    }
}
