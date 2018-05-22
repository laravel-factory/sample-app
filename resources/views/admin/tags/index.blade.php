@extends('admin.layouts.app', ['page' => 'tag'])

@section('title', 'Tags')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Tags</h3>

                <a class="pull-right btn btn-sm btn-primary" href="{{ route('admin.tags.create') }}">
                    Add New
                </a>
            </div>
            <div class="box-body">
                <table class="table table-bordered">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>

                    @forelse ($tags as $tag)
                        <tr>
                            <td>{{ $tag->id }}</td>
                            <td>{{ $tag->name }}</td>
                            <td>
                                <a href="{{ route('admin.tags.edit', ['tag' => $tag->id]) }}">
                                    &#9997;
                                </a>

                                <form action="{{ route('admin.tags.destroy', ['tag' => $tag->id]) }}"
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
                            <td colspan="3">No records found</td>
                        </tr>
                    @endforelse
                </table>
            </div>

            <div class="box-footer clearfix">
                {{ $tags->links('vendor.pagination.default') }}
            </div>
        </div>
    </div>
</div>
@endsection
