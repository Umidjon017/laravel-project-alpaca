<?php

namespace Database\Seeders;

use App\Models\Front\ForLeader;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ForLeaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['link' => '#', 'image' => '1692937439_rukovoditel.png', 'order_id' => 1],
        ];

        foreach ($items as $item) {
            ForLeader::create($item);
        }
    }
}
