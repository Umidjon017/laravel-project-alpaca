<?php

namespace Database\Seeders;

use App\Models\Admin\OurRule;
use Illuminate\Database\Seeder;

class OurRuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['page_id' => 2, 'file_personal_data' => '1693819073_check.png', 'file_personal_data_policy' => '1693819073_circle1.png'],
        ];

        foreach ($items as $item) {
            OurRule::create($item);
        }
    }
}
