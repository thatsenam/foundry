@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">

        <h5  class="my-1 float-left">{{ isset($title) ? $title : 'Post Comment' }}</h5>

        <div class="float-right">

            <form method="POST" action="{!! route('post_comments.post_comment.destroy', $postComment->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('post_comments.post_comment.index') }}" class="btn btn-primary mr-2" title="Show All Post Comment">
                        <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                        Show All Post Comment
                    </a>

                    <a href="{{ route('post_comments.post_comment.create') }}" class="btn btn-success mr-2" title="Create New Post Comment">
                        <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                        Create New Post Comment
                    </a>

                    <a href="{{ route('post_comments.post_comment.edit', $postComment->id ) }}" class="btn btn-primary mr-2" title="Edit Post Comment">
                        <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                        Edit Post Comment
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Post Comment" onclick="return confirm(&quot;Click Ok to delete Post Comment.?&quot;)">
                        <i class=" fas fa-fw fa-trash-alt" aria-hidden="true"></i>
                        Delete Post Comment
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>Body</dt>
            <dd>{{ $postComment->body }}</dd>
            <dt>Post</dt>
            <dd>{{ optional($postComment->post)->name }}</dd>
            <dt>User</dt>
            <dd>{{ optional($postComment->user)->name }}</dd>
            <dt>Post Comment</dt>
            <dd>{{ optional($postComment->postComment)->id }}</dd>

        </dl>

    </div>
</div>

@endsection
