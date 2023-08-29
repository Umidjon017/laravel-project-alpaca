<?php

namespace Database\Seeders;

use App\Models\Front\OurPartnerLogo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OurPartnerLogoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['logo' => '1692937840_partnyor1.png', 'link' => '#', 'order_id' => 1],
            ['logo' => '1692937847_partnyor2.png', 'link' => '#', 'order_id' => 2],
            ['logo' => '1692937853_partnyor3.png', 'link' => '#', 'order_id' => 3],
            ['logo' => '1692937859_partnyor4.png', 'link' => '#', 'order_id' => 4],
            ['logo' => '1692937866_partnyor5.png', 'link' => '#', 'order_id' => 5],
            ['logo' => '1692937873_partnyor6.png', 'link' => '#', 'order_id' => 6],
            ['logo' => '1692937879_partnyor7.png', 'link' => '#', 'order_id' => 7],
        ];

        foreach ($items as $item) {
            OurPartnerLogo::create($item);
        }
    }
}
