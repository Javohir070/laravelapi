<?php

namespace Database\Seeders;

use App\Models\DeliveryMethod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeliveryMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DeliveryMethod::create([
            'name' => [
                'uz' => "Tekin",
                'ru' => "Tekin ru",
            ],
            'estimated_time' => [
                  'uz' => "5 kun",
                  'ru' => "ru  5 kun",
            ],
            'sum' => 0,
        ]);

        DeliveryMethod::create([
            'name' => [
                'uz' => "Standart",
                'ru' => "Standart ru",
            ],
            'estimated_time' => [
                  'uz' => "3 kun",
                  'ru' => "ru  3 kun",
            ],
            'sum' => 40000,
        ]);

        DeliveryMethod::create([
            'name' => [
                'uz' => "Tez",
                'ru' => "Tez ru",
            ],
            'estimated_time' => [
                  'uz' => "1 kun",
                  'ru' => "ru  1 kun",
            ],
            'sum' => 80000,
        ]);
    }
}
