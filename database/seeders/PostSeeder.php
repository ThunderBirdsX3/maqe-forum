<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = file_get_contents('https://maqe.github.io/json/posts.json');

        $posts = json_decode($json, true);

        Post::query()->insert(collect($posts)->map(function ($post) {
            $created_at = Carbon::create($post['created_at']);
            $post['created_at'] = $created_at;
            $post['updated_at'] = $created_at;

            return $post;
        })->toArray());
    }
}
