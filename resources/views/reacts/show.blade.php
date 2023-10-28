@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">

        <h5  class="my-1 float-left">{{ isset($title) ? $title : 'React' }}</h5>

        <div class="float-right">

            <form method="POST" action="{!! route('reacts.react.destroy', $react->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('reacts.react.index') }}" class="btn btn-primary mr-2" title="Show All React">
                        <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                        Show All React
                    </a>

                    <a href="{{ route('reacts.react.create') }}" class="btn btn-success mr-2" title="Create New React">
                        <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                        Create New React
                    </a>

                    <a href="{{ route('reacts.react.edit', $react->id ) }}" class="btn btn-primary mr-2" title="Edit React">
                        <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                        Edit React
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete React" onclick="return confirm(&quot;Click Ok to delete React.?&quot;)">
                        <i class=" fas fa-fw fa-trash-alt" aria-hidden="true"></i>
                        Delete React
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>Type</dt>
            <dd>{{ $react->type }}</dd>
            <dt>Type</dt>
            <dd>{{ optional($react->type)->id }}</dd>
            <dt>User</dt>
            <dd>{{ optional($react->user)->name }}</dd>

        </dl>

    </div>
</div>

@endsection
