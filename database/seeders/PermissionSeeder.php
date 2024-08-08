<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [

            //About Controller
            [
                'name' => 'about.show',
                'group' => 'About',
                'guard_name' => 'admin'
            ],
            [
                'name' => 'about.edit',
                'group' => 'About',
                'guard_name' => 'admin'
            ],
            [
                'name' => 'about.create',
                'group' => 'About',
                'guard_name' => 'admin'
            ],
            [
                'name' => 'about.delete',
                'group' => 'About',
                'guard_name' => 'admin'
            ],

            //Slider Controller
            [
                'name' => 'slider.show',
                'group' => 'Slider',
                'guard_name' => 'admin'
            ],
            [
                'name' => 'slider.edit',
                'group' => 'Slider',
                'guard_name' => 'admin'
            ],
            [
                'name' => 'slider.create',
                'group' => 'Slider',
                'guard_name' => 'admin'
            ],
            [
                'name' => 'slider.delete',
                'group' => 'Slider',
                'guard_name' => 'admin'
            ],
            //Settings Controller
            [
                'name' => 'settings.show',
                'group' => 'Settings',
                'guard_name' => 'admin'
            ],
            [
                'name' => 'settings.edit',
                'group' => 'Settings',
                'guard_name' => 'admin'
            ],
            [
                'name' => 'settings.create',
                'group' => 'Settings',
                'guard_name' => 'admin'
            ],
            [
                'name' => 'settings.delete',
                'group' => 'Settings',
                'guard_name' => 'admin'
            ],
            //Moderator Controller
            [
                'name' => 'moderator.show',
                'group' => 'Moderator',
                'guard_name' => 'admin'
            ],
            [
                'name' => 'moderator.edit',
                'group' => 'Moderator',
                'guard_name' => 'admin'
            ],
            [
                'name' => 'moderator.create',
                'group' => 'Moderator',
                'guard_name' => 'admin'
            ],
            [
                'name' => 'moderator.delete',
                'group' => 'Moderator',
                'guard_name' => 'admin'
            ],


            //Languages Controller
            [
                'name' => 'languages.show',
                'group' => 'Languages',
                'guard_name' => 'admin'
            ],
            [
                'name' => 'languages.edit',
                'group' => 'Languages',
                'guard_name' => 'admin'
            ],
            [
                'name' => 'languages.create',
                'group' => 'Languages',
                'guard_name' => 'admin'
            ],
            [
                'name' => 'languages.delete',
                'group' => 'Languages',
                'guard_name' => 'admin'
            ],
            //Faq Controller
            [
                'name' => 'faqs.show',
                'group' => 'Faqs',
                'guard_name' => 'admin'
            ],
            [
                'name' => 'faqs.edit',
                'group' => 'Faqs',
                'guard_name' => 'admin'
            ],
            [
                'name' => 'faqs.create',
                'group' => 'Faqs',
                'guard_name' => 'admin'
            ],
            [
                'name' => 'faqs.delete',
                'group' => 'Faqs',
                'guard_name' => 'admin'
            ],

            //News Controller
            [
                'name' => 'news.show',
                'group' => 'News',
                'guard_name' => 'admin'
            ],
            [
                'name' => 'news.edit',
                'group' => 'News',
                'guard_name' => 'admin'
            ],
            [
                'name' => 'news.create',
                'group' => 'News',
                'guard_name' => 'admin'
            ],
            [
                'name' => 'news.delete',
                'group' => 'News',
                'guard_name' => 'admin'
            ],

            //Gallery Controller
            [
                'name' => 'gallery.show',
                'group' => 'Gallery',
                'guard_name' => 'admin'
            ],
            [
                'name' => 'gallery.edit',
                'group' => 'Gallery',
                'guard_name' => 'admin'
            ],
            [
                'name' => 'gallery.create',
                'group' => 'Gallery',
                'guard_name' => 'admin'
            ],
            [
                'name' => 'gallery.delete',
                'group' => 'Gallery',
                'guard_name' => 'admin'
            ],

            //Contact Us Controller
            [
                'name' => 'contacts.show',
                'group' => 'Contact Us',
                'guard_name' => 'admin'
            ],
            [
                'name' => 'contacts.edit',
                'group' => 'Contact Us',
                'guard_name' => 'admin'
            ],
            [
                'name' => 'contacts.create',
                'group' => 'Contact Us',
                'guard_name' => 'admin'
            ],
            [
                'name' => 'contacts.delete',
                'group' => 'Contact Us',
                'guard_name' => 'admin'
            ],
            //Partners Controller
            [
                'name' => 'partners.show',
                'group' => 'Partners',
                'guard_name' => 'admin'
            ],
            [
                'name' => 'partners.edit',
                'group' => 'Partners',
                'guard_name' => 'admin'
            ],
            [
                'name' => 'partners.create',
                'group' => 'Partners',
                'guard_name' => 'admin'
            ],
            [
                'name' => 'partners.delete',
                'group' => 'Partners',
                'guard_name' => 'admin'
            ],
            //Staff Controller
            [
                'name' => 'staff.show',
                'group' => 'Staff',
                'guard_name' => 'admin'
            ],
            [
                'name' => 'staff.edit',
                'group' => 'Staff',
                'guard_name' => 'admin'
            ],
            [
                'name' => 'staff.create',
                'group' => 'Staff',
                'guard_name' => 'admin'
            ],
            [
                'name' => 'staff.delete',
                'group' => 'Staff',
                'guard_name' => 'admin'
            ],
            //Comments Controller
            [
                'name' => 'comments.show',
                'group' => 'Comments',
                'guard_name' => 'admin'
            ],
            [
                'name' => 'comments.edit',
                'group' => 'Comments',
                'guard_name' => 'admin'
            ],
            [
                'name' => 'comments.create',
                'group' => 'Comments',
                'guard_name' => 'admin'
            ],
            [
                'name' => 'comments.delete',
                'group' => 'Comments',
                'guard_name' => 'admin'
            ]
        ];
        //$permissions = array_unique($permissions);

        foreach ($permissions as $key => $row) {
            Permission::firstOrCreate([
                'name' => $row['name'],
            ], [
                'name' => $row['name'],
                'guard_name' => $row['guard_name'],
                'group' => $row['group']
            ]);
        }
    }
}
