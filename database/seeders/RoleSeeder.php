<?php

namespace Database\Seeders;


use App\Models\Role;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Manager Role
        $role = Role::create(['name' => 'Admin']);
        $permissions = Permission::all();
        $role->syncPermissions($permissions);

    }
}