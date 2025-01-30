<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Winner;
use Carbon\Carbon;

class DeclareWinner extends Command
{
    protected $signature = 'declare:winner';
    protected $description = 'Finds the highest scoring user and declares a winner';

    public function handle()
    {
        // Get the highest points
        $highestPoints = User::max('points');
        
        // Get all users with that score
        $winners = User::where('points', $highestPoints)->get();

        // If there's a tie, don't declare a winner
        if ($winners->count() !== 1) {
            $this->info('No winner declared due to a tie.');
            return;
        }

        // Declare the winner
        Winner::create([
            'user_id' => $winners->first()->id,
            'points' => $highestPoints,
            'declared_at' => Carbon::now()
        ]);

        $this->info('Winner declared: ' . $winners->first()->name);
    }
}

