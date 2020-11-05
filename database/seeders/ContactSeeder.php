<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('contacts')->insert([
            'firstName'=>'Yunus',
            'lastName'=>'Kaya',
            'Subject'=>'Bilgilendirme',
            'email'=>'yk.kayayunus@gmail.com',
            'Message'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia, natus cum non expedita adipisci obcaecati voluptatum, voluptatem alias quia dolor, cumque sit! Provident quisquam hic deleniti praesentium dignissimos dolore dicta neque eveniet. Consequuntur labore praesentium doloremque ipsum distinctio quos! Praesentium voluptatum expedita, provident ipsam dolores tempore iusto eaque nesciunt sunt labore dignissimos quisquam accusantium sed aperiam minus alias deleniti impedit quos repellendus? Ex quibusdam numquam harum sit amet eius recusandae consequuntur dolorem incidunt exercitationem nemo mollitia quas temporibus ratione, cum unde repellendus ad assumenda, nam aperiam. Fugit eum id a doloribus distinctio, magnam laboriosam et nostrum, ullam repudiandae ipsa officiis!'
        ]);
        DB::table('contacts')->insert([
            'firstName'=>'Ali',
            'lastName'=>'Baş',
            'Subject'=>'İş Başvurusu',
            'email'=>'ali@gmail.com',
            'Message'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia, natus cum non expedita adipisci obcaecati voluptatum, voluptatem alias quia dolor, cumque sit! Provident quisquam hic deleniti praesentium dignissimos dolore dicta neque eveniet. Consequuntur labore praesentium doloremque ipsum distinctio quos! Praesentium voluptatum expedita, provident ipsam dolores tempore iusto eaque nesciunt sunt labore dignissimos quisquam accusantium sed aperiam minus alias deleniti impedit quos repellendus? Ex quibusdam numquam harum sit amet eius recusandae consequuntur dolorem incidunt exercitationem nemo mollitia quas temporibus ratione, cum unde repellendus ad assumenda, nam aperiam. Fugit eum id a doloribus distinctio, magnam laboriosam et nostrum, ullam repudiandae ipsa officiis!'
        ]);
    }
}
