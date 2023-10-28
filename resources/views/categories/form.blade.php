<div class="form-group">
    <div class="col-md-10">
        <label for="name">Name</label>


        @if(''===' required="true"') <span class="text-danger font-bolder">*</span> @endif
        <input class="form-control  {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" type="text" id="name"
               value="{{ old('name', optional($category)->name) }}" minlength="1" maxlength="255" data=""
               placeholder="Enter name here...">

        {!! $errors->first('name', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="description">Description</label>


        <textarea class="form-control" name="description" cols="50" rows="10" id="description" minlength="1"
                  maxlength="1000">{{ old('description', optional($category)->description) }}</textarea>
        {!! $errors->first('description', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

<div class="form-group">
    <div class="col-md-10">
        <label for="community_id">Community</label>


        <select class="form-control" id="community_id" name="community_id" required>
            <option value="" style="display: none;"
                    {{ old('community_id', optional($category)->community_id ?: '') == '' ? 'selected' : '' }} disabled
                    selected>Select community
            </option>
            @foreach ($communities as $key => $community)
                <option
                    value="{{ $key }}" {{ old('community_id', optional($category)->community_id) == $key ? 'selected' : '' }}>
                    {{ $community }}
                </option>
            @endforeach
        </select>

        {!! $errors->first('community_id', '<p class="form-text text-danger">:message</p>') !!}

    </div>
</div>

