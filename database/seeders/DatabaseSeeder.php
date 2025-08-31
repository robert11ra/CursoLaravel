<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Question;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(20)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'a@test.com',
        ]);

        $categories = Category::factory(20)->create();

        /*$questions = Question::factory(10)->create([
            'category_id' => fn() => $categories->random()->id,
            'user_id' => fn() => User::inRandomOrder()->first()->id
        ]);*/
    }
}
