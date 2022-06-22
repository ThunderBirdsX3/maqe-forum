<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = file_get_contents('https://maqe.github.io/json/authors.json');

        $authors = json_decode($json, true);

        Author::query()->insert($authors);
    }
}
