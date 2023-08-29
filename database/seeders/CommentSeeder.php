<?php

namespace Database\Seeders;

use App\Models\Admin\Comment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['page_id' => 2, 'logo' => '1692955569_partnyor3.png', 'image' => '1692955569_user1.png', 'order_id' => 1],
            ['page_id' => 2, 'logo' => '1692955654_partnyor5.png', 'image' => '1692955654_user2.png', 'order_id' => 2],
            ['page_id' => 2, 'logo' => '1692955697_partnyor6.png', 'image' => '1692955697_user3.png', 'order_id' => 3],
            ['page_id' => 2, 'logo' => '1692955722_partnyor6.png', 'image' => '1692955722_user3.png', 'order_id' => 4],
        ];

        foreach ($items as $item) {
            Comment::create($item);
        }
    }
}
