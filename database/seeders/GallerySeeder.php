<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Gallery;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gallery = [
            [1, 'product1-1.jpg'], [1, 'product1-2.jpg'],
            [2, 'product2-1.jpg'], [2, 'product2-2.jpg'],
            [3, 'product3-1.jpg'], [3, 'product3-2.jpg'],
            [4, 'product4-1.jpg'], [4, 'product4-2.jpg'],
            [5, 'product5-1.jpg'], [5, 'product5-2.jpg'],
            [6, 'product6-1.jpg'], [6, 'product6-2.jpg'],
            [7, 'product7-1.jpg'], [7, 'product7-2.jpg'],
            [8, 'product8-1.jpg'], [8, 'product8-2.jpg'],
            [9, 'product9-1.jpg'], [9, 'product9-2.jpg'],
            [10, 'product10-1.jpg'], [10, 'product10-2.jpg'],
            [11, 'product11-1.jpg'], [11, 'product11-2.jpg'],
            [12, 'product12-1.jpg'], [12, 'product12-2.jpg'],
            [13, 'product13-1.jpg'], [13, 'product13-2.jpg'],
            [14, 'product13-1.jpg'], [14, 'product13-2.jpg'],
            [15, 'product15-1.jpg'], [15, 'product15-2.jpg']
        ];
        foreach ($gallery as $item) {
            gallery::create([
            'product_id' => $item[0],
            'image' => $item[1],
            ]);
            // Làm việc với $product_id và $image
        }
    }

}
