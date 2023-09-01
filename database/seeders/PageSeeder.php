<?php

namespace Database\Seeders;

use App\Models\Admin\Page;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['image' => NULL, 'slug' => 'alpaca-dlia-vraca', 'order_blocks' => NULL, 'meta_title' => NULL, 'meta_description' => NULL, 'meta_keywords' => NULL],
            ['image' => NULL, 'slug' => 'dlia-it', 'order_blocks' => NULL, 'meta_title' => NULL, 'meta_description' => NULL, 'meta_keywords' => NULL],
        ];

        foreach ($items as $item) {
            Page::create($item);
        }
    }
}
