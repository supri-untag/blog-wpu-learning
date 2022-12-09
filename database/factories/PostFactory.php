<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use mysql_xdevapi\Collection;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'tittle' => fake()->sentence(mt_rand(4,10)),
            'slug'=>fake()->slug(mt_rand(2,5)),
            'category_id' => mt_rand(1,5),
            'user_id' => mt_rand(1,5),
            'excerpt' => fake()->sentence(mt_rand(10,20)),
//            'body' => fake()->paragraph(mt_rand(20,100)),
            'body' => collect(fake()->paragraphs(mt_rand(10,20)))
                ->map(fn ($p) => "<p>$p</p>")
                ->implode(''),
        ];
    }
}
