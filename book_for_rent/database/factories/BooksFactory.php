<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

// Factory มันจะเชื่อมโยงกับ Model ชื่อ Books
class BooksFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->name(), // เป็นการจำลอง ชื่อสั้นๆ
            'description' => fake()->text(), // จำลองชื่อยาวๆเป็นแบบ text
            'price' => fake()->numberBetween(0, 1000)
        ];
    }
}
