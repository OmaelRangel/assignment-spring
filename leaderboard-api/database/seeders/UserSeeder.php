<?php

namespace Database\Seeders;
use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            ['name' => 'Emma', 'age' => 25, 'address' => '123 Main St', 'points' => 10],
            ['name' => 'Noah', 'age' => 27, 'address' => '456 Maple Rd', 'points' => 15],
            ['name' => 'James', 'age' => 22, 'address' => '789 Oak Ave', 'points' => 20],
            ['name' => 'William', 'age' => 30, 'address' => '101 Pine Ln', 'points' => 5],
            ['name' => 'Olivia', 'age' => 26, 'address' => '202 Birch Blvd', 'points' => 8]
        ];

        foreach ($users as $user) {
            User::create([
                'name' => $user['name'],
                'age' => $user['age'],
                'address' => $user['address'],
                'points' => $user['points'],
                'qr_code_path' => null,
            ]);
        }
    }
}
