<?php

namespace Database\Seeders;

use App\Models\Admin\Gallery;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['page_id' => 1, 'image' => '1692962063_slider.png', 'order_id' => 1],
            ['page_id' => 1, 'image' => '1692962072_slider.png', 'order_id' => 2],
            ['page_id' => 1, 'image' => '1692962082_slider.png', 'order_id' => 3],
            ['page_id' => 1, 'image' => '1692962090_slider.png', 'order_id' => 4],
            ['page_id' => 1, 'image' => '1692962098_slider.png', 'order_id' => 5],
            ['page_id' => 1, 'image' => '1693031028_rukovoditel.png', 'order_id' => 6],
        ];

        foreach ($items as $item) {
            Gallery::create($item);
        }
    }
}
