<?php

namespace Database\Seeders;

use App\Models\Front\RecommendationTranslation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RecommendationTranslationSeeder extends Seeder
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
                'recommendation_id' => 1,
                'localization_id' => 1,
                'title' => 'Эффективное решениедля управления медицинскими предприятиями - попробуйте сейчас',
                'description' => 'Узнайте, как мы можем помочь вам оптимизировать работуи достичь высоких результатов с нашей системой.',
                'link_title' => 'Подробнее'
            ],
            [
                'recommendation_id' => 1,
                'localization_id' => 2,
                'title' => 'Эффективное решениедля управления медицинскими предприятиями - попробуйте сейчас',
                'description' => 'Узнайте, как мы можем помочь вам оптимизировать работуи достичь высоких результатов с нашей системой.',
                'link_title' => 'Подробнее ir'
            ],
        ];

        foreach ($items as $item) {
            RecommendationTranslation::create($item);
        }
    }
}
