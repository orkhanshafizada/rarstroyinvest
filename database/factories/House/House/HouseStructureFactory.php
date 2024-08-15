<?php

namespace Database\Factories\House\House;

use App\Models\House\House\House;
use App\Models\House\House\HouseStructure;
use App\Models\House\Structure\Structure;
use Illuminate\Database\Eloquent\Factories\Factory;

class HouseStructureFactory extends Factory
{
    protected $model = HouseStructure::class;

    public function definition()
    {
        return [
            'house_id' => House::factory(),
            'structure_id' => rand(1,4),
            'price' => $this->faker->randomFloat(2, 1000, 100000),
        ];
    }
}
