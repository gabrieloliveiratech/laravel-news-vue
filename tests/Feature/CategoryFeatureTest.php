<?php

namespace Tests\Feature;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryFeatureTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_returns_all_categories()
    {
        $categories = Category::factory()->count(5)->create();

        $response = $this->get('/api/categories');

        $response->assertStatus(200);
        $response->assertJsonCount(5, 'data');
    }

    public function test_show_returns_a_specific_category()
    {
        $category = Category::factory()->create();

        $response = $this->get("/api/categories/{$category->id}");

        $response->assertStatus(200);
        $response->assertJson([
            'data' => [
                'id' => $category->id,
                'name' => $category->name,
            ],
        ]);
    }

    public function test_store_creates_a_new_category()
    {
        $categoryData = [
            'name' => 'New Category',
        ];

        $response = $this->post('/api/categories', $categoryData);

        $response->assertStatus(201);
        $response->assertJson([
            'data' => $categoryData,
        ]);

        $this->assertDatabaseHas('categories', $categoryData);
    }

    public function test_show_returns_not_found_when_category_does_not_exist()
    {
        $response = $this->get('/api/categories/1');

        $response->assertStatus(404);
    }

    public function test_store_returns_validation_error_when_name_is_missing()
    {
        $response = $this->post('/api/categories', []);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors('name');
    }
}
