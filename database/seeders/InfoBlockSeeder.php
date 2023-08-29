<?php

namespace Database\Seeders;

use App\Models\Admin\InfoBlock;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InfoBlockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['page_id' => 1, 'link' => '#', 'image' => '1692954597_vrach.png', 'order_id' => 1],
        ];

        foreach ($items as $item) {
            InfoBlock::create($item);
        }
    }
}
