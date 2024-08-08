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
            'fullname' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => \Hash::make('admin'),
        ]);

        $admin->syncRoles(1);
    }
}
