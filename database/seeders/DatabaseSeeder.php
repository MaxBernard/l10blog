<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 200; $i++) {
            DB::table('posts')->insert([
                'author_id' => 1,
                'year' => '2023',
                'month' => '9',
                'title' => $faker->sentence($nbWords = 6, $variableNbWords = true),
                'slug' => '',
                // 'slug' => $faker->paragraph($nbSentences = 2, $variableNbSentences = true),
                'content' => $faker->text($maxNbChars = 500),
                'cover_image' => 'code_01.png',
                'category' => 1,
                'tag' => 1,
                'public' => 1,
                'deleted_at' => '2023-09-25'
            ]);
        }
    }
    
}
