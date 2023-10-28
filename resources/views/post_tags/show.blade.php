@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">

        <h5  class="my-1 float-left">{{ isset($postTag->name) ? $postTag->name : 'Post Tag' }}</h5>

        <div class="float-right">

            <form method="POST" action="{!! route('post_tags.post_tag.destroy', $postTag->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('post_tags.post_tag.index') }}" class="btn btn-primary mr-2" title="Show All Post Tag">
                        <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                        Show All Post Tag
                    </a>

                    <a href="{{ route('post_tags.post_tag.create') }}" class="btn btn-success mr-2" title="Create New Post Tag">
                        <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                        Create New Post Tag
                    </a>

                    <a href="{{ route('post_tags.post_tag.edit', $postTag->id ) }}" class="btn btn-primary mr-2" title="Edit Post Tag">
                        <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                        Edit Post Tag
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Post Tag" onclick="return confirm(&quot;Click Ok to delete Post Tag.?&quot;)">
                        <i class=" fas fa-fw fa-trash-alt" aria-hidden="true"></i>
                        Delete Post Tag
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ $postTag->name }}</dd>
            <dt>Post</dt>
            <dd>{{ optional($postTag->post)->name }}</dd>

        </dl>

    </div>
</div>

@endsection
