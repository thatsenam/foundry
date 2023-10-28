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

            <h5  class="my-1 float-left">Post Tags</h5>

            <div class="btn-group btn-group-sm float-right" role="group">
                <a href="{{ route('post_tags.post_tag.create') }}" class="btn btn-success" title="Create New Post Tag">
                    <i class="fas fa-fw fa-plus" aria-hidden="true"></i>
                    Create New Post Tag
                </a>
            </div>

        </div>

        @if(count($postTags) == 0)
            <div class="card-body text-center">
                <h4>No Post Tags Available.</h4>
            </div>
        @else
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                                <th>Name</th>
                            <th>Post</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($postTags as $postTag)
                        <tr>
                                <td>{{ $postTag->name }}</td>
                            <td>{{ optional($postTag->post)->name }}</td>

                            <td>

                                <form method="POST" action="{!! route('post_tags.post_tag.destroy', $postTag->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-sm float-right " role="group">
                                        <a href="{{ route('post_tags.post_tag.show', $postTag->id ) }}"title="Show Post Tag">
                                            <i class="fa fa-eye text-info" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ route('post_tags.post_tag.edit', $postTag->id ) }}" class="mx-4" title="Edit Post Tag">
                                            <i class="fas fa-edit text-primary" aria-hidden="true"></i>
                                        </a>

                                        <button type="submit" style="border: none;background: transparent"  title="Delete Post Tag" onclick="return confirm(&quot;Click Ok to delete Post Tag.&quot;)">
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

        <div class="card-footer">
            {!! $postTags->render() !!}
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


