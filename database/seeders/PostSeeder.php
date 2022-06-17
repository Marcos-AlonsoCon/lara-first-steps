<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Post::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        for ($i=0; $i < 30; $i++) { 
            // TAKES THE FIRST REGISTER FROM A RANDOM ORDER
            $c = Category::inRandomOrder()->first();

            $title = Str::random(20);

            Post::create([
                'title' => $title,
                'slug' => Str::slug($title),
                'content' => "<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sapiente sunt consequuntur voluptatum iusto provident. Laborum eveniet, unde tempore architecto repellat eos assumenda aliquam nulla dignissimos, fuga, nesciunt nostrum numquam optio.</p>",
                'category_id' => $c->id,
                'description' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio fuga voluptatem quidem maiores esse eos voluptates incidunt tempora, recusandae libero quaerat expedita explicabo repellendus. Dolore nihil alias et ab voluptate.",
                'posted' => "yes",
            ]);

        }

    }
}
