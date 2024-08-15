<?php

namespace Database\Factories\House\Equipment;

use App\Models\House\Equipment\Equipment;
use App\Models\House\House\House;
use Illuminate\Database\Eloquent\Factories\Factory;

class EquipmentFactory extends Factory
{
    protected $model = Equipment::class;

    public function definition()
    {
        return [
            'house_id' => House::factory(),
            'structure_id' => rand(1,4),
            'sort' => $this->faker->numberBetween(1, 10),
        ];
    }
}
