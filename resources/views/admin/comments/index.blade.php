@extends('admin.layouts.app', ['page' => 'comment'])

@section('title', 'Comments')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Comments</h3>

                <a class="pull-right btn btn-sm btn-primary" href="{{ route('admin.comments.create') }}">
                    Add New
                </a>
            </div>
            <div class="box-body">
                <table class="table table-bordered">
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Post</th>
                        <th>Action</th>
                    </tr>

                    @forelse ($comments as $comment)
                        <tr>
                            <td>{{ $comment->id }}</td>
                            <td>{{ $comment->title }}</td>
                            <td>
                                <img src="{{ $comment->getFirstMediaUrl('image') }}"
                                    width="50"
                                    alt="Image image"
                                >
                            </td>
                            <td>{{ $comment->post->title }}</td>
                            <td>
                                <a href="{{ route('admin.comments.edit', ['comment' => $comment->id]) }}">
                                    &#9997;
                                </a>

                                <form action="{{ route('admin.comments.destroy', ['comment' => $comment->id]) }}"
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
                {{ $comments->links('vendor.pagination.default') }}
            </div>
        </div>
    </div>
</div>
@endsection
