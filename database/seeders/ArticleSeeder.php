<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker::create();
        for ($i=1;$i<=57;$i++)
        {
            $title=$faker->sentence(rand(4,8));
            DB::table('articles')->insert([
                'writer_id' => rand(2, 7),
                'category_id'=>rand(4,8),
                'title' => $title,
                'article' => ("<p>".$faker->paragraph(35)."</p>"),
                'img' => $faker->imageUrl('800', '400', 'nature'),
                'slug' => (Str::slug($title) . uniqid()),
                'flag'=>1,
            ]);
        }
    }
}
