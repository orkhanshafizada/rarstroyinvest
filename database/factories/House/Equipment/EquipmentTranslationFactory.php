<?php

namespace Database\Factories\House\Equipment;

use App\Models\House\Equipment\Equipment;
use App\Models\House\Equipment\EquipmentTranslation;
use Illuminate\Database\Eloquent\Factories\Factory;

class EquipmentTranslationFactory extends Factory
{
    protected $model = EquipmentTranslation::class;

    public function definition()
    {
        return [
            'equipment_id' => Equipment::factory(),
            'locale' => $this->faker->randomElement(['en', 'zh', 'ru']),
            'title' => $this->faker->sentence,
            'content' => $this->faker->paragraph,
        ];
    }
}
