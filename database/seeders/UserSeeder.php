<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

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
            'fullname' => 'Sirur Ragimov',
            'email' => 's89100080700@mail.ru',
            'password' => \Hash::make('R@rstroy2024!'),
        ]);

        $admin->syncRoles(1);
    }
}
