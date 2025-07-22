<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ticket;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Faker\Factory as Faker;

class TicketSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        
            Ticket::create([
                'user_id' => 1,
                'subject' => $faker->sentence,
                'message' => $faker->paragraph,
                'assigned_to' => 2,
                'resolved_at' => rand(0, 1) ? Carbon::now()->subDays(rand(1, 10)) : null,
                'closed_at' => rand(0, 1) ? Carbon::now()->subDays(rand(1, 5)) : null,
                'priority' => $faker->randomElement(['low', 'normal', 'high']),
                'status' => $faker->randomElement(['open', 'closed', 'pending']),
                'created_at' => now()->subDays(rand(1, 30)),
                'updated_at' => now(),
            ]);
    }
}
