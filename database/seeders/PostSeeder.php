<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = [];
        for ($i = 0; $i < 10; $i++) {
            $posts[] = [
                'title' => fake()->sentence(6),
                'content' => fake()->paragraph(3),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        Post::insert($posts);

    }
}