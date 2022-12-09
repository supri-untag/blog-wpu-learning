<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create([
            'name' => 'Supriyanto',
            'username' => 'supri',
            'email' => 'supriyanto.sup@untagsmg.ac.id',
            'password' => Hash::make('supriyanto.sup')
        ]);

         \App\Models\User::factory(5)->create();
         Post::factory(40)->create();
         Category::factory(5)->create();


//        Category::factory()->create([
//            "name" => fake()->sentence(),
//            "slug" => "programing",
//        ]);
    }
}
