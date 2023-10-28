@extends('layouts.app')

@section('content')

    <div class="card">

        <div class="card-header">

            <h5  class="my-1 float-left">{{ !empty($postTag->name) ? $postTag->name : 'Post Tag' }}</h5>

            <div class="btn-group btn-group-sm float-right" role="group">

                <a href="{{ route('post_tags.post_tag.index') }}" class="btn btn-primary mr-2" title="Show All Post Tag">
                    <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    Show All Post Tag
                </a>

                <a href="{{ route('post_tags.post_tag.create') }}" class="btn btn-success" title="Create New Post Tag">
                    <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                    Create New Post Tag
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

            <form method="POST" action="{{ route('post_tags.post_tag.update', $postTag->id) }}" id="edit_post_tag_form" name="edit_post_tag_form" accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            @include ('post_tags.form', [
                                        'postTag' => $postTag,
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
