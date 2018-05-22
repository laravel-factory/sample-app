<?php

use Illuminate\Database\Seeder;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Comment::class, 5)->create()->each(function ($comment) {
            $comment->addMediaFromUrl('https://source.unsplash.com/random/200x200')
                ->toMediaCollection('image')
            ;

            $comment->post->addMediaFromUrl('https://source.unsplash.com/random/200x200')
                ->toMediaCollection('image')
            ;
        });
    }
}
