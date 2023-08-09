<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Country;
use App\Models\CountryTranslation;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        $country=Country::create([]);

        $country->translations()->saveMany([
            new CountryTranslation(['localization_id'=>1, 'name'=>'Kazaxstan']),
            new CountryTranslation(['localization_id'=>2, 'name'=>'Казахстан']),
        ]);
        
    }
}
