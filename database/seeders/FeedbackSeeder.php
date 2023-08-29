<?php

namespace Database\Seeders;

use App\Models\Front\Feedback;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['logo' => '1692937701_partnyor3.png', 'image' => '1692937701_user1.png', 'order_id' => 1],
            ['logo' => '1692937752_partnyor5.png', 'image' => '1692937752_user2.png', 'order_id' => 2],
            ['logo' => '1692937796_partnyor6.png', 'image' => '1692937796_user3.png', 'order_id' => 3],
            ['logo' => '1692937820_partnyor6.png', 'image' => '1692937820_user3.png', 'order_id' => 4],
        ];

        foreach ($items as $item) {
            Feedback::create($item);
        }
    }
}
