<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BlogTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $this->assertTrue(true);
    }

    public function test_blog_can_be_created()
    {
        $blog = Blog::factory()->create([
            'title' => 'Test Blog',
            'content' => 'This is a test content.',
            'user_id' => User::factory()->create()->id,
        ]);

        $this->assertDatabaseHas('blogs', [
            'title' => 'Test Blog',
            'content' => 'This is a test content.',
        ]);
    }

    public function test_blog_belongs_to_user()
    {
        $user = User::factory()->create();
        $blog = Blog::factory()->create(['user_id' => $user->id]);

        $this->assertInstanceOf(User::class, $blog->user);
    }
}
