<div class="form-group">
    <div class="col-md-10">
        <label for="type_id">Type</label>


        <select class="form-control" id="type" name="type">
            <option value="" style="display: none;" {{ old('type_id', optional($react)->type_id ?: '') == '' ? 'selected' : '' }}
                                    disabled selected>Select type</option>
            <option value="{{\App\Models\Post::class}}">Post</option>
            <option value="{{\App\Models\PostComment::class}}">PostComment</option>
        </select>

        {!! $errors->first('type_id', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="type_id">Type</label>


            <select class="form-control" id="type_id" name="type_id">
        	    <option value="" style="display: none;" {{ old('type_id', optional($react)->type_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select type</option>

                @foreach(\App\Models\Post::all() as $post)
                    <option value="{{$post->id}}">Post : {{$post->name}}</option>
                @endforeach
                @foreach(\App\Models\PostComment::all() as $post)
                    <option value="{{$post->id}}">PostComment : {{$post->body}}</option>
                @endforeach

            </select>

            {!! $errors->first('type_id', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="user_id">User</label>


            <select class="form-control" id="user_id" name="user_id">
        	    <option value="" style="display: none;" {{ old('user_id', optional($react)->user_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select user</option>
        	@foreach ($users as $key => $user)
			    <option value="{{ $key }}" {{ old('user_id', optional($react)->user_id) == $key ? 'selected' : '' }}>
			    	{{ $user }}
			    </option>
			@endforeach
        </select>

            {!! $errors->first('user_id', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

