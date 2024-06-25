<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductImage>
 */
class ProductImageFactory extends Factory
{
    protected static $imageIndex = 1;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $imagePath = 'images/product-' . str_pad(self::$imageIndex, 2, '0', STR_PAD_LEFT) . '.jpg';
        self::$imageIndex = self::$imageIndex % 16 + 1; // Cycle through 1 to 16

        return [
            'product_id' => Product::inRandomOrder()->first()->id,
            'image' => $imagePath,
        ];
    }
}
