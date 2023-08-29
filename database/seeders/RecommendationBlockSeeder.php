<?php

namespace Database\Seeders;

use App\Models\Admin\RecommendationBlock;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RecommendationBlockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['page_id' => 1, 'link' => '#', 'image' => '1692961373_end.png', 'order_id' => 1],
        ];

        foreach ($items as $item) {
            RecommendationBlock::create($item);
        }
    }
}
