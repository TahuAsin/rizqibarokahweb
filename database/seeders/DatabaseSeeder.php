<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductSize;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $categories = ['Setelan Tradisional', 'Bawahan', 'Aksesoris'];
        
        foreach ($categories as $categoryName) {
            Category::create([
                'name' => $categoryName,
                'slug' => Str::slug($categoryName)
            ]);
        }

        $product1 = Product::create([
            'category_id' => 1,
            'name' => 'Setelan Baju Adat Jawa Anak',
            'slug' => Str::slug('Setelan Baju Adat Jawa Anak'),
            'description' => 'Baju adat Jawa yang nyaman untuk anak-anak dengan bahan katun premium.',
            'image_path' => 'https://images.unsplash.com/photo-1519689680058-324335c77eba?auto=format&fit=crop&w=400&q=80',
        ]);

        $sizes1 = ['Bayi/NB' => 50000, '0/XS' => 55000, 'S' => 60000, 'M' => 65000, 'L' => 70000, 'XL' => 75000, 'XXL' => 80000];
        foreach ($sizes1 as $size => $price) {
            ProductSize::create([
                'product_id' => $product1->id,
                'size' => $size,
                'price' => $price
            ]);
        }
        
        $product2 = Product::create([
            'category_id' => 2,
            'name' => 'Celana Batik Balita',
            'slug' => Str::slug('Celana Batik Balita'),
            'description' => 'Celana batik dengan karet pinggang elastis untuk balita yang aktif.',
            'image_path' => 'https://images.unsplash.com/photo-1622290291468-a28f7a7dc6a8?auto=format&fit=crop&w=400&q=80',
        ]);

        $sizes2 = ['Bayi/NB' => 35000, '0/XS' => 40000, 'S' => 45000];
        foreach ($sizes2 as $size => $price) {
            ProductSize::create([
                'product_id' => $product2->id,
                'size' => $size,
                'price' => $price
            ]);
        }
    }
}
