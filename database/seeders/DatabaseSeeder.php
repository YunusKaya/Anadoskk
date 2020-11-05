<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call(AdminSeeder::class);
        $this->call(categoriesSeeder::class);
        $this->call(ContactSeeder::class);
        $this->call(PageSeeder::class);
        $this->call(RaporFaliyetSeeder::class);
        $this->call(SubTextSeeder::class);
        $this->call(TitleSeeder::class);
        $this->call(ArticleSeeder::class);
        $this->call(LikeDislikeSeeder::class);
        $this->call(FallowSeeder::class);
    }
}
