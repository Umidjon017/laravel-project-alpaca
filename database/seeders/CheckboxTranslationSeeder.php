<?php

namespace Database\Seeders;

use App\Models\Admin\CheckboxBlockTranslation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CheckboxTranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['checkbox_block_id' => 1, 'localization_id' => 1, 'title' => 'упрощение работы и сохранение времени благодаря автоматизированным процессам и функциям записи пациентов;'],
            ['checkbox_block_id' => 1, 'localization_id' => 2, 'title' => 'упрощение работы и сохранение времени благодаря автоматизированным процессам и функциям записи пациентов;'],
            ['checkbox_block_id' => 2, 'localization_id' => 1, 'title' => 'улучшение точности диагностики и предоставление онлайн-доступа к медицинским данным для более качественного лечения;'],
            ['checkbox_block_id' => 2, 'localization_id' => 2, 'title' => 'улучшение точности диагностики и предоставление онлайн-доступа к медицинским данным для более качественного лечения;'],
            ['checkbox_block_id' => 3, 'localization_id' => 1, 'title' => 'увеличение эффективности работы врачей благодаря интеграции различных модулей и сводной медицинской информации;'],
            ['checkbox_block_id' => 3, 'localization_id' => 2, 'title' => 'увеличение эффективности работы врачей благодаря интеграции различных модулей и сводной медицинской информации;'],
            ['checkbox_block_id' => 4, 'localization_id' => 1, 'title' => 'усовершенствование коммуникации и координации между различными специалистами и медицинским персоналом;'],
            ['checkbox_block_id' => 4, 'localization_id' => 2, 'title' => 'усовершенствование коммуникации и координации между различными специалистами и медицинским персоналом;'],
            ['checkbox_block_id' => 5, 'localization_id' => 1, 'title' => 'повышение безопасности данных и соблюдение требований к конфиденциальности пациентов с помощью усиленной защиты информации.'],
            ['checkbox_block_id' => 5, 'localization_id' => 2, 'title' => 'повышение безопасности данных и соблюдение требований к конфиденциальности пациентов с помощью усиленной защиты информации.'],
            ['checkbox_block_id' => 6, 'localization_id' => 1, 'title' => 'Максимизируйте эффективность вашего медицинского бизнесас нашей операционной системой'],
            ['checkbox_block_id' => 6, 'localization_id' => 2, 'title' => 'Максимизируйте эффективность вашего медицинского бизнесас нашей операционной системой ir'],
            ['checkbox_block_id' => 7, 'localization_id' => 1, 'title' => 'Эффективное решениедля управления медицинскими предприятиями - попробуйте сейчас'],
            ['checkbox_block_id' => 7, 'localization_id' => 2, 'title' => 'Эффективное решениедля управления медицинскими предприятиями - попробуйте сейчас'],
        ];

        foreach ($items as $item) {
            CheckboxBlockTranslation::create($item);
        }
    }
}
