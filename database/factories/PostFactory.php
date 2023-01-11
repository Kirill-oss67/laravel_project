<?php

namespace Database\Factories;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{

    protected $model = Post::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->title(20),
            'content' => $this->faker->text(), 
            'image' => $this->faker->imageUrl, 
            'likes' => random_int(1,1000), 
            'is_published' => 1, 
            'category_id' => Category::get()->random()->id, 
        ];
    }
}
