<?php

namespace Database\Seeders;

use App\Models\Admin\VideoPlayer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VideoPlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['page_id' => 1, 'video_poster' => '1692961981_vrach.png', 'video_url' => 'https://swachhcoin.com/videoplayback.mp4', 'order_id' => 1],
        ];

        foreach ($items as $item) {
            VideoPlayer::create($item);
        }
    }
}
