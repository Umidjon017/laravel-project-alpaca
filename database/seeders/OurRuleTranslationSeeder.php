<?php

namespace Database\Seeders;

use App\Models\Admin\OurRuleTranslation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OurRuleTranslationSeeder extends Seeder
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
                'our_rule_id' => 1,
                'localization_id' => 1,
                'agreement_personal_data' => 'Нажимая на эту кнопку, Вы даете согласие на обработку своих персональных данных ru',
                'agreement_personal_data_policy' => 'и соглашаетесь с Политикой обработки персональных данных ru',
            ],
            [
                'our_rule_id' => 1,
                'localization_id' => 2,
                'agreement_personal_data' => 'Нажимая на эту кнопку, Вы даете согласие на обработку своих персональных данных ir',
                'agreement_personal_data_policy' => 'и соглашаетесь с Политикой обработки персональных данных ir',
            ],
        ];

        foreach ($items as $item) {
            OurRuleTranslation::create($item);
        }
    }
}
