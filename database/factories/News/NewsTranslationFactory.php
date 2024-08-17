<?php
namespace Database\Factories\News;

use App\Models\News\News;
use App\Models\News\NewsTranslation;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class NewsTranslationFactory extends Factory
{
    protected $model = NewsTranslation::class;

    public function definition()
    {
        return [
            'news_id' => News::factory(),
            'locale' => $this->faker->randomElement(['en', 'ru']),
            'title' => $this->faker->sentence,
            'slug' => Str::slug($this->faker->sentence),
            'short_content' => $this->faker->paragraph,
            'long_content' => $this->faker->paragraphs(3, true),
        ];
    }
}
