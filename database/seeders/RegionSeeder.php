<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Region;
use App\Models\RegionTranslation;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $region=Region::create(['country_id'=>1]);

        $region->translations()->saveMany([
            new RegionTranslation(['localization_id'=>1, 'name'=>'Астана']),
            new RegionTranslation(['localization_id'=>2, 'name'=>'Астана'])
        ]);

        $region=Region::create(['country_id'=>1]);

        $region->translations()->saveMany([
            new RegionTranslation(['localization_id'=>1, 'name'=>'Алматы']),
            new RegionTranslation(['localization_id'=>2, 'name'=>'Алматы'])
        ]);
    }
}
