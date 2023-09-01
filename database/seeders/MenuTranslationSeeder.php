<?php

namespace Database\Seeders;

use App\Models\Front\MenuTranslation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuTranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['menu_id' => 1, 'localization_id' => 1, 'menu_title' => 'Пользователи ru'],
            ['menu_id' => 1, 'localization_id' => 2, 'menu_title' => 'Пользователи ir'],
            ['menu_id' => 2, 'localization_id' => 1, 'menu_title' => 'Клиники ru'],
            ['menu_id' => 2, 'localization_id' => 2, 'menu_title' => 'Клиники ir'],
            ['menu_id' => 3, 'localization_id' => 1, 'menu_title' => 'Модули ru'],
            ['menu_id' => 3, 'localization_id' => 2, 'menu_title' => 'Модули ir'],
            ['menu_id' => 4, 'localization_id' => 1, 'menu_title' => 'Цены ru'],
            ['menu_id' => 4, 'localization_id' => 2, 'menu_title' => 'Цены ir'],
            ['menu_id' => 5, 'localization_id' => 1, 'menu_title' => 'О нас ru'],
            ['menu_id' => 5, 'localization_id' => 2, 'menu_title' => 'О нас ir'],

            ['menu_id' => 6, 'localization_id' => 1, 'menu_title' => 'Частная практика'],
            ['menu_id' => 6, 'localization_id' => 2, 'menu_title' => 'Частная практика'],
            ['menu_id' => 7, 'localization_id' => 1, 'menu_title' => 'Outpatient clinic'],
            ['menu_id' => 7, 'localization_id' => 2, 'menu_title' => 'Outpatient clinic'],
            ['menu_id' => 8, 'localization_id' => 1, 'menu_title' => 'Chain of clinics'],
            ['menu_id' => 8, 'localization_id' => 2, 'menu_title' => 'Chain of clinics'],

            ['menu_id' => 9, 'localization_id' => 1, 'menu_title' => 'Частная практика'],
            ['menu_id' => 9, 'localization_id' => 2, 'menu_title' => 'Частная практика'],
            ['menu_id' => 10, 'localization_id' => 1, 'menu_title' => 'Outpatient clinic'],
            ['menu_id' => 10, 'localization_id' => 2, 'menu_title' => 'Outpatient clinic'],
            ['menu_id' => 11, 'localization_id' => 1, 'menu_title' => 'Chain of clinics'],
            ['menu_id' => 11, 'localization_id' => 2, 'menu_title' => 'Chain of clinics'],
            ['menu_id' => 12, 'localization_id' => 1, 'menu_title' => 'Hospital'],
            ['menu_id' => 12, 'localization_id' => 2, 'menu_title' => 'Hospital'],
            ['menu_id' => 13, 'localization_id' => 1, 'menu_title' => 'Hospital group'],
            ['menu_id' => 13, 'localization_id' => 2, 'menu_title' => 'Hospital group'],

            ['menu_id' => 14, 'localization_id' => 1, 'menu_title' => 'Альпака для врачей'],
            ['menu_id' => 14, 'localization_id' => 2, 'menu_title' => 'Альпака для врачей'],
            ['menu_id' => 15, 'localization_id' => 1, 'menu_title' => 'For IT'],
            ['menu_id' => 15, 'localization_id' => 2, 'menu_title' => 'For IT'],
        ];

        foreach ($items as $item) {
            MenuTranslation::create($item);
        }
    }
}
