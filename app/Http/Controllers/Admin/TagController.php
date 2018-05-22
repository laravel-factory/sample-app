<?php

namespace App\Http\Controllers\Admin;

use App\Tag;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    /**
     * Display a list of Tags.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::getList();

        return view('admin.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new Tag
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tags.add');
    }

    /**
     * Save new Tag
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $validatedData = request()->validate(Tag::validationRules());

        $tag = Tag::create($validatedData);

        return redirect()->route('admin.tags.index')->with([
            'type' => 'success',
            'message' => 'Tag added'
        ]);
    }

    /**
     * Show the form for editing the specified Tag
     *
     * @param \App\Tag $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('admin.tags.edit', compact('tag'));
    }

    /**
     * Update the Tag
     *
     * @param \App\Tag $tag
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Tag $tag)
    {
        $validatedData = request()->validate(
            Tag::validationRules($tag->id)
        );

        $tag->update($validatedData);

        return redirect()->route('admin.tags.index')->with([
            'type' => 'success',
            'message' => 'Tag Updated'
        ]);
    }

    /**
     * Delete the Tag
     *
     * @param \App\Tag $tag
     * @return void
     */
    public function destroy(Tag $tag)
    {
        if ($tag->posts()->count()) {
            return redirect()->route('admin.tags.index')->with([
                'type' => 'error',
                'message' => 'This record cannot be deleted as there are relationship dependencies.'
            ]);
        }

        $tag->delete();

        return redirect()->route('admin.tags.index')->with([
            'type' => 'success',
            'message' => 'Tag deleted successfully'
        ]);
    }
}
