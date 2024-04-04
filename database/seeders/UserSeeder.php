<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
           'first_name' => "Admin",
           'last_name' => "Admin",
           'email' => "admin@gmail.com",
           'phone' => "+998991088778",
           'password' => Hash::make('12345678'),
        ]);

        $admin->roles()->attach('1');

        $user = User::create([
            'first_name' => "Javohir",
            'last_name' => "Qayumov",
            'email' => "javohir070@gmail.com",
            'phone' => "+998991082787",
            'password' => Hash::make('0970260j'),
         ]);
 
         $user->roles()->attach('2');

        User::factory()->count(10)->hasAttached([Role::find(2)])->create();
    }
}
