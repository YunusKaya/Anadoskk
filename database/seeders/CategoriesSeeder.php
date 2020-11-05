<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=['Ders','Duyuru','Etkinlik','Haberler','Yazılar','Kış Dağcılığı','Yaz Dağcılığı','Kamp'];
        foreach ($data as $dat)
        {
            DB::table('categories')->insert([
                'name'=>$dat,
                'slug'=>(Str::slug($dat).uniqid())
            ]);
        }
    }
}
