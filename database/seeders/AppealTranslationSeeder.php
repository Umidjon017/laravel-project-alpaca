<?php

namespace Database\Seeders;

use App\Models\Admin\AppealTranslation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AppealTranslationSeeder extends Seeder
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
                'appeal_id' => 1,
                'localization_id' => 1,
                'title' => 'Запросите демо-версию и управляйте своим медицинским предприятием легко и эффективно',
                'description' => 'Для получения полноценной демонстрации и презентации, пожалуйста, заполните контактную форму'
            ],
            [
                'appeal_id' => 1,
                'localization_id' => 2,
                'title' => 'Запросите демо-версию и управляйте своим медицинским предприятием легко и эффективно',
                'description' => 'Для получения полноценной демонстрации и презентации, пожалуйста, заполните контактную форму'
            ],
        ];

        foreach ($items as $item) {
            AppealTranslation::create($item);
        }
    }
}
