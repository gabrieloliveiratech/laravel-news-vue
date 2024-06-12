<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\News;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NewsFeatureTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_returns_all_news()
    {
        $news = News::factory()->count(5)->create();

        $response = $this->get('/api/news');

        $response->assertStatus(200);
        $response->assertJsonCount(5, 'data');
    }

    public function test_show_returns_a_specific_news()
    {
        $news = News::factory()->create();

        $response = $this->get("/api/news/{$news->id}");

        $response->assertStatus(200);
        $response->assertJson([
            'data' => [
                'id' => $news->id,
                'title' => $news->title,
                'content' => $news->content,
            ],
        ]);
    }

    public function test_store_creates_a_new_news()
    {
        $newsData = [
            'title' => 'New News',
            'content' => 'This is a new news item.',
            'categories' => [Category::factory()->create()->id],
        ];

        $response = $this->post('/api/news', $newsData);

        $response->assertStatus(201);

        $response->assertJsonFragment([
            'title' => $newsData['title'],
        ]);

        unset($newsData['categories']);
        $this->assertDatabaseHas('news', $newsData);
    }

    public function test_show_returns_not_found_when_news_does_not_exist()
    {
        $response = $this->get('/api/news/1');

        $response->assertStatus(404);
    }

    public function test_store_returns_validation_error_when_data_is_missing()
    {
        $response = $this->post('/api/news', []);
        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['title', 'content', 'categories']);
    }
}
