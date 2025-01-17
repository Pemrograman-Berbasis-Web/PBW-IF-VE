<?php

namespace Tests\Feature;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_show_all_posts()
    {
        // Membuat beberapa post untuk diuji
        Post::factory()->count(3)->create();

        // Mengakses route index untuk melihat semua post
        $response = $this->get(route('posts.index'));

        // Memastikan status response adalah 200
        $response->assertStatus(200);

        // Memastikan ada 3 post dalam response
        $response->assertViewHas('posts', function ($posts) {
            return $posts->count() === 3;
        });
    }
}