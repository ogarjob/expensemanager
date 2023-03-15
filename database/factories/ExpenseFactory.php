<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Expense>
 */
class ExpenseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $merchants = ['Electronics', 'Taxi', 'Restaurant', 'Office supplies', 'Parking', 'Breakfast', 'Hotel', 'Airline', 'Parking', 'Ride sharing', 'Fast food', 'Rental car', 'Shuttle'];
        return [
            'user_id'   => User::factory(),
            'merchant'  => collect($merchants)->random(),
            'total'     => mt_rand(10, 300) * 100,
            'status'    => 'Reimbursed',
            'comment'   => 'Expense from my business trip',
            'receipt'   => 'default-receipt.png'
        ];
    }
}
