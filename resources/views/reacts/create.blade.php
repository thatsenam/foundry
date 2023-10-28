@extends('layouts.app')

@section('content')

    <div class="card">

        <div class="card-header">

            <h5  class="my-1 float-left">Create New React</h5>

            <div class="btn-group btn-group-sm float-right" role="group">
                <a href="{{ route('reacts.react.index') }}" class="btn btn-primary" title="Show All React">
                    <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    Show All React
                </a>
            </div>

        </div>

        <div class="card-body">



            <form method="POST" action="{{ route('reacts.react.store') }}" accept-charset="UTF-8" id="create_react_form" name="create_react_form" class="form-horizontal">
            {{ csrf_field() }}
            @include ('reacts.form', [
                                        'react' => null,
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


