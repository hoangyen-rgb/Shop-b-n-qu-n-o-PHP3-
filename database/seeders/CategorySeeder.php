<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categories;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Dành Cho Nữ'],
            ['name' => 'Dành Cho Nam'],
            ['name' => 'Dành Cho Trẻ Em'],
            ['name' => 'Giày'],
            ['name' => 'Áo Khoác']
        ];

        foreach ($categories as $key => $category) {
            Categories::create([
                'name' => $category['name'],
                'status' => 1,
            ]);
        }
    }
}