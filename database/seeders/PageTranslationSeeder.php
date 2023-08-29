<?php

namespace Database\Seeders;

use App\Models\Admin\PageTranslation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PageTranslationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['page_id' => 1, 'localization_id' => 1, 'title' => 'Alpaca для врача', 'content' => NULL],
            ['page_id' => 1, 'localization_id' => 2, 'title' => 'Alpaca для врача', 'content' => NULL],
            ['page_id' => 2, 'localization_id' => 1, 'title' => 'Для IT', 'content' => NULL],
            ['page_id' => 2, 'localization_id' => 2, 'title' => 'Для IT', 'content' => NULL],
        ];

        foreach ($items as $item) {
            PageTranslation::create($item);
        }
    }
}
