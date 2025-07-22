<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Carbon\Carbon;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();
        
        // User::create([
        //     'user_id' => 1,
        //     'topic' => $faker->sentence,
        //     'content' => $faker->paragraph,
        //     'admin_id' => 2,
        //     'resolved_at' => rand(0, 1) ? Carbon::now()->subDays(rand(1, 10)) : null,
        //     'closed_at' => rand(0, 1) ? Carbon::now()->subDays(rand(1, 5)) : null,
        //     'status' => $faker->randomElement(['open', 'closed', 'pending']),
        //     'priority' => $faker->randomElement(['low', 'normal', 'high']),
        //     'created_at' => now()->subDays(rand(1, 30)),
        //     'updated_at' => now(),
        // ]);
    }
}
