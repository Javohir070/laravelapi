<?php

namespace Database\Seeders;

use App\Models\Value;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Value::create([
            'attribute_id'=>1,
            'name'=>[
                'uz'=>'Qizil',
                'ru'=>'Qizil_ru'
            ]
        ]);

        Value::create([
            'attribute_id'=>1,
            'name'=>[
                'uz'=>'Qora',
                'ru'=>'Qora_ru'
            ]
        ]);

        Value::create([
            'attribute_id'=>1,
            'name'=>[
                'uz'=>'Jigarrang',
                'ru'=>'Jigarrang_ru'
            ]
        ]);

        Value::create([
            'attribute_id'=>2,
            'name'=>[
                'uz'=>'MDF',
                'ru'=>'MDF_ru'
            ]
        ]);

        Value::create([
            'attribute_id'=>1,
            'name'=>[
                'uz'=>'LDSP',
                'ru'=>'LDSP_ru'
            ]
        ]);
    }
}
