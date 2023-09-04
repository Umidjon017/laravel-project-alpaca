<?php

namespace Database\Seeders;

use App\Models\Front\Banner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['try_link' => '#', 'more_link' => '#', 'image' => '1692881623_hero.png', 'order_id' => 1],
        ];

        foreach ($items as $item) {
            Banner::create($item);
        }
    }
}
