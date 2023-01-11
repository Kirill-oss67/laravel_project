<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Category;
use PhpParser\Node\Stmt\Foreach_;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {   
        Category::factory(20)->create();
        $tags =Tag::factory(70)->create();
        $posts = Post::factory(200)->create();
        foreach($posts as $post){
            $tagsIds = $tags->random(5)->pluck('id');
            $post->tags()->attach($tagsIds);
        }
        
        // \App\Models\User::factory(10)->create();
    }
}
