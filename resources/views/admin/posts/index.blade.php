@extends('admin.layouts.app', ['page' => 'post'])

@section('title', 'Posts')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Posts</h3>

                <a class="pull-right btn btn-sm btn-primary" href="{{ route('admin.posts.create') }}">
                    Add New
                </a>
            </div>
            <div class="box-body">
                <table class="table table-bordered">
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Customer</th>
                        <th>Action</th>
                    </tr>

                    @forelse ($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->title }}</td>
                            <td>
                                <img src="{{ $post->getFirstMediaUrl('image') }}"
                                    width="50"
                                    alt="Image image"
                                >
                            </td>
                            <td>{{ $post->customer->first_name }}</td>
                            <td>
                                <a href="{{ route('admin.posts.edit', ['post' => $post->id]) }}">
                                    &#9997;
                                </a>

                                <form action="{{ route('admin.posts.destroy', ['post' => $post->id]) }}"
                                    method="POST"
                                    class="inline pointer"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <a onclick="if (confirm('Are you sure?')) { this.parentNode.submit() }">&#10005;</a>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">No records found</td>
                        </tr>
                    @endforelse
                </table>
            </div>

            <div class="box-footer clearfix">
                {{ $posts->links('vendor.pagination.default') }}
            </div>
        </div>
    </div>
</div>
@endsection
