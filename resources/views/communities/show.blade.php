@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">

        <h5  class="my-1 float-left">{{ isset($community->name) ? $community->name : 'Community' }}</h5>

        <div class="float-right">

            <form method="POST" action="{!! route('communities.community.destroy', $community->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('communities.community.index') }}" class="btn btn-primary mr-2" title="Show All Community">
                        <i class=" fas fa-fw fa-th-list" aria-hidden="true"></i>
                        Show All Community
                    </a>

                    <a href="{{ route('communities.community.create') }}" class="btn btn-success mr-2" title="Create New Community">
                        <i class=" fas fa-fw fa-plus" aria-hidden="true"></i>
                        Create New Community
                    </a>

                    <a href="{{ route('communities.community.edit', $community->id ) }}" class="btn btn-primary mr-2" title="Edit Community">
                        <i class=" fas fa-fw fa-pencil-alt" aria-hidden="true"></i>
                        Edit Community
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Community" onclick="return confirm(&quot;Click Ok to delete Community.?&quot;)">
                        <i class=" fas fa-fw fa-trash-alt" aria-hidden="true"></i>
                        Delete Community
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="card-body">
        <dl class="dl-horizontal">
            <dt>Name</dt>
            <dd>{{ $community->name }}</dd>
            <dt>Profile Photo</dt>
            <dd>{{ asset('storage/' . $community->avatar) }}</dd>
            <dt>Description</dt>
            <dd>{{ $community->description }}</dd>
            <dt>User</dt>
            <dd>{{ optional($community->user)->name }}</dd>
            <dt>Created At</dt>
            <dd>{{ $community->created_at }}</dd>
            <dt>Updated At</dt>
            <dd>{{ $community->updated_at }}</dd>

        </dl>

    </div>
</div>

@endsection
