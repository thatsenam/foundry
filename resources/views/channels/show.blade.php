@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">

        <h5  class="my-1 float-left">{{ isset($channel->name) ? $channel->name : 'Channel' }}</h5>

        <div class="float-right">

            <form method="POST" action="{!! route('channels.channel.destroy', $channel->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('channels.channel.index') }}" class="btn btn-primary mr-2" title="Show All Channel">
                        <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                        Show All Channel
                    </a>

                    <a href="{{ route('channels.channel.create') }}" class="btn btn-success mr-2" title="Create New Channel">
                        <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                        Create New Channel
                    </a>

                    <a href="{{ route('channels.channel.edit', $channel->id ) }}" class="btn btn-primary mr-2" title="Edit Channel">
                        <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                        Edit Channel
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Channel" onclick="return confirm(&quot;Click Ok to delete Channel.?&quot;)">
                        <i class=" fas fa-fw fa-trash-alt" aria-hidden="true"></i>
                        Delete Channel
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ $channel->name }}</dd>
            <dt>Description</dt>
            <dd>{{ $channel->description }}</dd>
            <dt>Community</dt>
            <dd>{{ optional($channel->community)->name }}</dd>

        </dl>

    </div>
</div>

@endsection
