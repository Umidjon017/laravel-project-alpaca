<?php

namespace Database\Seeders;

use App\Models\Admin\DirectSpeech;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DirectSpeechSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['page_id' => 1, 'logo' => '1692962034_user2.png', 'image' => '1692962034_partnyor5.png', 'order_id' => 1],
        ];

        foreach ($items as $item) {
            DirectSpeech::create($item);
        }
    }
}
