<?php
// database/seeders/CategorySeeder.php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Jersey',
                'slug' => 'jersey',
                'description' => 'Jersey olahraga dan pakaian olahraga',
                'image' => 'categories/jersey.png',
                'is_active' => true,
            ],
            [
                'name' => 'Sepatu Olahraga',
                'slug' => 'sepatu-olahraga',
                'description' => 'Sepatu untuk berbagai jenis olahraga dan aktivitas fisik',
                'image' => 'categories/sepatu-olahraga.png',
                'is_active' => true,
            ],
            [
                'name' => 'Bola',
                'slug' => 'bola',
                'description' => 'Berbagai jenis bola olahraga',
                'image' => 'categories/bola.png',
                'is_active' => true,
            ],
            [
                'name' => 'Aksesoris',
                'slug' => 'aksesoris',
                'description' => 'Berbagai aksesoris olahraga dan perlengkapan olahraga',
                'image' => 'categories/aksesoris.png',
                'is_active' => true,
            ],
            [
                'name' => 'Tas',
                'slug' => 'tas',
                'description' => 'Berbagai jenis tas olahraga dan perlengkapan olahraga',
                'image' => 'categories/tas.png',
                'is_active' => true,
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }

        $this->command->info('✅ Categories seeded successfully!');
    }
}