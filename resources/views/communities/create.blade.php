@extends('layouts.app')

@section('content')

    <div class="card">

        <div class="card-header">

            <h5  class="my-1 float-left">Create New Community</h5>

            <div class="btn-group btn-group-sm float-right" role="group">
                <a href="{{ route('communities.community.index') }}" class="btn btn-primary" title="Show All Community">
                    <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    Show All Community
                </a>
            </div>

        </div>

        <div class="card-body">



            <form method="POST" action="{{ route('communities.community.store') }}" accept-charset="UTF-8" id="create_community_form" name="create_community_form" class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}
            @include ('communities.form', [
                                        'community' => null,
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


