<?php

namespace Database\Factories;

use App\Models\Posts;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class PostsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Posts::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {   
        $author = User::factory()->create();
        return [
            'user_id' => User::factory(),
            'status' => $author->id,
            'title' => $words(3, true),
            'content' => $this->faker->paragraph(),
            
        ];
    }
}

