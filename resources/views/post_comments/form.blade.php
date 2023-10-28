
<div class="form-group">
    <div class="col-md-10">
        <label for="body">Body</label>


            @if(''===' required="true"') <span class="text-danger font-bolder">*</span> @endif
        <input class="form-control  {{ $errors->has('body') ? 'is-invalid' : '' }}" name="body" type="text" id="body" value="{{ old('body', optional($postComment)->body) }}" minlength="1" data=""  placeholder="Enter body here...">

            {!! $errors->first('body', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="post_id">Post</label>


            <select class="form-control" id="post_id" name="post_id">
        	    <option value="" style="display: none;" {{ old('post_id', optional($postComment)->post_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select post</option>
        	@foreach ($posts as $key => $post)
			    <option value="{{ $key }}" {{ old('post_id', optional($postComment)->post_id) == $key ? 'selected' : '' }}>
			    	{{ $post }}
			    </option>
			@endforeach
        </select>
        
            {!! $errors->first('post_id', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="user_id">User</label>


            <select class="form-control" id="user_id" name="user_id">
        	    <option value="" style="display: none;" {{ old('user_id', optional($postComment)->user_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select user</option>
        	@foreach ($users as $key => $user)
			    <option value="{{ $key }}" {{ old('user_id', optional($postComment)->user_id) == $key ? 'selected' : '' }}>
			    	{{ $user }}
			    </option>
			@endforeach
        </select>
        
            {!! $errors->first('user_id', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="post_comment_id">Post Comment</label>


            <select class="form-control" id="post_comment_id" name="post_comment_id">
        	    <option value="" style="display: none;" {{ old('post_comment_id', optional($postComment)->post_comment_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select post comment</option>
        	@foreach ($postComments as $key => $postComment)
			    <option value="{{ $key }}" {{ old('post_comment_id', optional($postComment)->post_comment_id) == $key ? 'selected' : '' }}>
			    	{{ $postComment }}
			    </option>
			@endforeach
        </select>
        
            {!! $errors->first('post_comment_id', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

