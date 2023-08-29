<?php

namespace Database\Seeders;

use App\Models\Front\ForDoctor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ForDoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['link' => '#', 'image' => '1692882754_vrach.png', 'order_id' => 1],
        ];

        foreach ($items as $item) {
            ForDoctor::create($item);
        }
    }
}
