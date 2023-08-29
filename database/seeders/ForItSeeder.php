<?php

namespace Database\Seeders;

use App\Models\Front\ForIt;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ForItSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['link' => '#', 'image' => '1692937525_it.png', 'order_id' => 1],
        ];

        foreach ($items as $item) {
            ForIt::create($item);
        }
    }
}
