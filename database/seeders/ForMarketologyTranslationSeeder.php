<?php

namespace Database\Seeders;

use App\Models\Front\ForMarketologyTranslation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ForMarketologyTranslationSeeder extends Seeder
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
                'for_marketology_id' => 1,
                'localization_id' => 1,
                'title' => 'Для маркетолога',
                'description' => 'Мы поможем повысить эффективность вашей работы, принимать обоснованные и стратегические маркетинговые решения для успеха вашей компании.',
                'body' => '<p><strong>Централизованная система статистики</strong></p>\r\n\r\n<p>предоставляет доступк данным для анализа рынка и принятия маркетинговых решений.</p>\r\n\r\n<p><strong>Финансовые отчеты</strong></p>\r\n\r\n<p>обеспечиваем контроль бюджета и оптимизацию маркетинговых кампаний</p>\r\n\r\n<p><strong>Упрощенный доступ к информации</strong></p>\r\n\r\n<p>доступ к информациии аналитическим отчетам для анализа рынкаи маркетинговых кампаний.</p>\r\n\r\n<p><strong>Надежность и безопасность</strong></p>\r\n\r\n<p>широкий набор инструментов аналитики для оптимизации склада, персонала и маркетинговой аналитики от сайта до LTV</p>',
            ],
            [
                'for_marketology_id' => 1,
                'localization_id' => 2,
                'title' => 'Для маркетолога',
                'description' => 'Мы поможем повысить эффективность вашей работы, принимать обоснованные и стратегические маркетинговые решения для успеха вашей компании.',
                'body' => '<p><strong>Централизованная система статистики</strong></p>\r\n\r\n<p>предоставляет доступк данным для анализа рынка и принятия маркетинговых решений.</p>\r\n\r\n<p><strong>Финансовые отчеты</strong></p>\r\n\r\n<p>обеспечиваем контроль бюджета и оптимизацию маркетинговых кампаний</p>\r\n\r\n<p><strong>Упрощенный доступ к информации</strong></p>\r\n\r\n<p>доступ к информациии аналитическим отчетам для анализа рынкаи маркетинговых кампаний.</p>\r\n\r\n<p><strong>Надежность и безопасность</strong></p>\r\n\r\n<p>широкий набор инструментов аналитики для оптимизации склада, персонала и маркетинговой аналитики от сайта до LTV</p>',
            ],
        ];

        foreach ($items as $item) {
            ForMarketologyTranslation::create($item);
        }
    }
}
