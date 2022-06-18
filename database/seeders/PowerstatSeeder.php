<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PowerstatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $powerstats = ['Intelligence', 'Strength', 'Speed', 'Durability', 'Power', 'Combat'];
        foreach ($powerstats as $powerstat) {
            DB::table('powerstats')->insert([

                'name' => $powerstat
            ]);
        }
    }
}
