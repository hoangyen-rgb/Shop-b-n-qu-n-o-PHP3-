<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Colors;
class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $colors = [
            ['name'=>'Trắng','hex'=>'#FFFFFF'],
            ['name'=>'Đen','hex'=>'#000000'],
            ['name'=>'Nước biển','hex'=>'#FFFF00'],
            ['name'=>'Cam','hex'=>'#FFA500'],
            ['name'=>'Vàng','hex'=>'#008080'],
        ];
        foreach($colors as $item){
            Colors::Create(
                [
                    'name'=>$item['name'],
                    'hex'=>$item['hex'],
                ]
                );
        }
    }
}
