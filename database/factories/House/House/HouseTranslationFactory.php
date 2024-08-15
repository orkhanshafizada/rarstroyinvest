<?php

namespace Database\Factories\House\House;

use App\Models\House\House\House;
use App\Models\House\House\HouseTranslation;
use Illuminate\Database\Eloquent\Factories\Factory;

class HouseTranslationFactory extends Factory
{
    protected $model = HouseTranslation::class;

    public function definition()
    {
        return [
            'house_id' => House::factory(),
            'locale' => $this->faker->randomElement(['en', 'zh', 'ru']),
            'name' => $this->faker->words(3, true),
            'video_url' => $this->faker->url,
            'slug' => $this->faker->slug,
        ];
    }
}
