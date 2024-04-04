<?php

namespace Database\Seeders;

use App\Models\PaymentType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PaymentType::create([
            'name' => [
                'uz' => 'Naxt',
                'ru' => 'ru Naxt'
            ]
        ]);

        PaymentType::create([
            'name' => [
                'uz' => 'Terminal',
                'ru' => 'ru Terminal'
            ]
        ]);

        PaymentType::create([
            'name' => [
                'uz' => 'Click',
                'ru' => 'Click'
            ]
        ]);

        PaymentType::create([
            'name' => [
                'uz' => 'Payme',
                'ru' => 'Payme'
            ]
        ]);

        PaymentType::create([
            'name' => [
                'uz' => 'uzum',
                'ru' => 'uzum'
            ]
        ]);
    }
}
