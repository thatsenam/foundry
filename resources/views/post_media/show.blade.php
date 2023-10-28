@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">

        <h5  class="my-1 float-left">{{ isset($postMedia->name) ? $postMedia->name : 'Post Media' }}</h5>

        <div class="float-right">

            <form method="POST" action="{!! route('post_media.post_media.destroy', $postMedia->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('post_media.post_media.index') }}" class="btn btn-primary mr-2" title="Show All Post Media">
                        <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                        Show All Post Media
                    </a>

                    <a href="{{ route('post_media.post_media.create') }}" class="btn btn-success mr-2" title="Create New Post Media">
                        <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                        Create New Post Media
                    </a>

                    <a href="{{ route('post_media.post_media.edit', $postMedia->id ) }}" class="btn btn-primary mr-2" title="Edit Post Media">
                        <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                        Edit Post Media
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Post Media" onclick="return confirm(&quot;Click Ok to delete Post Media.?&quot;)">
                        <i class=" fas fa-fw fa-trash-alt" aria-hidden="true"></i>
                        Delete Post Media
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ $postMedia->name }}</dd>
            <dt>File</dt>
            <dd>{{ asset('storage/' . $postMedia->file) }}</dd>
            <dt>Post</dt>
            <dd>{{ optional($postMedia->post)->name }}</dd>

        </dl>

    </div>
</div>

@endsection
