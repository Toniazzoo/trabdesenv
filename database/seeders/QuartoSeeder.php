<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Quarto;

class QuartoSeeder extends Seeder
{
    public function run()
    {
        Quarto::create([
            'number' => '101',
            'type' => 'Standard',
            'price' => 150.00,
            'description' => 'A comfortable standard quarto with basic amenities.',
            'available' => true,
        ]);

        Quarto::create([
            'number' => '102',
            'type' => 'Deluxe',
            'price' => 250.00,
            'description' => 'A luxurious quarto with premium features.',
            'available' => true,
        ]);
    }
}
