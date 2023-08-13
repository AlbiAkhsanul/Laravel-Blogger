<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Mr Anonymous Admin',
            'username' => 'deadmin',
            'email' => 'personaltestadminl@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('K0ch3nk132400678=+'), // password
            'remember_token' => Str::random(10),
            'is_admin' => true,
        ]);

        User::create([
            'name' => 'Mr Anonymous',
            'username' => 'deanon',
            'email' => 'personaltestemail@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('K0ch3nk132400678=+'), // password
            'remember_token' => Str::random(10),
            'is_admin' => false,
        ]);

        User::factory(9)->create();

        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming',
        ]);

        Category::create([
            'name' => 'Machine Learning',
            'slug' => 'machine-learning',
        ]);

        Category::create([
            'name' => 'Personal Life',
            'slug' => 'personal-life',
        ]);

        Category::create([
            'name' => 'Fine Art',
            'slug' => 'fine-art',
        ]);

        Category::create([
            'name' => 'Data Science',
            'slug' => 'data-science',
        ]);

        Category::create([
            'name' => 'Mathematic',
            'slug' => 'mathematic',
        ]);

        Category::create([
            'name' => 'Quantum Science',
            'slug' => 'quantum-science',
        ]);

        Category::create([
            'name' => 'Humour',
            'slug' => 'humour',
        ]);

        Post::factory(50)->create();
 
    }
}
