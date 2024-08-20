<?php

namespace Database\Seeders;

use GuzzleHttp\Promise\Create;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pant_sizes;

class Pant_sizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pantsize = [
            ['name'=>'26'],
            ['name'=>'27'],
            ['name'=>'28'],
            ['name'=>'29'],
            ['name'=>'30'],
            ['name'=>'32'],
            ['name'=>'34'],
        ];
        foreach($pantsize as $item){
            Pant_sizes::Create(
                [
                    'name'=>$item['name'],
                ]
                );
        }
    }
}
