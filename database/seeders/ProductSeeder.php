<?php

namespace Database\Seeders;

use GuzzleHttp\Promise\Create;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Products;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products=[
            [
                'price' => 150000,
                'image' => 'product1.jpg',
                'name' => 'Áo sơ mi nữ',
                'description' => 'Chất liệu cotton mềm mại, kiểu dáng thanh lịch',
                'price_sale' => 130000,
                'quantity' => 30,
                'brand_id' => 2,
                'category_id' => 1
            ],
            [
                'price' => 150000,
                'image' => 'product3.jpg',
                'name' => 'Quần jeans nữ',
                'description' => 'Chất liệu jean dai bền, form dáng vừa vặn',
                'price_sale' => 135000,
                'quantity' => 25,
                'brand_id' => 3,
                'category_id' => 1
            ],
            [
                'price' => 150000,
                'image' => 'product5.jpg',
                'name' => 'Đầm xòe nữ',
                'description' => 'Chất liệu vải mềm, kiểu dáng thu hút',
                'price_sale' => 120000,
                'quantity' => 18,
                'brand_id' => 1,
                'category_id' => 1
            ],
            [
                'price' => 150000,
                'image' => 'product7.jpg',
                'name' => 'Áo thun nữ',
                'description' => 'Chất liệu cotton co giãn, thiết kế thoải mái',
                'price_sale' => 130000,
                'quantity' => 35,
                'brand_id' => 4,
                'category_id' => 1
            ],
            [
                'price' => 150000,
                'image' => 'product9.jpg',
                'name' => 'Quần shorts nữ',
                'description' => 'Chất liệu vải mát, kiểu dáng năng động',
                'price_sale' => 0,
                'quantity' => 22,
                'brand_id' => 2,
                'category_id' => 1
            ],
            [
                'price' => 150000,
                'image' => 'product11.jpg',
                'name' => 'Quần shorts nam',
                'description' => 'Chất liệu vải mát, kiểu dáng năng động',
                'price_sale' => 0,
                'quantity' => 22,
                'brand_id' => 2,
                'category_id' => 2
            ],
            [
                'price' => 150000,
                'image' => 'product13.jpg',
                'name' => 'Áo thun nam',
                'description' => 'Chất liệu cotton co giãn, thiết kế thoải mái',
                'price_sale' => 130000,
                'quantity' => 30,
                'brand_id' => 4,
                'category_id' => 2
            ],
            [
                'price' => 150000,
                'image' => 'product15.jpg',
                'name' => 'Quần jeans nam',
                'description' => 'Chất liệu jean dai bền, form dáng vừa vặn',
                'price_sale' => 135000,
                'quantity' => 28,
                'brand_id' => 3,
                'category_id' => 2
            ],
            [
                'price' => 150000,
                'image' => 'product17.jpg',
                'name' => 'Sơ mi nam',
                'description' => 'Chất liệu cotton mềm mại, kiểu dáng lịch lãm',
                'price_sale' => 120000,
                'quantity' => 24,
                'brand_id' => 2,
                'category_id' => 2
            ],
            [
                'price' => 150000,
                'image' => 'product19.jpg',
                'name' => 'Quần kaki nam',
                'description' => 'Chất liệu kaki mát mẻ, thiết kế tinh tế',
                'price_sale' => 130000,
                'quantity' => 20,
                'brand_id' => 1,
                'category_id' => 2
            ],
            [
                'price' => 100000,
                'image' => 'product21.jpg',
                'name' => 'Áo thun trẻ em',
                'description' => 'Chất liệu cotton mềm mại, kiểu dáng bắt mắt',
                'price_sale' => 90000,
                'quantity' => 35,
                'brand_id' => 4,
                'category_id' => 3
            ],
            [
                'price' => 150000,
                'image' => 'product23.jpg',
                'name' => 'Quần jeans trẻ em',
                'description' => 'Chất liệu jean dai bền, form dáng vừa vặn',
                'price_sale' => 120000,
                'quantity' => 28,
                'brand_id' => 3,
                'category_id' => 3
            ],
            [
                'price' => 350000,
                'image' => 'product25.jpg',
                'name' => 'Váy bé gái',
                'description' => 'Chất liệu vải mềm mại, kiểu dáng xinh xắn',
                'price_sale' => 320000,
                'quantity' => 22,
                'brand_id' => 1,
                'category_id' => 3
            ],
            [
                'price' => 150000,
                'image' => 'product27.jpg',
                'name' => 'Quần shorts trẻ em',
                'description' => 'Chất liệu vải mát, kiểu dáng năng động',
                'price_sale' => 120000,
                'quantity' => 30,
                'brand_id' => 2,
                'category_id' => 3
            ],
            [
                'price' => 230000,
                'image' => 'product29.jpg',
                'name' => 'Áo sơ mi trẻ em',
                'description' => 'Chất liệu cotton mềm mại, kiểu dáng đáng yêu',
                'price_sale' => 200000,
                'quantity' => 25,
                'brand_id' => 2,
                'category_id' => 3
            ]

        ];
        foreach ($products as $item) {
            Products::create([
                'name' => $item['name'],
                'description' => $item['description'],
                'image' => $item['image'],
                'price' => $item['price'],
                'price_sale' => $item['price_sale'],
                'quantity' => $item['quantity'],
                'brand_id' => $item['brand_id'],
                'category_id' => $item['category_id'],
            ]);
        }
    }
}