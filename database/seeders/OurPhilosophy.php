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
        $ourPhilosophy = [
            [
                'link' => '#',
                'icon' => null
            ],
        ];
        foreach ($ourPhilosophy as $philosophy) {
            \App\Models\Front\OurPhilosophy::Create($philosophy);
        }
    }
}
