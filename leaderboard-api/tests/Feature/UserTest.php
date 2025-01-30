<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Queue;
use App\Jobs\GenerateQRCode;
use PHPUnit\Framework\Attributes\Test;

class UserTest extends TestCase
{
    use RefreshDatabase; // Resets DB after each test

    #[Test]
    public function it_can_create_a_user()
    {
        Queue::fake(); // Prevent QR Code job from running

        $response = $this->postJson('/api/users', [
            'name' => 'John Doe',
            'age' => 28,
            'address' => '123 Main St',
        ]);

        $response->assertStatus(201)
                 ->assertJsonStructure(['id', 'name', 'age', 'address', 'points']);

    }

    #[Test]
    public function it_can_get_all_users()
    {
        User::factory()->count(3)->create();

        $response = $this->getJson('/api/users');

        $response->assertStatus(200)->assertJsonCount(3);
    }

    #[Test]
    public function it_can_update_a_users_score()
    {
        $user = User::factory()->create(['points' => 10]);

        $response = $this->postJson("/api/update-score/{$user->id}", ['points' => 5]);

        $response->assertStatus(200);
        $this->assertDatabaseHas('users', ['id' => $user->id, 'points' => 15]);
    }
}

