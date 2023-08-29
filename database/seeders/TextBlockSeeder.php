<?php

namespace Database\Seeders;

use App\Models\Admin\TextBlock;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TextBlockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['page_id' => 1, 'order_id' => 1],
        ];

        foreach ($items as $item) {
            TextBlock::create($item);
        }
    }
}
