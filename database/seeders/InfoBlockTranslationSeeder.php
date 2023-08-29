<?php

namespace Database\Seeders;

use App\Models\Admin\InfoBlockTranslation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InfoBlockTranslationSeeder extends Seeder
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
                'info_block_id' => 1,
                'localization_id' => 1,
                'title' => 'Alpaca для врача',
                'description' => 'Экономьте время на рутинных задачах и сосредоточьтесьна самом главном - заботе о здоровье ваших пациентов',
                'body' => NULL,
            ],
            [
                'info_block_id' => 1,
                'localization_id' => 2,
                'title' => 'Alpaca для врача',
                'description' => 'Экономьте время на рутинных задачах и сосредоточьтесьна самом главном - заботе о здоровье ваших пациентов',
                'body' => NULL,
            ],
        ];

        foreach ($items as $item) {
            InfoBlockTranslation::create($item);
        }
    }
}
