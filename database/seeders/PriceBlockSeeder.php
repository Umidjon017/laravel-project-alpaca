<?php

namespace Database\Seeders;

use App\Models\Admin\PriceBlock;
use Illuminate\Database\Seeder;

class PriceBlockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['page_id' => 2, 'icon' => '1693935120_circle1.png', 'price' => '3200', 'symbol' => '₽', 'link' => '#', 'order_id' => 1],
            ['page_id' => 2, 'icon' => '1693935163_circle3.png', 'price' => '6800', 'symbol' => '₽', 'link' => '#', 'order_id' => 2],
            ['page_id' => 2, 'icon' => '1693935883_circle2.png', 'price' => '4500', 'symbol' => '₽', 'link' => '#', 'order_id' => 3],
        ];

        foreach ($items as $item) {
            PriceBlock::create($item);
        }
    }
}
