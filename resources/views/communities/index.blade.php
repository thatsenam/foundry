@extends('layouts.app')

@section('content')

    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <i class=" fas fa-fw fa-check" aria-hidden="true"></i>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif

    <div class="card">

        <div class="card-header">

            <h5  class="my-1 float-left">Communities</h5>

            <div class="btn-group btn-group-sm float-right" role="group">
                <a href="{{ route('communities.community.create') }}" class="btn btn-success" title="Create New Community">
                    <i class="fas fa-fw fa-plus" aria-hidden="true"></i>
                    Create New Community
                </a>
            </div>

        </div>

        @if(count($communities) == 0)
            <div class="card-body text-center">
                <h4>No Communities Available.</h4>
            </div>
        @else
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                                <th>Avatar</th>
                                <th>Name</th>
                                <th>Created By</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($communities as $community)
                        <tr>
                                <td><img style="border-radius: 50%" class="rounded-full" src="{{ asset('storage/'.$community->avatar) }}" width="60" height="60"></td>
                                <td>{{ $community->name }}</td>
                                <td>{{ optional($community->user)->name }}</td>

                            <td>

                                <form method="POST" action="{!! route('communities.community.destroy', $community->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-sm float-right " role="group">
                                        <a href="{{ route('communities.community.show', $community->id ) }}"title="Show Community">
                                            <i class="fa fa-eye text-info" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ route('communities.community.edit', $community->id ) }}" class="mx-4" title="Edit Community">
                                            <i class="fas fa-edit text-primary" aria-hidden="true"></i>
                                        </a>

                                        <button type="submit" style="border: none;background: transparent"  title="Delete Community" onclick="return confirm(&quot;Click Ok to delete Community.&quot;)">
                                            <i class=" fas  fa-trash text-danger" aria-hidden="true"></i>
                                        </button>
                                    </div>

                                </form>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>


        @endif

    </div>
@endsection

@section('scripts')

     <script>
         $(document).ready(function () {
             $('table').DataTable({
                 responsive: true,
                 "order": [],
                 dom: 'lBfrtip',
                 buttons: [
                     'copy', 'excel', 'pdf', 'print'
                 ]

             });
         });
     </script>

     <style>
         .dataTables_filter {
             float: right;
         }
        i:hover { color: #0248fa !important; }

     </style>


@endsection


