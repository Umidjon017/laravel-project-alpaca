<?php

namespace Database\Seeders;

use App\Models\Front\BannerTranslation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BannerTranslationSeeder extends Seeder
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
                'banner_id' => 1,
                'localization_id' => 1,
                'title' => 'Максимизируйте эффективность вашего медицинского бизнесас нашей операционной системой',
                'description' => 'Регистрация пациентов и ведение электронных медицинских карт, расписание и управление приемами, финансовый учет, интеграция с медицинскими приборами.\r\n\r\nК слову, alpaca - это не лама!'
            ],
            [
                'banner_id' => 1,
                'localization_id' => 2,
                'title' => 'ממקסם את היעילות של העסק הרפואי שלך עם מערכת ההפעלה שלנו',
                'description' => 'רישום מטופלים ואחזקת רשומות רפואיות אלקטרוניות, זימון וניהול תורים, חשבונאות פיננסית, אינטגרציה עם מכשור רפואי.\r\n\r\nאגב, אלפקה היא לא לאמה!'
            ],
        ];

        foreach ($items as $item) {
            BannerTranslation::create($item);
        }
    }
}
