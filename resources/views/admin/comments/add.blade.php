@extends('admin.layouts.app', ['page' => 'comment'])

@section('title', 'Add New Comment')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Add New Comment</h3>
            </div>

            <form role="form" method="POST" enctype="multipart/form-data" action="{{ route('admin.comments.store') }}">
                @csrf

                <div class="box-body">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text"
                            class="form-control"
                            name="title"
                            required
                            placeholder="Title"
                            value="{{ old('title') }}"
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
                        >{{ old('content') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file"
                            class="form-control"
                            name="image"
                            required
                            value="{{ old('image') }}"
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
                                    {{ old('post_id') == $post->id ? 'selected' : '' }}
                                >
                                    {{ $post->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>

                    <a href="{{ route('admin.comments.index') }}" class="btn btn-default">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
