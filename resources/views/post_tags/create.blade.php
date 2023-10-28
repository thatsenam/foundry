@extends('layouts.app')

@section('content')

    <div class="card">

        <div class="card-header">

            <h5  class="my-1 float-left">Create New Post Tag</h5>

            <div class="btn-group btn-group-sm float-right" role="group">
                <a href="{{ route('post_tags.post_tag.index') }}" class="btn btn-primary" title="Show All Post Tag">
                    <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    Show All Post Tag
                </a>
            </div>

        </div>

        <div class="card-body">



            <form method="POST" action="{{ route('post_tags.post_tag.store') }}" accept-charset="UTF-8" id="create_post_tag_form" name="create_post_tag_form" class="form-horizontal">
            {{ csrf_field() }}
            @include ('post_tags.form', [
                                        'postTag' => null,
                                      ])

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="Add">
                    </div>
                </div>

            </form>

        </div>
    </div>

@endsection


