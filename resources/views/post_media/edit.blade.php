@extends('layouts.app')

@section('content')

    <div class="card">

        <div class="card-header">

            <h5  class="my-1 float-left">{{ !empty($postMedia->name) ? $postMedia->name : 'Post Media' }}</h5>

            <div class="btn-group btn-group-sm float-right" role="group">

                <a href="{{ route('post_media.post_media.index') }}" class="btn btn-primary mr-2" title="Show All Post Media">
                    <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    Show All Post Media
                </a>

                <a href="{{ route('post_media.post_media.create') }}" class="btn btn-success" title="Create New Post Media">
                    <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                    Create New Post Media
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

            <form method="POST" action="{{ route('post_media.post_media.update', $postMedia->id) }}" id="edit_post_media_form" name="edit_post_media_form" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            @include ('post_media.form', [
                                        'postMedia' => $postMedia,
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
