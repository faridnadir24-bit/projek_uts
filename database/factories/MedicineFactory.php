<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MedicineFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nama_obat' => fake()->word(),
            'jenis' => fake()->randomElement([
                'Antibiotik', 
                'Analgesik', 
                'Antasida', 
                'Vitamin', 
                'Antihistamin'
            ]),
            'stok' => fake()->numberBetween(1, 100),
            'harga' => fake()->numberBetween(5000, 500000),
        ];
    }
}