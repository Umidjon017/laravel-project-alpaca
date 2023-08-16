<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Localization;

class LocalizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $languages=[
            [
                'id'=>1,
                'name'=>'ru'
            ],
            [
                'id'=>2,
                'name'=>'ir'
            ],
        ];

        foreach($languages as $lang){
            Localization::create($lang);
        }

    }
}
