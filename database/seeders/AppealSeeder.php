<?php

namespace Database\Seeders;

use App\Models\Admin\Appeal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AppealSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['page_id' => 2, 'order_id' => 1],
        ];

        foreach ($items as $item) {
            Appeal::create($item);
        }
    }
}
