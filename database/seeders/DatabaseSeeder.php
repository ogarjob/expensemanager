<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Expense;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        Expense::factory(50)->create(['date' => now()->subDays(2)]);
        Expense::factory(12)->create(['status' => 'In progress', 'date' => now()->subDay()]);
        Expense::factory(8)->create(['status' => 'New']);
    }
}
