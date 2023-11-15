<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class tbl_productFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'ten_sp' => fake()->name(),
            'ma_sp' => fake()->name(),
            'donvi_sp' => fake()->name(),
            'gia_sp' => rand(100000000,500000000),
            'id_nhom' => rand(1,5),
        ];
    }
}
