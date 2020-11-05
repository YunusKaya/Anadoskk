<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class LikeDislikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= 57; $i++)
        {
            for ($a=7; $a<=22 ;$a++)
            {
                DB::table('like_dislikes')->insert([
                    'user_id'=>$a,
                    'articles_id'=>$i,
                    'statu'=>rand(0, 1)
                ]);

            }
        }
    }
}
