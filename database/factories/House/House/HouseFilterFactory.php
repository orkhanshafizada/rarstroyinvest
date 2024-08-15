<?php

namespace Database\Factories\House\House;

use App\Models\House\Filter\Filter;
use App\Models\House\House\House;
use App\Models\House\House\HouseFilter;
use Illuminate\Database\Eloquent\Factories\Factory;

class HouseFilterFactory extends Factory
{
    protected $model = HouseFilter::class;

    public function definition()
    {
        return [
            'house_id' => House::factory(),
            'filter_id' => rand(1,5),
            'value' => $this->faker->word,
        ];
    }
}
