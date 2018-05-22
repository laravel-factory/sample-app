<?php

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Post::class, 5)->create()->each(function ($post) {
            $post->addMediaFromUrl('https://source.unsplash.com/random/200x200')
                ->toMediaCollection('image')
            ;
        });
    }
}
