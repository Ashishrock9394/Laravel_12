<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Attendance;
use App\Models\LeaveRequest;

class DummyDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Make sure you have some users
        if (User::count() < 10) {
            User::factory()->count(10)->create();
        }

        // Seed 500 attendance records
        Attendance::factory()->count(500)->create();

        // Seed 100 leave requests
        LeaveRequest::factory()->count(100)->create();
    }
}
