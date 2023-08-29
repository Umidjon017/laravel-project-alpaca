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
        $items = [
            ['parent_id' => 0, 'menu_title' => 'Пользователи',  'link' => '/',          'order_id' => 0,  'status' => 1],
            ['parent_id' => 0, 'menu_title' => 'Клиники',       'link' => '/клиники',   'order_id' => 1,  'status' => 1],
            ['parent_id' => 0, 'menu_title' => 'Модули',        'link' => '/модули',    'order_id' => 2,  'status' => 1],
            ['parent_id' => 0, 'menu_title' => 'Цены',          'link' => '/цены',      'order_id' => 3,  'status' => 1],
            ['parent_id' => 0, 'menu_title' => 'О нас',         'link' => '/о-нас',     'order_id' => 4,  'status' => 1],

            ['parent_id' => 1, 'menu_title' => 'Частная практика',  'link' => '/частная-практика',  'order_id' => 5,  'status' => 1],
            ['parent_id' => 1, 'menu_title' => 'Outpatient clinic', 'link' => '/outpatient-clinic', 'order_id' => 6,  'status' => 1],
            ['parent_id' => 1, 'menu_title' => 'Chain of clinics',  'link' => '/chain-od-clinic',   'order_id' => 7,  'status' => 1],

            ['parent_id' => 2, 'menu_title' => 'Частная практика',  'link' => '/частная-практика',  'order_id' => 8,  'status' => 1],
            ['parent_id' => 2, 'menu_title' => 'Outpatient clinic', 'link' => '/outpatient-clinic', 'order_id' => 9,  'status' => 1],
            ['parent_id' => 2, 'menu_title' => 'Chain of clinics',  'link' => '/chain-od-clinic',   'order_id' => 10, 'status' => 1],
            ['parent_id' => 2, 'menu_title' => 'Hospital',          'link' => '/hospital',          'order_id' => 11, 'status' => 1],
            ['parent_id' => 2, 'menu_title' => 'Hospital group',    'link' => '/hospital-group',    'order_id' => 12, 'status' => 1],

            ['parent_id' => 1, 'menu_title' => 'Альпака для врачей','link' => 'alpaca-dlia-vraca',  'order_id' => 13, 'status' => 1],
            ['parent_id' => 0, 'menu_title' => 'For IT',            'link' => 'dlia-it',            'order_id' => 14, 'status' => 1],
        ];
        foreach ($items as $item) {
            Menu::Create($item);
        }
    }
}
