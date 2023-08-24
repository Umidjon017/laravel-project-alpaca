<?php

namespace Database\Seeders;

use App\Models\Front\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menus = [
            ['parent_id' => 0, 'menu_title' => 'Пользователи',  'link' => '/',          'sort_order' => 0,  'status' => 1],
            ['parent_id' => 0, 'menu_title' => 'Клиники',       'link' => '/клиники',   'sort_order' => 1,  'status' => 1],
            ['parent_id' => 0, 'menu_title' => 'Модули',        'link' => '/модули',    'sort_order' => 2,  'status' => 1],
            ['parent_id' => 0, 'menu_title' => 'Цены',          'link' => '/цены',      'sort_order' => 3,  'status' => 1],
            ['parent_id' => 0, 'menu_title' => 'О нас',         'link' => '/о-нас',     'sort_order' => 4,  'status' => 1],

            ['parent_id' => 1, 'menu_title' => 'Частная практика',  'link' => '/частная-практика',  'sort_order' => 5,  'status' => 1],
            ['parent_id' => 1, 'menu_title' => 'Outpatient clinic', 'link' => '/outpatient-clinic', 'sort_order' => 6,  'status' => 1],
            ['parent_id' => 1, 'menu_title' => 'Chain of clinics',  'link' => '/chain-od-clinic',   'sort_order' => 7,  'status' => 1],

            ['parent_id' => 2, 'menu_title' => 'Частная практика',  'link' => '/частная-практика',  'sort_order' => 8,  'status' => 1],
            ['parent_id' => 2, 'menu_title' => 'Outpatient clinic', 'link' => '/outpatient-clinic', 'sort_order' => 9,  'status' => 1],
            ['parent_id' => 2, 'menu_title' => 'Chain of clinics',  'link' => '/chain-od-clinic',   'sort_order' => 10, 'status' => 1],
            ['parent_id' => 2, 'menu_title' => 'Hospital',          'link' => '/hospital',          'sort_order' => 11, 'status' => 1],
            ['parent_id' => 2, 'menu_title' => 'Hospital group',    'link' => '/hospital-group',    'sort_order' => 12, 'status' => 1],
        ];
        foreach ($menus as $menu) {
            Menu::Create($menu);
        }
    }
}
