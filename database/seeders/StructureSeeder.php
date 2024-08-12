<?php

namespace Database\Seeders;

use App\Models\House\Structure\Structure;
use Illuminate\Database\Seeder;

class StructureSeeder extends Seeder
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
                    'name' => "Frame + roof",
                ],
                'en'     => [
                    'name' => "Frame + roof",
                ],
                'ru'     => [
                    'name' => "Frame + roof",
                ]
            ],
            [
                'active' => 1,
                'zh'     => [
                    'name' => "Warm Control",
                ],
                'en'     => [
                    'name' => "Warm Control",
                ],
                'ru'     => [
                    'name' => "Warm Control",
                ]
            ],
            [
                'active' => 1,
                'zh'     => [
                    'name' => "House to be finished",
                ],
                'en'     => [
                    'name' => "House to be finished",
                ],
                'ru'     => [
                    'name' => "House to be finished",
                ]
            ],
            [
                'active' => 1,
                'zh'     => [
                    'name' => "Turnkey house",
                ],
                'en'     => [
                    'name' => "Turnkey house",
                ],
                'ru'     => [
                    'name' => "Turnkey house",
                ]
            ]
        ];

        foreach($translations as $translation) Structure::create($translation);
    }
}
