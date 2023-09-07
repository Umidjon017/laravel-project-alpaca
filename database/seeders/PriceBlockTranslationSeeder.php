<?php

namespace Database\Seeders;

use App\Models\Admin\PriceBlockTranslation;
use Illuminate\Database\Seeder;

class PriceBlockTranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            [
                'price_block_id' => 1, 'localization_id' => 1, 'title' => 'Light',
                'excepted_options' => 'Schedule, VoIP integration (phones), Calltracking integration, EHR, Custom protocols, Payment service integration, Reception',
                'ignored_options' => 'Automated task management (reminders, algorithms), Consultant’s cabinet, VPS hosting in Israel, Profitability analyses',
                'package_period' => 'месяц',
                'link_title' => 'Купить'
            ],
            [
                'price_block_id' => 1, 'localization_id' => 2, 'title' => 'Light ir',
                'excepted_options' => 'Schedule, VoIP integration (phones), Calltracking integration, EHR, Custom protocols, Payment service integration, Reception',
                'ignored_options' => 'Automated task management (reminders, algorithms), Consultant’s cabinet, VPS hosting in Israel, Profitability analyses',
                'package_period' => 'месяц',
                'link_title' => 'Купить'
            ],
            [
                'price_block_id' => 2, 'localization_id' => 1, 'title' => 'Infinity',
                'excepted_options' => 'Schedule, VoIP integration (phones), Calltracking integration, EHR, Custom protocols, Payment service integration, Reception, Automated task management (reminders, algorithms), Consultant’s cabinet, VPS hosting in Israel, Profitability analyses',
                'ignored_options' => NULL,
                'package_period' => 'месяц',
                'link_title' => 'Купить'
            ],
            [
                'price_block_id' => 2, 'localization_id' => 2, 'title' => 'Infinity ir',
                'excepted_options' => 'Schedule, VoIP integration (phones), Calltracking integration, EHR, Custom protocols, Payment service integration, Reception, Automated task management (reminders, algorithms), Consultant’s cabinet, VPS hosting in Israel, Profitability analyses',
                'ignored_options' => NULL,
                'package_period' => 'месяц',
                'link_title' => 'Купить'
            ],
            [
                'price_block_id' => 3, 'localization_id' => 1, 'title' => 'Smart',
                'excepted_options' => 'Schedule, VoIP integration (phones), Calltracking integration, EHR, Custom protocols, Payment service integration, Reception, Automated task management (reminders, algorithms), Consultant’s cabinet',
                'ignored_options' => 'VPS hosting in Israel, Profitability analyses',
                'package_period' => 'месяц',
                'link_title' => 'Купить'
            ],
            [
                'price_block_id' => 3, 'localization_id' => 2, 'title' => 'Smart ir',
                'excepted_options' => 'Schedule, VoIP integration (phones), Calltracking integration, EHR, Custom protocols, Payment service integration, Reception, Automated task management (reminders, algorithms), Consultant’s cabinet',
                'ignored_options' => 'VPS hosting in Israel, Profitability analyses',
                'package_period' => 'месяц',
                'link_title' => 'Купить'
            ],
        ];

        foreach ($items as $item) {
            PriceBlockTranslation::create($item);
        }
    }
}
