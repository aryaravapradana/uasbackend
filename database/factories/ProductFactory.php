<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $imageUrls = [
            'https://images.unsplash.com/photo-1542291026-7eec264c27ab?q=80&w=2070&auto=format&fit=crop', // Sepatu
            'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?q=80&w=2070&auto=format&fit=crop', // Headphone
            'https://images.unsplash.com/photo-1523275335684-37898b6baf30?q=80&w=1999&auto=format&fit=crop', // Jam tangan
            'https://images.unsplash.com/photo-1572569511254-d8f925fe2cbb?q=80&w=1887&auto=format&fit=crop', // Kacamata
            'https://images.unsplash.com/photo-1560769629-975ec94e6a86?q=80&w=1964&auto=format&fit=crop', // Sepatu lain
            'https://images.unsplash.com/photo-1491637639811-60e2756cc1c7?q=80&w=1964&auto=format&fit=crop', // Ransel
            'https://images.unsplash.com/photo-1627384113710-424c9a845c24?q=80&w=1964&auto=format&fit=crop', // Drone
            'https://images.unsplash.com/photo-1593642702821-c8da6771f0c6?q=80&w=1932&auto=format&fit=crop', // Laptop
            'https://images.unsplash.com/photo-1585152643967-187332a8b335?q=80&w=1887&auto=format&fit=crop', // Hoodie
            'https://images.unsplash.com/photo-1526170375885-4d8ecf77b99f?q=80&w=2070&auto=format&fit=crop', // Kamera
        ];

        return [
            'name' => $this->faker->words(3, true),

            'description' => $this->faker->paragraph(3),
            
            'price' => $this->faker->numberBetween(50000, 2000000),
            
            'stock' => $this->faker->numberBetween(10, 100),
            
            'image_url' => $this->faker->randomElement($imageUrls),
        ];
    }
}