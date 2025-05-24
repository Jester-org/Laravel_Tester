<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use App\Models\Promotion;

class ProductFactory extends Factory
{
    protected $model = \App\Models\Product::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'quantity' => $this->faker->numberBetween(0, 100),
            'price' => $this->faker->randomFloat(2, 10, 1000),
            'code' => 'PRD-' . str_pad($this->faker->unique()->numberBetween(1, 9999), 4, '0', STR_PAD_LEFT),
            'image' => $this->faker->imageUrl(),
            'category_id' => Category::factory(),
            'description' => $this->faker->sentence,
            'promotion_id' => $this->faker->boolean ? Promotion::factory() : null,
        ];
    }
}