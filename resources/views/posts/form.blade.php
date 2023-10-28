
<div class="form-group">
    <div class="col-md-10">
        <label for="name">Name</label>


            @if(' required="true"'===' required="true"') <span class="text-danger font-bolder">*</span> @endif
        <input class="form-control  {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" type="text" id="name" value="{{ old('name', optional($post)->name) }}" minlength="1" maxlength="255" data=" required="true""  placeholder="Enter name here...">

            {!! $errors->first('name', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="body">Body</label>


            <textarea class="form-control" name="body" cols="50" rows="10" id="body" minlength="1" required="true" placeholder="Enter body here...">{{ old('body', optional($post)->body) }}</textarea>
            {!! $errors->first('body', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="user_id">User</label>


            <select class="form-control" id="user_id" name="user_id">
        	    <option value="" style="display: none;" {{ old('user_id', optional($post)->user_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select user</option>
        	@foreach ($users as $key => $user)
			    <option value="{{ $key }}" {{ old('user_id', optional($post)->user_id) == $key ? 'selected' : '' }}>
			    	{{ $user }}
			    </option>
			@endforeach
        </select>
        
            {!! $errors->first('user_id', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="community_id">Community</label>


            <select class="form-control" id="community_id" name="community_id">
        	    <option value="" style="display: none;" {{ old('community_id', optional($post)->community_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select community</option>
        	@foreach ($communities as $key => $community)
			    <option value="{{ $key }}" {{ old('community_id', optional($post)->community_id) == $key ? 'selected' : '' }}>
			    	{{ $community }}
			    </option>
			@endforeach
        </select>
        
            {!! $errors->first('community_id', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

