<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contact;
use Faker\Factory as Faker;

class ContactSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        Contact::create([
            'name'       => $faker->name,
            'email'      => $faker->safeEmail,
            'message'    => $faker->paragraph,
            'admin_id'   => 2, // existing admin user ID
            'created_at' => now()->subDays(rand(1, 30)),
            'updated_at' => now(),
        ]);
    }
}
