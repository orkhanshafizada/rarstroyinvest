<?php

namespace Database\Seeders;

use App\Models\News\News;
use App\Models\News\NewsTranslation;
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
            PermissionSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            SettingSeeder::class,
            AboutSeeder::class,
            StructureSeeder::class,
            FilterSeeder::class,
            HouseSeeder::class,
        ]);

        News::factory()->count(300)->create();
    }
}
