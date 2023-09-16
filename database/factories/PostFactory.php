<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Process\FakeProcessResult;
use Illuminate\Support\Str;

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
    public function definition(): array
    {
        $title = fake()->sentence(mt_rand(2, 5));
        return [
            'title' => $title,
            'slug' => str::slug($title, '-'),
            'exercpt' => fake()->paragraph(mt_rand(2, 3)),
            // 'body' => '<p>' . implode('</p><p>',fake()->paragraphs(mt_rand(5,10))) . //'</p>', use method implode
            // 'body' => collect(fake()->paragraphs(mt_rand(5,10)))
            //            ->map(function($pBody){
            //             return "<p>$pBody</p>";
            //            })->implode(''), //use map
            'body' => collect(fake()->paragraphs(mt_rand(5, 10)))->map(fn ($pBody) => "<p>$pBody</p>")->implode(''), //use map and arrow function
            // 'body' => Fake()->paragraphs(mt_rand(5,10),true), //one long pragraph
            'user_id' => mt_rand(1, 11),
            'category_id' => mt_rand(1, 8)
        ];
    }
}
