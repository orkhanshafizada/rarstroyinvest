<?php

namespace Database\Seeders;

use App\Models\House\Filter\Filter;
use Illuminate\Database\Seeder;

class FilterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        $translations = [
            [
                'active' => 1,
                'zh'     => [
                    'name' => "Living space",
                ],
                'en'     => [
                    'name' => "Living space",
                ],
                'ru'     => [
                    'name' => "Living space",
                ]
            ],
            [
                'active' => 1,
                'zh'     => [
                    'name' => "Size",
                ],
                'en'     => [
                    'name' => "Size",
                ],
                'ru'     => [
                    'name' => "Size",
                ]
            ],
            [
                'active' => 1,
                'zh'     => [
                    'name' => "Rooms",
                ],
                'en'     => [
                    'name' => "Rooms",
                ],
                'ru'     => [
                    'name' => "Rooms",
                ]
            ],
            [
                'active' => 1,
                'zh'     => [
                    'name' => "Bathrooms",
                ],
                'en'     => [
                    'name' => "Bathrooms",
                ],
                'ru'     => [
                    'name' => "Bathrooms",
                ]
            ],
            [
                'active' => 1,
                'zh'     => [
                    'name' => "Floors",
                ],
                'en'     => [
                    'name' => "Floors",
                ],
                'ru'     => [
                    'name' => "Floors",
                ]
            ],
        ];

        foreach($translations as $translation) Filter::create($translation);
    }
}
