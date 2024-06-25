<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    static $imageIndex = 1;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => json_encode(['en' => $this->faker->word, 'ar' => $this->faker->word]),
            'description' => json_encode(['en' => $this->faker->sentence, 'ar' => $this->faker->sentence]),
            'stock' => $this->faker->numberBetween(0, 100),
            'cost_price' => $this->faker->randomFloat(2, 10, 100),
            'selling_price' => $this->faker->randomFloat(2, 20, 200),
            'category_id' => Category::inRandomOrder()->first()->id,
            'main_image' => 'images/product-' . str_pad(self::$imageIndex++, 2, '0', STR_PAD_LEFT) . '.jpg',
        ];
    }
}
