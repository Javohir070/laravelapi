<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use NunoMaduro\Collision\Adapters\Phpunit\State;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Status::create([
        'name' => [
            'uz' => "Yangi",
            'ru' => "Yangi"
        ],
        'for' => "order",
        'code' => "new"
       ]);

       Status::create([
        'name' => [
            'uz' => "Tasdiqlash",
            'ru' => "Tasdiqlash"
        ],
        'for' => "order",
        'code' => "Tasdiqlash"
       ]);

       Status::create([
        'name' => [
            'uz' => "Ishlanyapdi",
            'ru' => "Ishlanyapdi"
        ],
        'for' => "order",
        'code' => "Ishlanyapdi"
       ]);

       Status::create([
        'name' => [
            'uz' => "Yetkazib berilyadi",
            'ru' => "Yetkazib berilyadi"
        ],
        'for' => "order",
        'code' => "Yetkazib berilyadi"
       ]);

       Status::create([
        'name' => [
            'uz' => "Yetkazib berildi",
            'ru' => "Yetkazib berildi"
        ],
        'for' => "order",
        'code' => "Yetkazib berildi"
       ]);

       Status::create([
        'name' => [
            'uz' => "Tugatildi",
            'ru' => "Tugatildi"
        ],
        'for' => "order",
        'code' => "Tugatildi"
       ]);

       Status::create([
        'name' => [
            'uz' => "Yopildi",
            'ru' => "Yopildi"
        ],
        'for' => "order",
        'code' => "Yopildi"
       ]);

       Status::create([
        'name' => [
            'uz' => "Bekor qilindi",
            'ru' => "Bekor qilindi"
        ],
        'for' => "order",
        'code' => "Bekor qilindi"
       ]);

       Status::create([
        'name' => [
            'uz' => "Qaytirib berildi",
            'ru' => "Qaytirib berildi"
        ],
        'for' => "order",
        'code' => "Qaytirib berildi"
       ]);

       Status::create([
        'name' => [
            'uz' => "Tolav kutilmoqda",
            'ru' => "Tolav kutilmoqda"
        ],
        'for' => "order",
        'code' => "Tolav kutilmoqda"
       ]);

       Status::create([
        'name' => [
            'uz' => "Tolandi",
            'ru' => "Tolandi"
        ],
        'for' => "order",
        'code' => "Tolandi"
       ]);

       Status::create([
        'name' => [
            'uz' => "To'lovda xato",
            'ru' => "To'lovda xato"
        ],
        'for' => "order",
        'code' => "payment_error"
       ]);
    }
}
