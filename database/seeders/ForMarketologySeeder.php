<?php

namespace Database\Seeders;

use App\Models\Front\ForMarketology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ForMarketologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['link' => '#', 'image' => '1692937576_marketolog.png', 'order_id' => 1],
        ];

        foreach ($items as $item) {
            ForMarketology::create($item);
        }
    }
}
