<?php

use Illuminate\Database\Seeder;

class CategoryModifySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('posts')->orderBy('id')->chunk(10000, function($posts) {
            foreach ($posts as $post) {

                $maincategory = DB::table('categories')->where('type', $post->type)->first();

                DB::table('posts')
                    ->where('id', $post->id)
                    ->update(['categories' => '["'.$maincategory->id.','.$post->category_id.',"]']);

            }
        });



    }
}
