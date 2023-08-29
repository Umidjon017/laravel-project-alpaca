<?php

namespace Database\Seeders;

use App\Models\Front\Recommendation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RecommendationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['link' => '#', 'image' => '1692937916_end.png', 'order_id' => 1],
        ];

        foreach ($items as $item) {
            Recommendation::create($item);
        }
    }
}
