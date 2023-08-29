<?php

namespace Database\Seeders;

use App\Models\Admin\CheckboxBlock;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CheckboxSeeder extends Seeder
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
            ['page_id' => 1, 'order_id' => 2],
            ['page_id' => 1, 'order_id' => 3],
            ['page_id' => 1, 'order_id' => 4],
            ['page_id' => 1, 'order_id' => 5],
            ['page_id' => 2, 'order_id' => 6],
            ['page_id' => 2, 'order_id' => 7],
        ];

        foreach ($items as $item) {
            CheckboxBlock::create($item);
        }
    }
}
