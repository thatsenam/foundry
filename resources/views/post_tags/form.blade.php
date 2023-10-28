
<div class="form-group">
    <div class="col-md-10">
        <label for="name">Name</label>


            @if(''===' required="true"') <span class="text-danger font-bolder">*</span> @endif
        <input class="form-control  {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" type="text" id="name" value="{{ old('name', optional($postTag)->name) }}" minlength="1" maxlength="255" data=""  placeholder="Enter name here...">

            {!! $errors->first('name', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="post_id">Post</label>


            <select class="form-control" id="post_id" name="post_id">
        	    <option value="" style="display: none;" {{ old('post_id', optional($postTag)->post_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select post</option>
        	@foreach ($posts as $key => $post)
			    <option value="{{ $key }}" {{ old('post_id', optional($postTag)->post_id) == $key ? 'selected' : '' }}>
			    	{{ $post }}
			    </option>
			@endforeach
        </select>
        
            {!! $errors->first('post_id', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

