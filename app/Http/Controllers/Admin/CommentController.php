<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use App\Post;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    /**
     * Display a list of Comments.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::getList();

        return view('admin.comments.index', compact('comments'));
    }

    /**
     * Show the form for creating a new Comment
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $posts = Post::all();

        return view('admin.comments.add', compact('posts'));
    }

    /**
     * Save new Comment
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $validatedData = request()->validate(Comment::validationRules());

        unset($validatedData['image']);
        $comment = Comment::create($validatedData);

        $comment->addMediaFromRequest('image')->toMediaCollection('image');

        return redirect()->route('admin.comments.index')->with([
            'type' => 'success',
            'message' => 'Comment added'
        ]);
    }

    /**
     * Show the form for editing the specified Comment
     *
     * @param \App\Comment $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        $posts = Post::all();

        return view('admin.comments.edit', compact('comment', 'posts'));
    }

    /**
     * Update the Comment
     *
     * @param \App\Comment $comment
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Comment $comment)
    {
        $validatedData = request()->validate(
            Comment::validationRules($comment->id)
        );

        unset($validatedData['image']);
        $comment->update($validatedData);

        $comment->addMediaFromRequest('image')->toMediaCollection('image');

        return redirect()->route('admin.comments.index')->with([
            'type' => 'success',
            'message' => 'Comment Updated'
        ]);
    }

    /**
     * Delete the Comment
     *
     * @param \App\Comment $comment
     * @return void
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect()->route('admin.comments.index')->with([
            'type' => 'success',
            'message' => 'Comment deleted successfully'
        ]);
    }
}
