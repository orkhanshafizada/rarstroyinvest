<?php
namespace Database\Factories\news;

use App\Models\News\News;
use App\Models\News\NewsTranslation;
use Illuminate\Database\Eloquent\Factories\Factory;

class NewsFactory extends Factory
{
    protected $model = News::class;

    public function definition()
    {
        return [
            'main_image' => $this->faker->imageUrl(640, 480, 'news'),
            'show' => $this->faker->boolean,
            'sort' => $this->faker->numberBetween(1, 100),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (News $news) {
            $locales = ['en', 'ru'];
            foreach ($locales as $locale) {
                NewsTranslation::factory()->create([
                    'news_id' => $news->id,
                    'locale' => $locale,
                ]);
            }
        });
    }
}
