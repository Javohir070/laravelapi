<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
             CategorySeeder::class,
             RoleSeeder::class,
             UserSeeder::class,
             AttributeSeeder::class,
             ValueSeeder::class,
             ProductSeeder::class,
        ]);
    }
}
