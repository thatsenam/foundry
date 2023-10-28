
<div class="form-group">
    <div class="col-md-10">
        <label for="name">Name</label>


            @if(''===' required="true"') <span class="text-danger font-bolder">*</span> @endif
        <input class="form-control  {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" type="text" id="name" value="{{ old('name', optional($postMedia)->name) }}" minlength="1" maxlength="255" data=""  placeholder="Enter name here...">

            {!! $errors->first('name', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="file">File</label>


            <div class="input-group uploaded-file-group">
            <label class="input-group-btn">
                <span class="btn btn-default">
                     <input type="file" name="file" id="file" class="form-control-file">
                </span>
            </label>
            <input type="text" class="form-control uploaded-file-name" hidden>
        </div>

        @if (isset($postMedia->file) && !empty($postMedia->file))
            <div class="input-group input-width-input">
                <span class="input-group-addon">
                    <input type="checkbox" name="custom_delete_file" class="custom-delete-file" value="1" {{ old('custom_delete_file', '0') == '1' ? 'checked' : '' }}> Delete
                </span>

                <span class="input-group-addon custom-delete-file-name">
                   <img class="card" src="{{ asset('storage/'.$postMedia->file) }}" width="200">

                </span>
            </div>
        @endif

            {!! $errors->first('file', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="post_id">Post</label>


            <select class="form-control" id="post_id" name="post_id">
        	    <option value="" style="display: none;" {{ old('post_id', optional($postMedia)->post_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select post</option>
        	@foreach ($posts as $key => $post)
			    <option value="{{ $key }}" {{ old('post_id', optional($postMedia)->post_id) == $key ? 'selected' : '' }}>
			    	{{ $post }}
			    </option>
			@endforeach
        </select>
        
            {!! $errors->first('post_id', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

