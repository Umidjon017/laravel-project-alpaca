<?php

namespace Database\Seeders;

use App\Models\Admin\OurClientLogo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OurClientLogoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['page_id' => 1, 'logo' => '1692955862_partnyor1.png', 'link' => '#', 'order_id' => 1],
            ['page_id' => 1, 'logo' => '1692955867_partnyor2.png', 'link' => '#', 'order_id' => 2],
            ['page_id' => 1, 'logo' => '1692955872_partnyor3.png', 'link' => '#', 'order_id' => 3],
            ['page_id' => 1, 'logo' => '1692955877_partnyor4.png', 'link' => '#', 'order_id' => 4],
            ['page_id' => 1, 'logo' => '1692955897_partnyor5.png', 'link' => '#', 'order_id' => 5],
            ['page_id' => 1, 'logo' => '1692955904_partnyor6.png', 'link' => '#', 'order_id' => 6],
            ['page_id' => 1, 'logo' => '1692955910_partnyor7.png', 'link' => '#', 'order_id' => 7],
        ];

        foreach ($items as $item) {
            OurClientLogo::create($item);
        }
    }
}
