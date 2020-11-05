<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FallowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i = 8; $i<=22; $i++)
        {
            for ($a=1; $a<=3; $a++)
            {
                DB::table('follows')->insert([
                    'user_id' => $i,
                    'writer_id' => rand(2, 7),
                ]);
            }
        }
    }
}
