<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Blog;
use App\Models\User;
use Tests\TestCase;

class BlogControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_guests_cannot_create_blog()
    {
        $response = $this->post(route('blogs.store'), [
            'title' => 'Test Blog',
            'content' => 'This is a test blog content.',
        ]);

        $response->assertRedirect(route('login'));
    }

    public function test_authenticated_user_can_create_blog()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post(route('blogs.store'), [
            'title' => 'Test Blog',
            'content' => 'This is test blog content.',
        ]);

        $response->assertRedirect(route('home'));
        $this->assertDatabaseHas('blogs', ['title' => 'Test Blog']);
    }

    public function test_show_blog()
    {
        // Create a user and authenticate
        $user = User::factory()->create();
        $this->actingAs($user);
    
        // Create a blog
        $blog = Blog::factory()->create();
    
        // Test the show route
        $response = $this->get(route('blogs.show', $blog->id));
        $response->assertStatus(200)
                 ->assertSee($blog->title)
                 ->assertSee($blog->content);
    }
    
}
