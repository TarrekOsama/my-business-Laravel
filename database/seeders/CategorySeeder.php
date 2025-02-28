<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Electronics',
            'image' => 'images/categories/electronics.jpg',
            'slug' => 'electronics'
        ]);

        Category::create([
            'name' => 'Fashion',
            'image' => 'images/categories/fashion.jpg',
            'slug' => 'fashion'
        ]);
        Category::create([
            'name' => 'Books',
            'image' => 'images/categories/books.jpg',
            'slug' => 'books'
        ]);
        Category::create([
            'name' => 'Home&Kitchen',
            'image' => 'images/categories/home&kitchen.jpg',
            'slug' => 'home&kitchen'
        ]);

        Category::create([
            'name' => 'Beauty',
            'image' => 'images/categories/beauty.jpg',
            'slug' => 'beauty'

        ]);
    }
}
