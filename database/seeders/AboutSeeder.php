<?php

namespace Database\Seeders;

use App\Models\About\About;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        $slug = Str::slug("Test", '-');

        $about = About::create();

        $translations = [
            'zh' => [
                'title'             => "Test",
                'short_description' => "Test",
                'long_description'  => "Test",
                'slug'              => $slug
            ],
            'en' => [
                'title'             => "Test",
                'short_description' => "Test",
                'long_description'  => "Test",
                'slug'              => $slug
            ],
            'ru' => [
                'title'             => "Test",
                'short_description' => "Test",
                'long_description'  => "Test",
                'slug'              => $slug
            ]
        ];

        foreach ($translations as $locale => $data) {
            $about->translateOrNew($locale)->fill($data)->save();
        }
    }
}
