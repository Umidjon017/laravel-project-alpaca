<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OurPhilosophy extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['link' => '#', 'icon' => '1692882140_star2.png,1692882140_star3.png', 'order_id' => 1],
        ];

        foreach ($items as $item) {
            \App\Models\Front\OurPhilosophy::create($item);
        }
    }
}
