<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'setting_key' => 'title',
                'setting_value' => 'Rarstroyinvest'
            ],
            [
                'setting_key' => 'meta_title',
                'setting_value' => 'Rarstroyinvest Title'
            ],
            [
                'setting_key' => 'meta_keywords',
                'setting_value' => 'tikinti, mebel'
            ],
            [
                'setting_key' => 'meta_description',
                'setting_value' => 'Rarstroyinvest Description'
            ],
            [
                'setting_key' => 'meta_author',
                'setting_value' => 'Rarstroyinvest'
            ],
            [
                'setting_key' => 'logo_white',
                'setting_value' => 'white logo'
            ],
            [
                'setting_key' => 'logo_colorful',
                'setting_value' => 'colorful logo'
            ],
            [
                'setting_key' => 'favicon',
                'setting_value' => 'favicon'
            ],
            [
                'setting_key' => 'time',
                'setting_value' => 'time'
            ],
            [
                'setting_key' => 'address',
                'setting_value' => 'address'
            ],
            [
                'setting_key' => 'email',
                'setting_value' => 'email'
            ],
            [
                'setting_key' => 'mobile',
                'setting_value' => 'mobile'
            ],
            [
                'setting_key' => 'facebook',
                'setting_value' => 'https://facebook.com'
            ],
            [
                'setting_key' => 'instagram',
                'setting_value' => 'https://instagram.com'
            ],
            [
                'setting_key' => 'linkedin',
                'setting_value' => 'https://linkedin.com'
            ],
            [
                'setting_key' => 'telegram',
                'setting_value' => 'https://telegram.com'
            ],
            [
                'setting_key' => 'whatsapp',
                'setting_value' => 'https://whatsapp.com'
            ],
            [
                'setting_key' => 'copyright',
                'setting_value' => '© Rarstroyinvest OOO, 2024'
            ],
        ];

        foreach ($data as $key => $value){
            Setting::create([
                'setting_key' => $value['setting_key'],
                'setting_value'=> $value['setting_value']
            ]);
        }
    }
}
