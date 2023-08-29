<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OurPhilosophyTranslation extends Seeder
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
                'our_philosophy_id' => 1,
                'localization_id'   => 1,
                'title'             => 'Наша философия',
                'description'       => 'Мы понимаем уникальность каждого медицинского центраи предлагаем настраиваемое решение, повышающее эффективность вашего бизнеса',
                'additional'        => 'Все функции в единой системе для вашего медицинского центра, Наш залог - наилучший опыт для пациентов, Предоставляем инструментарий для эффективного управления, Используем самую современную архитектуру с защитой по умолчанию',
            ],
            [
                'our_philosophy_id' => 1,
                'localization_id'   => 2,
                'title'             => 'Наша философия',
                'description'       => 'Мы понимаем уникальность каждого медицинского центраи предлагаем настраиваемое решение, повышающее эффективность вашего бизнеса',
                'additional'        => 'Все функции в единой системе для вашего медицинского центра, Наш залог - наилучший опыт для пациентов, Предоставляем инструментарий для эффективного управления, Используем самую современную архитектуру с защитой по умолчанию',
            ],
        ];
        foreach ($items as $item) {
            \App\Models\Front\OurPhilosophyTranslation::Create($item);
        }
    }
}
