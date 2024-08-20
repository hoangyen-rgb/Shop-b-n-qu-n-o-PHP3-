<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Brands;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands=[
            ['name'=>'Gucci',
            'logo'=>'gucci.jpg'],
            ['name'=>'Chanel',
            'logo'=>'chanel.jpg'],
            ['name'=>'Vaa',
            'logo'=>'vaa.jpg'],
            ['name'=>'wwf',
            'logo'=>'wwf.jpg'],
        ];
        foreach ($brands as $item) {
        Brands::Create([
            'name'=>$item['name'],
            'logo'=>$item['logo'],
            ]);
        }
    }

}