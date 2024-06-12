<?php

namespace App\Services;

use App\Models\News;
use App\Repositories\Contracts\NewsRepository;
use App\Services\Contracts\NewsServiceInterface;
use Illuminate\Support\Facades\DB;

class NewsService implements NewsServiceInterface
{
    public function __construct(protected NewsRepository $newsRepository)
    {
    }

    public function store(array $data): News
    {
        DB::beginTransaction();
        try {
            $news = $this->newsRepository->create($data);
            $news->categories()->attach($data['categories']);
            DB::commit();

            return $news;
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }

    }

    public function getAll()
    {
        return $this->newsRepository->getAll();
    }

    public function getById(int $id): News
    {
        return $this->newsRepository->find($id);
    }
}
