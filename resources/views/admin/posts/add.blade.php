@extends('admin.layouts.app', ['page' => 'post'])

@section('title', 'Add New Post')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Add New Post</h3>
            </div>

            <form role="form" method="POST" enctype="multipart/form-data" action="{{ route('admin.posts.store') }}">
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
                        <label for="customer-id">Customer</label>
                        <select class="form-control"
                            name="customer_id"
                            required
                            id="customer-id"
                        >
                            @foreach ($customers as $customer)
                                <option value="{{ $customer->id }}"
                                    {{ old('customer_id') == $customer->id ? 'selected' : '' }}
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
                                    {{ is_array(old('tags')) && in_array($tag->id, old('tags')) ? 'selected' : '' }}
                                >
                                    {{ $tag->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>

                    <a href="{{ route('admin.posts.index') }}" class="btn btn-default">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
