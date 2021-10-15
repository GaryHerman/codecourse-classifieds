<div class="form-group @error('area_id') is-invalid @enderror">
    <label for="area_id">Area</label>
    <select id="area" class="form-control @error('area_id') is-invalid @enderror" name="area_id">
        @foreach ($areas as $country)
            <optgroup label="{{ $country->name }}">
                @foreach ($country->children as $state)
                    <optgroup label="{{ $state->name }}">
                        @foreach ($state->children as $city)
                            @if ((isset($listing)   && $listing->area_id == $city->id) ||
                                 (! isset($listing) && $area->id == $city->id && ! old('area_id')) ||
                                 (old('area_id') == $city->id))
                                <option value="{{ $city->id }}" selected="selected">{{ $city->name }}</option>
                            @else
                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                            @endif
                        @endforeach
                    </optgroup>
                @endforeach
            </optgroup>
        @endforeach
    </select>
    @error('area_id')
        <span class="invalid-feedback">{{ $message }}</span>
    @enderror
</div>
