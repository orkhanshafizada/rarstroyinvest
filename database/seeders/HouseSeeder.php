<?php

namespace Database\Seeders;

use App\Models\House\House\House;
use Illuminate\Database\Seeder;

class HouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        House::factory()->count(60)->create();
    }
}
