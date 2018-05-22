@extends('admin.layouts.app', ['page' => 'post'])

@section('title', 'Edit Post')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Post</h3>
            </div>

            <form role="form" method="POST" enctype="multipart/form-data" action="{{ route('admin.posts.update', ['post' => $post->id]) }}">
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
                            value="{{ old('title', $post->title) }}"
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
                        >{{ old('content', $post->content) }}</textarea>
                    </div>

                    <img src="{{ $post->getFirstMediaUrl('image') }}"
                        width="50"
                        alt="Image image"
                    >
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file"
                            class="form-control"
                            name="image"
                            required
                            value="{{ old('image', $post->image) }}"
                            id="image"
                        >
                    </div>

                    <div class="form-group">
                        <label for="customer-id">Customer</label>
                        <select class="form-control"
                            name="customer_id"
                            required
                            id="customer-id"
                        >
                            @foreach ($customers as $customer)
                                <option value="{{ $customer->id }}"
                                    {{ old('customer_id', $post->customer_id) == $customer->id ? 'selected' : '' }}
                                >
                                    {{ $customer->first_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="tags">Tag</label>
                        <select class="form-control"
                            name="tags[]"
                            required
                            multiple
                            id="tags"
                        >
                            @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}"
                                    {{ in_array($tag->id, old('tags', $post->tags)) ? 'selected' : '' }}
                                >
                                    {{ $tag->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Update</button>

                    <a href="{{ route('admin.posts.index') }}" class="btn btn-default">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
