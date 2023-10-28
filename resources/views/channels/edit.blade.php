@extends('layouts.app')

@section('content')

    <div class="card">

        <div class="card-header">

            <h5  class="my-1 float-left">{{ !empty($channel->name) ? $channel->name : 'Channel' }}</h5>

            <div class="btn-group btn-group-sm float-right" role="group">

                <a href="{{ route('channels.channel.index') }}" class="btn btn-primary mr-2" title="Show All Channel">
                    <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                    Show All Channel
                </a>

                <a href="{{ route('channels.channel.create') }}" class="btn btn-success" title="Create New Channel">
                    <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                    Create New Channel
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

            <form method="POST" action="{{ route('channels.channel.update', $channel->id) }}" id="edit_channel_form" name="edit_channel_form" accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            @include ('channels.form', [
                                        'channel' => $channel,
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
