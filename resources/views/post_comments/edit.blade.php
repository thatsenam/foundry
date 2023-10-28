@extends('layouts.app')

@section('content')

    <div class="card">

        <div class="card-header">

            <h5  class="my-1 float-left">{{ !empty($title) ? $title : 'Post Comment' }}</h5>

            <div class="btn-group btn-group-sm float-right" role="group">

                <a href="{{ route('post_comments.post_comment.index') }}" class="btn btn-primary mr-2" title="Show All Post Comment">
                    <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    Show All Post Comment
                </a>

                <a href="{{ route('post_comments.post_comment.create') }}" class="btn btn-success" title="Create New Post Comment">
                    <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                    Create New Post Comment
                </a>

            </div>
        </div>

        <div class="card-body">

            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form method="POST" action="{{ route('post_comments.post_comment.update', $postComment->id) }}" id="edit_post_comment_form" name="edit_post_comment_form" accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            @include ('post_comments.form', [
                                        'postComment' => $postComment,
                                      ])

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="Update">
                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection
