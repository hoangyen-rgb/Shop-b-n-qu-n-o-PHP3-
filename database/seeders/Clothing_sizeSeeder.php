<?php

namespace Database\Seeders;

use GuzzleHttp\Promise\Create;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Clothing_sizes;

class Clothing_sizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clothing_size = [
            ['name'=>'XXS'],
            ['name'=>'XS'],
            ['name'=>'S'],
            ['name'=>'M'],
            ['name'=>'L'],
            ['name'=>'XL'],
            ['name'=>'XXL'],
        ];
        foreach($clothing_size as $item){
            Clothing_sizes::Create(
                [
                    'name'=>$item['name'],
                ]
                );
        }
    }
}
