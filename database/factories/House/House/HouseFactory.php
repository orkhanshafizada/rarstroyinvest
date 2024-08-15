<?php


namespace Database\Factories\House\House;

use App\Models\House\Equipment\Equipment;
use App\Models\House\Equipment\EquipmentTranslation;
use App\Models\House\House\House;
use App\Models\House\House\HouseFilter;
use App\Models\House\House\HouseStructure;
use App\Models\House\House\HouseTranslation;
use Illuminate\Database\Eloquent\Factories\Factory;

class HouseFactory extends Factory
{
    protected $model = House::class;

    public function definition()
    {
        return [
            'main_image' => $this->faker->imageUrl(),
            'location' => $this->faker->address,
            'active' => 1,
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (House $house) {
            foreach (['en', 'zh', 'ru'] as $locale) {
                HouseTranslation::create([
                    'house_id' => $house->id,
                    'locale' => $locale,
                    'name' => $this->faker->word,
                    'video_url' => $this->faker->url,
                    'slug' => $this->faker->slug,
                ]);
            }

            HouseStructure::factory()
                          ->count(2)
                          ->for($house)
                          ->create();

            HouseFilter::factory()
                       ->count(3)
                       ->for($house)
                       ->create();

            Equipment::factory()
                     ->count(2)
                     ->for($house)
                     ->create()
                     ->each(function ($equipment) {
                         foreach (['en', 'zh', 'ru'] as $locale) {
                            EquipmentTranslation::create([
                                 'equipment_id' => $equipment->id,
                                 'locale' => $locale,
                                 'title' => $this->faker->word,
                                 'content' => $this->faker->paragraph,
                             ]);
                         }
                     });
        });
    }
}
