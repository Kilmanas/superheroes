<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlignmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $alignments = ['good', 'bad'];
        foreach ($alignments as $alignment) {
            DB::table('alignments')->insert([

                'name' => $alignment
            ]);
        }
    }
}
