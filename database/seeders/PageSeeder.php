<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')->insert([
            'catagory_id'=>'1',
            'hood'=>'Dağcılık',
            'img'=>'img/activity.jpg',
            'article'=>"<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus nesciunt at deserunt debitis omnis nam fugiat fugit excepturi quae dolorum modi sunt eius accusantium, error, molestias culpa? Provident at voluptate iure expedita sapiente sed earum nesciunt eos neque nemo officiis explicabo voluptatibus suscipit ducimus unde, debitis laboriosam qui minus harum odit blanditiis perferendis maiores consectetur reiciendis. Maiores atque consequatur ad suscipit laboriosam recusandae libero soluta, vel, neque sint veniam tempore repudiandae quae dolorum iste saepe illo. Ad illo, dolores, voluptas unde nesciunt at, aspernatur veritatis libero minus dolore delectus laudantium tempora distinctio exercitationem vel? Suscipit maiores qui tempora quisquam reiciendis sunt, praesentium nihil explicabo dolorum distinctio? Consectetur dignissimos nemo assumenda ipsa, nobis quam ullam doloribus corporis ratione tempore fugiat provident quisquam facere maxime aliquam! Est a maxime totam harum! Necessitatibus quidem quibusdam repellat pariatur dolorem. Nesciunt quibusdam molestias aliquam aspernatur. Repellendus eos illum atque nihil dolorem corrupti perferendis! Quia consectetur impedit eos minima! Nemo asperiores eveniet et? Labore vero nesciunt dolore totam rem numquam ipsam ipsum accusantium vitae quia, enim quidem animi iusto magnam optio cum id illo, repellendus nisi perspiciatis adipisci libero laboriosam. Recusandae nemo quos laboriosam porro sint voluptates error debitis quidem atque repellendus. Sed facilis voluptatem voluptates!</p>",
            'slug'=>'Dağcılık'.uniqid(),
        ]);
        DB::table('pages')->insert([
            'catagory_id'=>'1',
            'hood'=>'Yazılar',
            'img'=>'img/Duyuru.png',
            'article'=>"<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus nesciunt at deserunt debitis omnis nam fugiat fugit excepturi quae dolorum modi sunt eius accusantium, error, molestias culpa? Provident at voluptate iure expedita sapiente sed earum nesciunt eos neque nemo officiis explicabo voluptatibus suscipit ducimus unde, debitis laboriosam qui minus harum odit blanditiis perferendis maiores consectetur reiciendis. Maiores atque consequatur ad suscipit laboriosam recusandae libero soluta, vel, neque sint veniam tempore repudiandae quae dolorum iste saepe illo. Ad illo, dolores, voluptas unde nesciunt at, aspernatur veritatis libero minus dolore delectus laudantium tempora distinctio exercitationem vel? Suscipit maiores qui tempora quisquam reiciendis sunt, praesentium nihil explicabo dolorum distinctio? Consectetur dignissimos nemo assumenda ipsa, nobis quam ullam doloribus corporis ratione tempore fugiat provident quisquam facere maxime aliquam! Est a maxime totam harum! Necessitatibus quidem quibusdam repellat pariatur dolorem. Nesciunt quibusdam molestias aliquam aspernatur. Repellendus eos illum atque nihil dolorem corrupti perferendis! Quia consectetur impedit eos minima! Nemo asperiores eveniet et? Labore vero nesciunt dolore totam rem numquam ipsam ipsum accusantium vitae quia, enim quidem animi iusto magnam optio cum id illo, repellendus nisi perspiciatis adipisci libero laboriosam. Recusandae nemo quos laboriosam porro sint voluptates error debitis quidem atque repellendus. Sed facilis voluptatem voluptates!</p>",
            'slug'=>'Yazılar'.uniqid(),
        ]);
        DB::table('pages')->insert([
            'catagory_id'=>'4',
            'hood'=>'Deneme',
            'img'=>'img/Duyuru.png',
            'article'=>"<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus nesciunt at deserunt debitis omnis nam fugiat fugit excepturi quae dolorum modi sunt eius accusantium, error, molestias culpa? Provident at voluptate iure expedita sapiente sed earum nesciunt eos neque nemo officiis explicabo voluptatibus suscipit ducimus unde, debitis laboriosam qui minus harum odit blanditiis perferendis maiores consectetur reiciendis. Maiores atque consequatur ad suscipit laboriosam recusandae libero soluta, vel, neque sint veniam tempore repudiandae quae dolorum iste saepe illo. Ad illo, dolores, voluptas unde nesciunt at, aspernatur veritatis libero minus dolore delectus laudantium tempora distinctio exercitationem vel? Suscipit maiores qui tempora quisquam reiciendis sunt, praesentium nihil explicabo dolorum distinctio? Consectetur dignissimos nemo assumenda ipsa, nobis quam ullam doloribus corporis ratione tempore fugiat provident quisquam facere maxime aliquam! Est a maxime totam harum! Necessitatibus quidem quibusdam repellat pariatur dolorem. Nesciunt quibusdam molestias aliquam aspernatur. Repellendus eos illum atque nihil dolorem corrupti perferendis! Quia consectetur impedit eos minima! Nemo asperiores eveniet et? Labore vero nesciunt dolore totam rem numquam ipsam ipsum accusantium vitae quia, enim quidem animi iusto magnam optio cum id illo, repellendus nisi perspiciatis adipisci libero laboriosam. Recusandae nemo quos laboriosam porro sint voluptates error debitis quidem atque repellendus. Sed facilis voluptatem voluptates!</p>",
            'slug'=>'Deneme'.uniqid(),
        ]);
    }
}
