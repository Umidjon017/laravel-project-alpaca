<?php

namespace Database\Seeders;

use App\Models\Admin\OurClientTranslation;
use Illuminate\Database\Seeder;

class OurClientTranslationSeeder extends Seeder
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
                'our_client_id' => 1,
                'localization_id' => 1,
                'title' => 'Уже протестировали и внедрили',
                'description' => 'Ведущие медицинские организации уже работают с нашей системой',
            ],
            [
                'our_client_id' => 1,
                'localization_id' => 2,
                'title' => 'Уже протестировали и внедрили',
                'description' => 'Ведущие медицинские организации уже работают с нашей системой',
            ],
        ];

        foreach ($items as $item) {
            OurClientTranslation::create($item);
        }
    }
}
