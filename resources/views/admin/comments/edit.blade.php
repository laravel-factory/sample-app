@extends('admin.layouts.app', ['page' => 'comment'])

@section('title', 'Edit Comment')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Comment</h3>
            </div>

            <form role="form" method="POST" enctype="multipart/form-data" action="{{ route('admin.comments.update', ['comment' => $comment->id]) }}">
                @csrf
                @method('PUT')

                <div class="box-body">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text"
                            class="form-control"
                            name="title"
                            required
                            placeholder="Title"
                            value="{{ old('title', $comment->title) }}"
                            id="title"
                        >
                    </div>

                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea class="form-control"
                            name="content"
                            id="content"
                            required
                            placeholder="Content"
                        >{{ old('content', $comment->content) }}</textarea>
                    </div>

                    <img src="{{ $comment->getFirstMediaUrl('image') }}"
                        width="50"
                        alt="Image image"
                    >
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file"
                            class="form-control"
                            name="image"
                            required
                            value="{{ old('image', $comment->image) }}"
                            id="image"
                        >
                    </div>

                    <div class="form-group">
                        <label for="post-id">Post</label>
                        <select class="form-control"
                            name="post_id"
                            required
                            id="post-id"
                        >
                            @foreach ($posts as $post)
                                <option value="{{ $post->id }}"
                                    {{ old('post_id', $comment->post_id) == $post->id ? 'selected' : '' }}
                                >
                                    {{ $post->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Update</button>

                    <a href="{{ route('admin.comments.index') }}" class="btn btn-default">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
