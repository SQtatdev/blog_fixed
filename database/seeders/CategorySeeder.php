<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->makeChildren(3);
        $posts = Post::all();
        $categories = Category::all();
        foreach($posts as $post) {
            if(rand(0,9)) {
                $post->category_id = $categories->random()->id;
                $post->save();
            }
        }
    }

    public function makeChildren($level, $parentId=null){
        if($level !== 0) {
            $categories = Category::factory(rand($level, 4))->create(['category_id' => $parentId]);
            foreach($categories as $category) {
                $this->makeChildren($level-1, $category->id);
            }
        }
    }
}