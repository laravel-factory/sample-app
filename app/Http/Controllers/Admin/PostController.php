<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Customer;
use App\Tag;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * Display a list of Posts.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::getList();

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new Post
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::all();
        $tags = Tag::all();

        return view('admin.posts.add', compact('customers', 'tags'));
    }

    /**
     * Save new Post
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $validatedData = request()->validate(Post::validationRules());

        unset($validatedData['image'], $validatedData['tags']);
        $post = Post::create($validatedData);

        $post->addMediaFromRequest('image')->toMediaCollection('image');

        $post->tags()->sync(request('tags'));

        return redirect()->route('admin.posts.index')->with([
            'type' => 'success',
            'message' => 'Post added'
        ]);
    }

    /**
     * Show the form for editing the specified Post
     *
     * @param \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $customers = Customer::all();
        $tags = Tag::all();

        $post->tags = $post->tags->pluck('id')->toArray();

        return view('admin.posts.edit', compact('post', 'customers', 'tags'));
    }

    /**
     * Update the Post
     *
     * @param \App\Post $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Post $post)
    {
        $validatedData = request()->validate(
            Post::validationRules($post->id)
        );

        unset($validatedData['image'], $validatedData['tags']);
        $post->update($validatedData);

        $post->addMediaFromRequest('image')->toMediaCollection('image');

        $post->tags()->sync(request('tags'));

        return redirect()->route('admin.posts.index')->with([
            'type' => 'success',
            'message' => 'Post Updated'
        ]);
    }

    /**
     * Delete the Post
     *
     * @param \App\Post $post
     * @return void
     */
    public function destroy(Post $post)
    {
        if ($post->comments()->count() || $post->tags()->count()) {
            return redirect()->route('admin.posts.index')->with([
                'type' => 'error',
                'message' => 'This record cannot be deleted as there are relationship dependencies.'
            ]);
        }

        $post->delete();

        return redirect()->route('admin.posts.index')->with([
            'type' => 'success',
            'message' => 'Post deleted successfully'
        ]);
    }
}
