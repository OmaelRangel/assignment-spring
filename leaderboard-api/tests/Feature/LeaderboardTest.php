<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\Attributes\Test;

class LeaderboardTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function it_can_declare_a_winner()
    {
        // Ensure the database is migrated
        $this->artisan('migrate', ['--database' => 'sqlite']);

        // Create users with varying scores
        $winner = User::factory()->create(['points' => 100]);
        $loser = User::factory()->create(['points' => 50]);

        // Run the leaderboard command
        Artisan::call('declare:winner');

        // Verify the highest-scoring user was added as a winner
        $this->assertDatabaseHas('winners', ['user_id' => $winner->id]);
    }
}

