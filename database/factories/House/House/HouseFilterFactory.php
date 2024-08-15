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
        $filterIds = Filter::pluck('id')->toArray();

        if (empty($filterIds)) {
            $filterIds = [1, 2, 3, 4, 5];
        }

        $filterValues = [
            1 => $this->faker->numberBetween(30, 200) . ' sqm', // Living space
            2 => $this->faker->randomElement(['6x5', '18x8', '4x4', '15x15', '22x21']), // Size
            3 => $this->faker->numberBetween(1, 10), // Rooms
            4 => $this->faker->numberBetween(1, 5), // Bathrooms
            5 => $this->faker->numberBetween(1, 5), // Floors
        ];

        $filterId = $this->faker->randomElement($filterIds);

        return [
            'house_id' => House::factory(),
            'filter_id' => $filterId,
            'value' => $filterValues[$filterId],
        ];
    }
}
