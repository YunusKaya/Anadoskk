<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RaporFaliyetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('activityreports')->insert([
            'explanation'=>'Sultan Dağı Gelincikana Zirve Tırmanışı Faliyet Raporu',
            'explanationDate'=>'18 - 20 Ekim 2019',
            'URL'=>'uploads/report/5f5491622016718-20_Ekim_2019_Sultan_Da_Gelincikana_Zirve_Tırman.pdf',
            'slug'=>Str::slug('Sultan Dağı Gelincikana Zirve Tırmanışı Faliyet Raporu').uniqid()
        ]);
        DB::table('activityreports')->insert([
            'explanation'=>'Totorum Faaliyet Raporu',
            'explanationDate'=>'27 Haziran 2019',
            'URL'=>'uploads/report/5f54916beea7b27_06_2019_Totorum_Faaliyet_Rapor.pdf',
            'slug'=>Str::slug('Totorum Faaliyet Raporu').uniqid()
        ]);
        DB::table('activityreports')->insert([
            'explanation'=>'Çağalınbaş Kuzey Duvarı Faliyet Raporu',
            'explanationDate'=>'18 - 19 Eylül 2017',
            'URL'=>'uploads/report/5f549154a902b18-19_Eylül_2017_ÇAĞALINBAŞI_KUZEY_DUVARI.pdf',
            'slug'=>Str::slug('Çağalınbaş Kuzey Duvarı Faliyet Raporu').uniqid()
        ]);
        DB::table('activityreports')->insert([
            'explanation'=>'Afyon Sultandağı Faaliyet Raporu',
            'explanationDate'=>'10 - 11 Ekim 2015',
            'URL'=>'uploads/report/5f5491345b50e10-11_Ekim_2015_Afyon_Sultandağı_Faaliyet_Raporu.pdf',
            'slug'=>Str::slug('Afyon Sultandağı Faaliyet Raporu').uniqid()
        ]);
    }
}
